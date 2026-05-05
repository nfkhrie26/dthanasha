<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::middleware(['auth', 'role:owner'])->group(function () {
    Route::get('admin/dashboard', function () {
        return view('dashboard_admin');
    })->name('admin.dashboard');

    Route::get('admin/data-penghuni', function () {
        return view('data_penghuni');
    })->name('admin.data-penghuni');

    Route::get('admin/manajamen-kamar', function () {
        return view('manajemen_kamar');
    })->name('admin.manajemen-kamar');

    Route::get('admin/waiting_list', function () { 
        return view('waiting_list'); 
    })->name('admin.waiting-list');

    Route::get('admin/pembayaran', function () { 
        return view('pembayaran'); 
    })->name('admin.pembayaran');

    Route::get('admin/riwayat', function () { 
        return view('riwayat'); 
    })->name('admin.riwayat');

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
    Route::post('/tambah_riwayat', function () { 
        return back(); 
    });
    Route::put('/edit_riwayat', function () { 
        return back(); 
    });
    Route::delete('/hapus_riwayat', function () { 
        return back(); 
    });

});//buat route owner/admin

Route::middleware(['auth', 'role:penghuni'])->group(function () { 
    Route::get('penghuni/dashboard', function () {
        return view('dashboard_penghuni');
    })->name('penghuni.dashboard'); //buat route penghuni

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

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

require __DIR__.'/auth.php';
