<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerAuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('auth.customer-login');
    }

// Memproses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Jika role-nya admin, arahkan ke dashboard admin
            if (Auth::user()->role === 'admin') {
                return redirect('/admin/dashboard'); 
            }
            
            Auth::login($user);
            // Jika customer, paksa arahkan kembali ke katalog produk
            return redirect('/produk')->with('success', 'Akun berhasil dibuat!');
        }
        return back()->withErrors([
            'auth_error' => 'Email atau password yang Anda masukkan salah.',
        ])->with('open_auth_modal', true)->onlyInput('email');
    }

    // Memproses registrasi akun baru
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'role' => 'customer',
        ]);

        Auth::login($user);

        return back()->with('success', 'Akun berhasil dibuat!');
    }

    // Memproses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/produk');
    }

    // Menampilkan halaman form edit profil beserta data lama
    public function editProfile()
    {
        $user = Auth::user();
        return view('editprofil', compact('user'));
    }

    // Memproses pembaruan data ke database
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
            'detail_alamat' => 'required|string|max:500',
            'kode_pos' => 'required|string|max:10',
        ]);

        // Update data user menggunakan instance model agar tersimpan sempurna
        $currentUser = User::find($user->id);
        $currentUser->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'detail_alamat' => $request->detail_alamat,
            'kode_pos' => $request->kode_pos,
        ]);

        return redirect('/produk')->with('success', 'Profil Anda berhasil diperbarui!');
    }
}