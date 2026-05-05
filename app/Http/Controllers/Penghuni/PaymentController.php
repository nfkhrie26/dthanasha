<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MidtransService;
use Illuminate\Support\Facades\Log;
use App\Models\Kamar;


class PaymentController extends Controller
{
    protected $midtransService;

    // 1. Dependency Injection Service kita tadi
    public function __construct(MidtransService $midtransService)
    {
        $this->midtransService = $midtransService;
    }

    // =========================================================
    // METHOD 1: BUAT NAMPILLIN HALAMAN PEMBAYARAN DI BLADE
    // =========================================================
    public function bayarKost(Request $request)
    {
        // Anggap aja lu ngambil data dari database
        $kamar = Kamar::find($request->kamar_id);
        
        $orderId = 'TRX-' . time(); // Harus Unik!
        $grossAmount = 1200000; // Harga total
        
        $customerDetails = [
            'first_name' => 'Dimas',
            'last_name' => 'Anggara',
            'email' => 'dimas@example.com',
            'phone' => '081234567890',
        ];

        $itemDetails = [
            [
                'id' => 'KMR-001',
                'price' => $grossAmount,
                'quantity' => 1,
                'name' => 'Pembayaran Kost Bulan Ini'
            ]
        ];

        // Minta Token ke Service
        $snapToken = $this->midtransService->createSnapToken(
            $orderId, 
            $grossAmount, 
            $customerDetails, 
            $itemDetails
        );

        // Nanti lu bikin record di database lu statusnya "PENDING"
        Transaksi::create(
            [
                'order_id' => $orderId,
                'id_tagihan'=> 'dauhanid', 
                'status' => 'pending', 
                'total' => $grossAmount,
                'tipe_pembayaran' => ''
            ]
        );

        // Lempar token ke Blade Penghuni
        return view('penghuni.checkout', compact('snapToken', 'orderId'));
    }

    // =========================================================
    // METHOD 2: WEBHOOK / NOTIFICATION HANDLER (WAJIB ADA!)
    // =========================================================
    public function webhook(Request $request)
    {
        try {
            // Karena kita pake library resmi Midtrans, kita pake class Notification bawaan mereka
            // Class ini otomatis ngecek keaslian request (nge-hash signature key)
            $notif = new \Midtrans\Notification();
            
            $transaction = $notif->transaction_status;
            $type = $notif->payment_type;
            $orderId = $notif->order_id;
            $fraud = $notif->fraud_status;

            // Cari transaksi di database lu berdasarkan order_id
            // $transaksi = Transaksi::where('order_id', $orderId)->first();
            
            // Kalau transaksinya nggak ada, langsung stop
            // if(!$transaksi) return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);

            // LOGIKA PENGECEKAN STATUS DARI MIDTRANS
            if ($transaction == 'capture') {
                if ($type == 'credit_card') {
                    if ($fraud == 'challenge') {
                        // $transaksi->update(['status' => 'pending']);
                    } else {
                        // $transaksi->update(['status' => 'lunas']);
                    }
                }
            } else if ($transaction == 'settlement') {
                // INI YANG PALING SERING KEPAS (Gopay, Qris, Transfer Bank)
                // Duit udah masuk, update database jadi LUNAS!
                // $transaksi->update(['status' => 'lunas']);
                
            } else if ($transaction == 'pending') {
                // Masih nunggu orangnya ke ATM
                // $transaksi->update(['status' => 'pending']);
                
            } else if ($transaction == 'deny' || $transaction == 'expire' || $transaction == 'cancel') {
                // Orang nya kelamaan nggak bayar atau dibatalin
                // $transaksi->update(['status' => 'batal']);
            }

            // Wajib ngembaliin response 200 OK ke Midtrans, biar mereka tau laporannya udah kita terima
            return response()->json(['message' => 'Webhook berhasil diproses']);

        } catch (\Exception $e) {
            // Catat kalau ada error biar lu gampang nge-debug
            Log::error('Midtrans Webhook Error: ' . $e->getMessage());
            return response()->json(['message' => 'Error dari server'], 500);
        }
    }
}