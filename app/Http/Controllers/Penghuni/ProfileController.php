<?php

namespace App\Http\Controllers\Penghuni;

use App\Http\Controllers\Controller;
use App\Models\Penghuni;
use App\Models\Kamar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $penghuni = Penghuni::where('id_user', $user->id)->first();
        $kamar = null;

        if ($penghuni && $penghuni->id_kamar) {
            $kamar = Kamar::find($penghuni->id_kamar);
        }

        return view('penghuni.profile_penghuni', compact('user', 'penghuni', 'kamar'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $penghuni = Penghuni::where('id_user', $user->id)->first();

        $request->validate([
            'nama'       => 'required|string|max:255',
            'usia'       => 'required|integer|min:1',
            'kontak'     => 'required|string|max:20',
            'kontak_ortu'=> 'required|string|max:20',
            'jk'         => 'required|string|in:L,P',
        ]);

        // Update data penghuni
        if ($penghuni) {
            $penghuni->update([
                'nama_penghuni'       => $request->nama,
                'usia'                => $request->usia,
                'no_telepon'          => $request->kontak,
                'no_telepon_orangtua' => $request->kontak_ortu,
                'jenis_kelamin'       => $request->jk,
            ]);
        }

        // Update nama di user
        $user->name = $request->nama;

        // Update password jika diisi
        if ($request->filled('password')) {
            $request->validate(['password' => 'string|min:6']);
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diupdate!');
    }
}
