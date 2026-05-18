<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tagihan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PembayaranController extends Controller
{
    public function index()
    {
        // Ambil semua tagihan + data penghuni + kamar milik penghuni tsb
        $tagihans = Tagihan::with(['penghuni.kamar'])->latest()->get();

        // Hitung statistik untuk Summary Cards
        $sudahMembayar = Tagihan::where('status_tagihan', 'Lunas')->count();
        $menungguKonfirmasi = Tagihan::where('status_tagihan', 'Menunggu Konfirmasi')->count();
        $belumMembayar = Tagihan::where('status_tagihan', 'Belum Lunas')->count();

        return view('admin.pembayaran', compact('tagihans', 'sudahMembayar', 'menungguKonfirmasi', 'belumMembayar'));
    }

    public function konfirmasi(Request $request, $id)
    {
        $request->validate([
            'nominal' => 'required|numeric',
            'metode_pembayaran' => 'required|string',
            'bukti_pembayaran' => 'nullable|string',
        ]);

        $tagihan = Tagihan::findOrFail($id);

        // Update tabel tagihan
        $tagihan->update([
            'status_tagihan' => 'Lunas',
            'tanggal_bayar' => now(),
            'nominal_tagihan' => $request->nominal,
            'bukti_transfer' => $request->bukti_pembayaran,
        ]);

        // Catat riwayat ke log_transaksi
        Transaksi::create([
            'order_id' => 'MANUAL-' . time() . '-' . $tagihan->id,
            'id_tagihan' => $tagihan->id,
            'tipe_pembayaran' => $request->metode_pembayaran,
            'status_transaksi' => 'Settlement', 
        ]);

        return redirect()->back()->with('success', 'Pembayaran berhasil dikonfirmasi!');
    }
}