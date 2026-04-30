<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () { return view('login'); });
Route::get('/dashboard', function () { return view('dashboard'); });
Route::get('/data_penghuni', function () { return view('data_penghuni'); });
Route::get('/waiting_list', function () { return view('waiting_list'); });
Route::get('/manajemen_kamar', function () { return view('manajemen_kamar'); });
Route::get('/pembayaran', function () { return view('pembayaran'); });
Route::get('/riwayat', function () { return view('riwayat'); });


Route::post('/login', function () { return redirect('/dashboard'); });
Route::post('/logout', function () { return redirect('/'); });

Route::post('/tambah_akun', function () { return back(); });
Route::delete('/hapus_penghuni', function () { return back(); });

Route::post('/tambah_waiting_list', function () { return back(); });
Route::put('/edit_waiting_list', function () { return back(); });
Route::delete('/hapus_waiting_list', function () { return back(); });

Route::post('/tambah_kamar', function () { return back(); });
Route::put('/edit_kamar', function () { return back(); });
Route::delete('/hapus_kamar', function () { return back(); });

Route::post('/proses_pembayaran', function () { return back(); });
Route::get('/kirim_notifikasi', function () { return back(); });

Route::post('/tambah_riwayat', function () { return back(); });
Route::put('/edit_riwayat', function () { return back(); });
Route::delete('/hapus_riwayat', function () { return back(); });



// ==========================================
// 1. ROUTE GLOBAL / AUTH
// ==========================================
Route::get('/', function () {
    return view('welcome'); // Atau arahin ke halaman login lu
});

Route::post('/logout', function () {
    // Logic logout ganti sesuai controller lu nanti
    return redirect('/'); 
});


// ==========================================
// 2. ROUTE SISI PEMILIK (ADMIN)
// ==========================================
// Semua route pemilik langsung di root atau bisa lu kasih prefix '/admin' nanti
Route::get('/dashboard', function () {
    return view('dashboard'); // File dashboard.blade.php versi Pemilik
});

Route::get('/data_penghuni', function () {
    return view('data_penghuni');
});

Route::get('/waiting_list', function () {
    return view('waiting_list');
});

Route::get('/manajemen_kamar', function () {
    return view('manajemen_kamar');
});

Route::get('/pembayaran', function () {
    return view('pembayaran');
});

Route::get('/riwayat', function () {
    return view('riwayat');
});


// ==========================================
// 3. ROUTE SISI PENGHUNI
// ==========================================
Route::prefix('penghuni')->group(function () {
    
    // Tampilan Halaman (GET)
    Route::get('/dashboard', function () {
        return view('dashboard_penghuni');
    });

    Route::get('/pembayaran', function () {
        return view('pembayaran_penghuni');
    });

    Route::get('/pembayaran-manual', function () {
        return view('pembayaran_manual');
    });

    Route::get('/profile', function () {
        return view('profile_penghuni');
    });

    // Action Form Penghuni (POST)
    Route::post('/update-profile', function () {
        // Logic update data profil
        return redirect()->back()->with('success', 'Profil berhasil diupdate!');
    });
});

// Proses Pembayaran (Bisa dimasukin ke group penghuni juga nanti)
Route::post('/proses_bayar_penghuni', function () {
    // Logic upload dari modal
    return redirect()->back();
});

Route::post('/proses_bayar_manual', function () {
    // Logic upload dari halaman manual
    return redirect('/penghuni/pembayaran');
});