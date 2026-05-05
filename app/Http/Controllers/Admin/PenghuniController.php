<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Penghuni;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PenghuniController extends Controller
{
    // READ: Tampil data ke tabel
    public function index()
    {
        $penghunis = Penghuni::with('user')->get();
        
        $totalPria = Penghuni::where('jenis_kelamin', 'L')->count();
        $totalWanita = Penghuni::where('jenis_kelamin', 'P')->count();

        return view('admin.data_penghuni', compact('penghunis', 'totalPria', 'totalWanita'));
    }

    // CREATE: Proses insert data
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            // 1. Bikin akun login dulu
            $user = User::create([
                'username' => $request->nama_akun,
                'password' => Hash::make($request->password),
                'role' => 'penghuni',
            ]);

            // 2. Insert data biodata penghuni
            Penghuni::create([
                'id_user' => $user->id,
                'id_kamar' => null, // Dikosongin dulu, nanti diisi pas assign kamar
                'nama_penghuni' => $request->nama,
                'usia' => $request->usia,
                'jenis_kelamin' => $request->jk, // Udah kita set 'L' atau 'P' di form
                'no_telepon' => $request->kontak,
                'no_telepon_orangtua' => $request->kontak_ortu,
            ]);
        });

        return back()->with('success', 'Akun & data penghuni berhasil ditambahkan!');
    }

    // DELETE: Proses hapus data
    public function destroy(Request $request)
    {
        $user = User::where('username', $request->akun)->first();
        if ($user) {
            $user->delete(); // Data penghuni otomatis kehapus karena onDelete('set null') / ('cascade')
        }

        return back()->with('success', 'Data penghuni berhasil dihapus!');
    }
}