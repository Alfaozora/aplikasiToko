<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.login');
    }

    public function postlogin(Request $request)
    {
        $remember = $request->has('remember') ? true : false;
        if (Auth()->attempt(['name' => $request->name, 'password' => $request->password], $remember)) {
            $user = Auth::user();
        } else {
            return back()->with(['error' => 'Username atau Password Salah']);
        }
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required|min:8'
        ], [
            'name.required' => 'Username tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
            'password.min' => 'Password minimal 8 karakter!'
        ]);
        $infologin = [
            'name' => $request->name,
            'password' => $request->password
        ];
        if (Auth::attempt($infologin)) {
            return redirect()->route('home');
        } else {
            return back()->with(['error' => 'Username atau Password Salah']);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}