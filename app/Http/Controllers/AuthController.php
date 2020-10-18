<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;

class AuthController extends Controller
{
    public function index()
    {
        return view('page.auth.index');
    }

    public function registrasi()
    {
        return view('page.auth.registrasi');
    }

    public function procesLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $login = Auth::guard('employee')->attempt([
            'email'    => $request->email,
            'password' => $request->password,
        ]);

        if (!$login) {
            return redirect()->route('default')->with('error', 'Email / Password salah');
        }

        if (Auth::guard('employee')->user()->level_id == 1) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('mitra');
        }
    }

    public function procesRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'level_id' => 2,
            'image' => "default.png"
        ]);

        return redirect()->route('default')->with('success', 'Berhasil membuat akun, Silahkan Login');
    }

    public function logout()
    {
        $loggingOut = Auth::logout();
        return redirect()->route('default');
    }
}
