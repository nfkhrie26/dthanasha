<?php

namespace App\Http\Controllers\Penghuni;

use Illuminate\Http\Request;
use App\Services\MidtransService;
use Illuminate\Support\Facades\Log;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
  protected $midtransService;

    public function __construct(MidtransService $midtransService)
    {
        $this->midtransService = $midtransService;
    }

    public function halamanPembayaran()
    {
        $grossAmount = 1200000; 
        return view('penghuni.pembayaran', compact('grossAmount'));
    }

    public function prosesBayar(Request $request)
    {
        $user = Auth::user();

        $idTagihanDummy = 99; 
        $grossAmount = 1200000; 
        
        $orderId = 'TRX-' . time() . '-' . $user->id; 

        $customerDetails = [
            'first_name' => $user->username, 
            'email' => $user->email,
        ];

        $itemDetails = [
            [
                'id'       => 'TAGIHAN-' . $idTagihanDummy,
                'price'    => $grossAmount,
                'quantity' => 1,
                'name'     => 'Pembayaran Kost Dthanasha'
            ]
        ];

        $snapToken = $this->midtransService->createSnapToken(
            $orderId, 
            $grossAmount, 
            $customerDetails, 
            $itemDetails
        );

        Transaksi::create([
            'order_id'         => $orderId,
            'id_tagihan'       => $idTagihanDummy,
            'snap_token'       => $snapToken,
            'status_transaksi' => 'menunggu', 
            'tipe_pembayaran'  => null, 
        ]);

        // 3. FIX ERROR <!DOCTYPE> DI JAVASCRIPT LU
        // Wajib balikin JSON, bukan return view!
        return response()->json([
            'status' => 'success',
            'snap_token' => $snapToken
        ]);
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
            $transaksi = Transaksi::where('order_id', $orderId)->first();
            
            // Kalau transaksinya nggak ada, langsung stop
            if(!$transaksi) return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);

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