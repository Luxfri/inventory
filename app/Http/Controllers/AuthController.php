<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ---------- LOGIN ----------

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/products');
        }

        return back()
            ->withErrors(['email' => 'Email atau password salah'])
            ->onlyInput('email');
    }

    // ---------- REGISTER ----------

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Register publik SELALU role terendah.
        // Admin tidak pernah dibuat lewat form ini — lihat CreateAdminCommand
        // atau panel Kelola User (khusus admin) untuk membuat/mempromosikan admin.
        $data['role'] = 'staff';
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect('/products')->with('success', 'Registrasi berhasil, selamat datang!');
    }

    // ---------- LOGOUT ----------

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}