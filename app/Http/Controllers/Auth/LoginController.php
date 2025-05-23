<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            // Cek apakah user sudah disetujui oleh admin
            if (!$user->is_approved) {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Akun Anda belum disetujui oleh admin.');
            }
    
            // Cek role dan redirect
            if ($user->role === 'admin') {
                return redirect()->route('auth.admin.dashboard');
            } elseif ($user->role === 'customer') {
                return redirect()->route('auth/customer/qms/form');
            } else {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Akun tidak memiliki role yang valid.');
            }
        }
    
        return redirect()->route('login')->with('error', 'Email atau password salah.');
    }
    
}
