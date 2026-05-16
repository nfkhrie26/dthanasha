<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaturan;
use App\Models\Penghuni;
use App\Models\Kamar;
use App\Models\Tagihan;
use Carbon\Carbon;

class PengaturanController extends Controller
{
    public function index()
    {
        $pengaturan = Pengaturan::pluck('nilai', 'kunci')->toArray();

        return view('admin.pengaturan', compact('pengaturan'));
    }

    public function update(Request $request)
    {   
        $request->validate([
                'deadline' => 'required|integer|min:1|max:28',
                'wa_admin' => 'required|string',
                'email_admin' => 'required|string',
        ]);

        $dataSettings = [
            'deadline'    => $request->deadline,
            'wa_admin'    => $request->wa_admin,
            'email_admin' => $request->email_admin,
        ];

        foreach ($dataSettings as $kunci => $nilai) {
            Pengaturan::updateOrCreate(
                ['kunci' => $kunci],
                [
                    'kunci' => $kunci,
                    'nilai' => $nilai,
                ]
            );
        }

        // Auto-generate tagihan bulan ini untuk semua penghuni yang punya kamar
        $this->generateTagihanBulanan((int) $request->deadline);

        return redirect()->back()->with('success', 'Pengaturan berhasil disimpan dan tagihan bulan ini sudah digenerate!');
    }

    /**
     * Generate tagihan bulanan otomatis untuk semua penghuni aktif.
     * Hanya membuat tagihan jika belum ada untuk periode bulan ini.
     */
    private function generateTagihanBulanan(int $tanggalDeadline)
    {
        $now = Carbon::now();
        $periodeBulan = $now->translatedFormat('F Y'); // contoh: "Mei 2026"

        // Hitung jatuh tempo: tanggal deadline di bulan ini
        // Jika sudah lewat, tetap pakai bulan ini (tagihan sudah terlambat)
        $jatuhTempo = Carbon::create($now->year, $now->month, min($tanggalDeadline, $now->daysInMonth));

        // Ambil semua penghuni yang sudah punya kamar (aktif menempati)
        $penghuniAktif = Penghuni::whereNotNull('id_kamar')->get();

        $jumlahDibuat = 0;

        foreach ($penghuniAktif as $penghuni) {
            // Cek apakah sudah ada tagihan untuk penghuni ini di periode ini
            $sudahAda = Tagihan::where('id_penghuni', $penghuni->id)
                              ->where('periode_bulan', $periodeBulan)
                              ->exists();

            if (!$sudahAda) {
                // Ambil harga kamar untuk nominal tagihan
                $kamar = Kamar::find($penghuni->id_kamar);
                $nominal = $kamar ? $kamar->harga_kamar : 0;

                if ($nominal > 0) {
                    Tagihan::create([
                        'id_penghuni'     => $penghuni->id,
                        'periode_bulan'   => $periodeBulan,
                        'status_tagihan'  => 'Belum Lunas',
                        'nominal_tagihan' => $nominal,
                        'jatuh_tempo'     => $jatuhTempo->format('Y-m-d'),
                        'tanggal_bayar'   => null,
                    ]);
                    $jumlahDibuat++;
                }
            }
        }
    }
}
