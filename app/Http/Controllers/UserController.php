<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,staff',
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->route('users.index')->with('success', 'Akun berhasil dibuat');
    }

    public function destroy(User $user)
    {
        if ($user->id === Auth::guard()->id()) {
            return back()->with('error', 'Tidak bisa menghapus akun sendiri');
        }

        $user->delete();

        return back()->with('success', 'Akun dihapus');
    }

    public function promote(User $user)
    {
        if ($user->role === 'admin') {
            return back()->with('error', 'Akun ini sudah admin');
        }

        $user->update(['role' => 'admin']);

        return back()->with('success', "{$user->name} sekarang menjadi admin");
    }

    public function demote(User $user)
    {
        if ($user->id === Auth::guard()->id()) {
            return back()->with('error', 'Tidak bisa menurunkan role akun sendiri');
        }

        $user->update(['role' => 'staff']);

        return back()->with('success', "{$user->name} sekarang menjadi staff");
    }
}
