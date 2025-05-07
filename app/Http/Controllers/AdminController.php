<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('auth/admin/dashboard');
    }




    public function manageUsers()
    {
        $users = User::all();
        return view('auth/admin/users', compact('users'));
    }
    public function manageUsers1()
    {
        $users = User::all();
        return view('auth/admin/belumdisetujui', compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'Akun berhasil dihapus.');
    }

    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();
        return redirect()->route('auth/admin/users')->with('success', 'Role berhasil diperbarui.');
    }
    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:Customer,admin', // Hanya menerima 'user' atau 'admin'
        ]);
        
    
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = (string) $request->role; // Pastikan role adalah string
        $user->save();
    
        return redirect()->route('admin.users')->with('success', 'Data berhasil diperbarui.');
    }
    
    public function approveUser($id)
{
    $user = User::findOrFail($id);
    $user->is_approved = true;
    $user->save();

    return redirect()->route('admin.users')->with('success', 'Akun berhasil disetujui.');
}

    
    
    

}
