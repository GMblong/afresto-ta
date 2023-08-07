<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginAdmin(Request $request)
    {
        $credentials = $request->validate([
            'name'      => 'required',
            'password'  => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard');
        } else {
            return redirect()->back()->with('error', 'Login failed. Please check your credentials.');
        }
    }
}
