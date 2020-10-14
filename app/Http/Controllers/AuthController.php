<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function index()
    {
        return view('page.auth.index');
    }

    public function procesLogin(Request $request)
    {
        $login = Auth::guard('employee')->attempt([
            'email'    => $request->email,
            'password' => $request->password,
        ]);

        if (!$login) {
            return redirect()->route('default')->withErrors(['Email / Password salah']);
        }

        if (Auth::guard('employee')->user()->level_id == 1) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('mitra');
        }
    }

    public function logout()
    {
        $loggingOut = Auth::logout();
        return redirect()->route('default');
    }
}
