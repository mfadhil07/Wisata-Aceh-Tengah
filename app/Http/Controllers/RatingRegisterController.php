<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RatingRegister;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RatingregisterController extends Controller
{
    public function index()
    {
        return view('rate.rating', [
            'title' => 'Register'
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|max:255',
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        // $request->session()->flash('success', 'Registration seccessfull! Please login');
        return redirect('/rating/login')->with('success', 'Registration success! Please login');
    }
}
