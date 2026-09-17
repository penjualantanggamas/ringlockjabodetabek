<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Menampilkan halaman checkout dengan data user terisi otomatis
     */
    public function index()
    {
        // Mengambil data user yang sedang login
        $user = Auth::user();

        return view('checkout', compact('user'));
    }
}