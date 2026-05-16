<?php

namespace App\Http\Controllers\Penghuni;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tagihan;
use App\Models\Kamar;
use App\Models\Penghuni;
use App\Models\Pengaturan;
use App\Models\Transaksi;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index ()
    {
        $user = Auth::user();
        $nama = $user->name;
        $penghuni = Penghuni::where('id_user', $user->id)->first();

        // Jaga kalau penghuni belum terdaftar atau belum ada kamar
        $kamar = null;
        $tagihanSaatIni = null;
        $riwayatPembayaran = collect();

        if ($penghuni) {
            if ($penghuni->id_kamar) {
                $kamar = Kamar::where('id', $penghuni->id_kamar)->first();
            }
            $tagihanSaatIni = Tagihan::where('id_penghuni', $penghuni->id)
                        ->where('status_tagihan', 'Belum Lunas')
                        ->latest()
                        ->first();

            // Riwayat pembayaran dari tagihan yang sudah lunas
            $riwayatPembayaran = Tagihan::where('id_penghuni', $penghuni->id)
                        ->orderBy('created_at', 'desc')
                        ->take(10)
                        ->get();
        }

        $waAdmin = Pengaturan::where('kunci', 'wa_admin')->first();

        return view('penghuni.dashboard', compact('tagihanSaatIni', 'nama', 'kamar', 'penghuni', 'waAdmin', 'riwayatPembayaran'));
    }
}
