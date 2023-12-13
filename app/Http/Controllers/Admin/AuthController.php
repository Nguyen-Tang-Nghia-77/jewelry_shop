<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
class AuthController extends Controller
{
    public function login() 
    {
        if (Auth::check()) {
            return redirect()->route('user');
        }
        return view('admin.auth.login');
    }
        
    public function postLogin(Request $request) 
    {
        if (Auth::check()) {
            return redirect()->route('user');
        }
        // $credentials = [
        //     'email' => $request->email,
        //     'password' =>$request->password,
        //     // 'level' => 'admin',
        //     // 'status' => 'active'
        // ];
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('user');
        }
        return back()->with([
            'error_message' => 'Thông tin không hợp lệ',
        ]);
    }

    public function logout() 
    {
        Auth::logout();
        return redirect()->route('auth/login');
    }
}
