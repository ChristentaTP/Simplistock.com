<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminGudang;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cek ke tabel admin terlebih dahulu
        $admin = AdminGudang::where('username', $request->username)->first();
        if ($admin && $request->password===$admin->password) {
            // Simpan session login
            session([
                'role' => 'admin',
                'user_id' => $admin->id,
                'username' => $admin->username
            ]);
            return redirect()->route('admin.dashboard');
        }

        // Jika bukan admin, cek ke pegawai
        $pegawai = Pegawai::where('username', $request->username)->first();
        if ($pegawai && $request->password === $pegawai->password){
            session([
                'role' => 'pegawai',
                'user_id' => $pegawai->id,
                'username' => $pegawai->username
            ]);
            return redirect()->route('pegawai.dashboard');
        }

        // Jika tidak ditemukan
        return back()->withErrors([
            'username' => 'Username atau password salah'
            ])->withInput();
    }
}
