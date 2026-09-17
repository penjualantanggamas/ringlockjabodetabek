<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Menampilkan daftar semua customer terdaftar
     */
    public function index()
    {
        // Mengambil semua user dengan role 'customer' urut dari yang terbaru
        $customers = User::where('role', 'customer')
                         ->orderBy('created_at', 'desc')
                         ->get();
        
        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Membantu mereset password customer jika mereka lupa
     */
    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'new_password' => 'required|string|min:8',
        ]);

        $customer = User::findOrFail($id);
        $customer->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password untuk customer ' . $customer->name . ' berhasil diperbarui!');
    }
}