<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'storename' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);

        User::create([
            'storename' => $request->storename,
            'email'=> $request->email,
            'password' => Hash::make($request->password)
        ]);

        auth()->attempt($request->only('email', 'password'));
        // authenticate
        return redirect()->route('home');

    }
}
