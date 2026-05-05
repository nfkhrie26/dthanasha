<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PenghuniController;
use App\Http\Controllers\Admin\WaitingListController; // <--- Controller baru buat CRUD Waiting List
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// ==========================================
// ROUTE SISI PEMILIK (ADMINISTRATOR)
// ==========================================
Route::middleware(['auth', 'role:owner'])->group(function () {
    
    // --- Views Admin ---
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // ---> Route CRUD Data Penghuni <---
    Route::get('admin/data-penghuni', [PenghuniController::class, 'index'])->name('admin.data-penghuni');
    Route::post('/tambah_akun', [PenghuniController::class, 'store']);
    Route::delete('/hapus_penghuni', [PenghuniController::class, 'destroy']);

    // ---> Route CRUD Waiting List <---
    Route::get('admin/waiting-list', [WaitingListController::class, 'index'])->name('admin.waiting-list');
    Route::post('/tambah_waiting_list', [WaitingListController::class, 'store']);
    Route::put('/edit_waiting_list', [WaitingListController::class, 'update']);
    Route::delete('/hapus_waiting_list', [WaitingListController::class, 'destroy']);

    // --- Views Admin Lainnya ---
    Route::get('admin/manajemen-kamar', function () {
        return view('admin.manajemen_kamar');
    })->name('admin.manajemen-kamar');

    Route::get('admin/pembayaran', function () { 
        return view('admin.pembayaran'); 
    })->name('admin.pembayaran');

    Route::get('admin/riwayat', function () { 
        return view('admin.riwayat'); 
    })->name('admin.riwayat');

    Route::get('admin/pengaturan', function () { 
        return view('admin.pengaturan'); 
    })->name('admin.pengaturan');


    // --- Action Admin Lainnya (Proses Form yang belum pakai Controller) ---
    
    // Manajemen Kamar
    Route::post('/tambah_kamar', function () { return back(); });
    Route::put('/edit_kamar', function () { return back(); });
    Route::delete('/hapus_kamar', function () { return back(); });

    // Manajemen Pembayaran
    Route::post('/proses_pembayaran', function () { return back(); });
    Route::get('/kirim_notifikasi', function () { return back(); });

    // Manajemen Riwayat Transaksi
    Route::post('/tambah_riwayat', function () { return back(); });
    Route::put('/edit_riwayat', function () { return back(); });
    Route::delete('/hapus_riwayat', function () { return back(); });

    // Action Pengaturan
    Route::post('/update_pengaturan', function () { return back(); });
});


// ==========================================
// ROUTE SISI PENGHUNI
// ==========================================
Route::middleware(['auth', 'role:penghuni'])->group(function () { 
    
    // --- Views Penghuni ---
    Route::get('penghuni/dashboard', function () {
        return view('penghuni.dashboard');
    })->name('penghuni.dashboard');

    Route::get('penghuni/pembayaran-manual', function () {
        return view('penghuni.pembayaran_manual');
    })->name('penghuni.pembayaran-manual');

    Route::get('penghuni/pembayaran', function () {
        return view('penghuni.pembayaran_penghuni');
    })->name('penghuni.pembayaran');

    Route::get('penghuni/profile', function () {
        return view('penghuni.profile_penghuni');
    })->name('penghuni.profile');


    // --- Profil Bawaan Breeze ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // --- Action Penghuni (Proses Form) ---
    Route::post('/update-profile', function () {
        return redirect()->back()->with('success', 'Profil berhasil diupdate!');
    })->name('penghuni.update-profile');

    Route::post('/proses_bayar_penghuni', function () {
        // Logic upload dari modal gateway
        return redirect()->back();
    });

    Route::post('/proses_bayar_manual', function () {
        // Logic upload dari halaman upload manual
        return redirect('/penghuni/pembayaran');
    });
});

// Route autentikasi bawaan Breeze
require __DIR__.'/auth.php';