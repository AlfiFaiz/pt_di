<?php 
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    

    public function register(Request $request)
{
    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);

    // Buat user baru dengan status belum disetujui
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'is_approved' => false, // default: belum disetujui admin
    ]);

    return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan tunggu persetujuan admin.');
}

    
}
