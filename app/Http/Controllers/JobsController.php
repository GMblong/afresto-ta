<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


class JobsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Autentikasi pengguna
        $this->middleware('admin'); // Autentikasi admin
        $this->middleware('alumni'); // Autentikasi alumni
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jobs = new Jobs;

        $jobs->judul = $request->judul;
        $jobs->nama_perusahaan = $request->nama_perusahaan;
        $jobs->lokasi_perusahaan = $request->lokasi_perusahaan;
        $jobs->deskripsi = $request->deskripsi;

        $jobs->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Jobs $jobs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jobs $jobs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jobs $jobs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jobs $jobs)
    {
        //
    }
}
