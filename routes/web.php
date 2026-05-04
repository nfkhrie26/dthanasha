<?php

use Illuminate\Support\Facades\Route;

//AUTHENTICATION
Route::get('/', function () { return view('login'); });
Route::post('/login', function () { return redirect('/dashboard'); });
Route::post('/logout', function () { return redirect('/'); });

//ROUTE SISI PEMILIK (ADMINISTRATOR)
Route::get('/dashboard', function () { return view('admin.dashboard'); });

Route::get('/data_penghuni', function () { return view('admin.data_penghuni'); });
Route::post('/tambah_akun', function () { return back(); });
Route::delete('/hapus_penghuni', function () { return back(); });

Route::get('/waiting_list', function () { return view('admin.waiting_list'); });
Route::post('/tambah_waiting_list', function () { return back(); });
Route::put('/edit_waiting_list', function () { return back(); });
Route::delete('/hapus_waiting_list', function () { return back(); });

Route::get('/manajemen_kamar', function () { return view('admin.manajemen_kamar'); });
Route::post('/tambah_kamar', function () { return back(); });
Route::put('/edit_kamar', function () { return back(); });
Route::delete('/hapus_kamar', function () { return back(); });

Route::get('/pembayaran', function () { return view('admin.pembayaran'); });
Route::post('/proses_pembayaran', function () { return back(); });
Route::get('/kirim_notifikasi', function () { return back(); });

Route::get('/riwayat', function () { return view('admin.riwayat'); });
Route::post('/tambah_riwayat', function () { return back(); });
Route::put('/edit_riwayat', function () { return back(); });
Route::delete('/hapus_riwayat', function () { return back(); });


//ROUTE SISI PENGHUNI 
Route::prefix('penghuni')->group(function () {
    Route::get('/dashboard', function () {
        return view('penghuni.dashboard_penghuni'); // Diperbarui
    });

    Route::get('/pembayaran', function () {
        return view('penghuni.pembayaran_penghuni'); // Diperbarui
    });

    Route::get('/pembayaran-manual', function () {
        return view('penghuni.pembayaran_manual'); // Diperbarui
    });

    Route::get('/profile', function () {
        return view('penghuni.profile_penghuni'); // Diperbarui
    });

    Route::post('/update-profile', function () {
        return redirect()->back()->with('success', 'Profil berhasil diupdate!');
    });
});

// --- Action Form Pembayaran Penghuni ---
Route::post('/proses_bayar_penghuni', function () {
    return redirect()->back();
});

Route::post('/proses_bayar_manual', function () {
    return redirect('/penghuni/pembayaran');
});