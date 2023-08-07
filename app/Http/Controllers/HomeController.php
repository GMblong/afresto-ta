<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\AlumniLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home'
        ];
        return view('pages.front.home', $data);
    }

    public function alumniLogin(AlumniLoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $credentials = $request->validate([
            'nis' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('alumni')->attempt($credentials)) {
            // Jika autentikasi berhasil
            return redirect()->route('alumni.dashboard');
        }

        return back()->withErrors(['nis' => 'NIS atau password salah']);
    }
}
