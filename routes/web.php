<?php

use Illuminate\Support\Facades\Route;


//AUTHENTICATION

Route::get('/', function () { 
    return view('login'); 
});

Route::post('/login', function () { 
    return redirect('/dashboard'); 
});

Route::post('/logout', function () { 
    return redirect('/'); 
});



//ROUTE SISI PEMILIK (ADMINISTRATOR)

// --- Dashboard ---
Route::get('/dashboard', function () { 
    return view('dashboard'); 
});

// --- Manajemen Data Penghuni ---
Route::get('/data_penghuni', function () { 
    return view('data_penghuni'); 
});
Route::post('/tambah_akun', function () { 
    return back(); 
});
Route::delete('/hapus_penghuni', function () { 
    return back(); 
});

// --- Manajemen Waiting List ---
Route::get('/waiting_list', function () { 
    return view('waiting_list'); 
});
Route::post('/tambah_waiting_list', function () { 
    return back(); 
});
Route::put('/edit_waiting_list', function () { 
    return back(); 
});
Route::delete('/hapus_waiting_list', function () { 
    return back(); 
});

// --- Manajemen Kamar ---
Route::get('/manajemen_kamar', function () { 
    return view('manajemen_kamar'); 
});
Route::post('/tambah_kamar', function () { 
    return back(); 
});
Route::put('/edit_kamar', function () { 
    return back(); 
});
Route::delete('/hapus_kamar', function () { 
    return back(); 
});

// --- Manajemen Pembayaran ---
Route::get('/pembayaran', function () { 
    return view('pembayaran'); 
});
Route::post('/proses_pembayaran', function () { 
    return back(); 
});
Route::get('/kirim_notifikasi', function () { 
    return back(); 
});

// --- Manajemen Riwayat Transaksi ---
Route::get('/riwayat', function () { 
    return view('riwayat'); 
});
Route::post('/tambah_riwayat', function () { 
    return back(); 
});
Route::put('/edit_riwayat', function () { 
    return back(); 
});
Route::delete('/hapus_riwayat', function () { 
    return back(); 
});



//ROUTE SISI PENGHUNI 


Route::prefix('penghuni')->group(function () {
    
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

    Route::post('/update-profile', function () {
        // Logic update data profil penghuni
        return redirect()->back()->with('success', 'Profil berhasil diupdate!');
    });
});

// --- Action Form Pembayaran Penghuni ---
Route::post('/proses_bayar_penghuni', function () {
    // Logic upload dari modal gateway
    return redirect()->back();
});

Route::post('/proses_bayar_manual', function () {
    // Logic upload dari halaman upload manual
    return redirect('/penghuni/pembayaran');
});