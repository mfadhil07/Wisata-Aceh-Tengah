<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('user.login', [
            'title' => 'Login'
        ]);
    }

    public function store(Request $request)
    {
        $valid = User::all();
        $valid = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($valid)) {
            $request->session()->put('user', $valid);
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->with('loginError', 'Login failed');
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return Redirect('/');
    }

    public function test(Request $request)
    {
        $data = $request->session()->get('user');
        // return session()->has('user');
        return $data['username'];
    }
}
