<?php

namespace App\Http\Controllers;

use App\Models\RatingRegister;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

class RatingLoginController extends Controller
{
    public function index()
    {
        return view('rate.login', [
            'title' => 'Login for rating'
        ]);
    }

    public function store(Request $request)
    {
        $valid = RatingRegister::all();
        $valid = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($valid)) {
            $request->session()->put('ratingregister', $valid);
            $request->session()->regenerate();
            return redirect()->intended('/maps');
        }
        return back()->with('loginError', 'Login failed');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return Redirect('login');
    }

    // public function test(Request $request)
    // {
    //     $data = $request->session()->get('user');
    //     // return session()->has('user');
    //     return $data['name'];
    // }
}
