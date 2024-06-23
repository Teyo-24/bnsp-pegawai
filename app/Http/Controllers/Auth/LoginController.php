<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        // mengarah kehalaman login
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        // memvalidasi kolom email dan password
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request){
        Auth::logout();

        //validasi session saat ini dihapus dan tidak valid
        $request->session()->invalidate();

        //membuat token sesi baru untuk keamanan
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
