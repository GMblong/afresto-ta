<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengumuman;
use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AlumniController extends Controller
{
    public function loginAlumni(Request $request)
    {
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

    public function index()
    {
        $jobs = Jobs::orderBy('created_at')->get();
        //count persentase
        $totalData = Alumni::count();
        $desiredDataCount1 = Alumni::where('keterserapan', 'wirausaha')->count();
        $desiredDataCount2 = Alumni::where('keterserapan', 'pendidikan profesi')->count();
        $desiredDataCount3 = Alumni::where('keterserapan', 'masa tunggu')->count();
        $desiredDataCount4 = Alumni::where('keterserapan', 'kuliah')->count();
        $desiredDataCount5 = Alumni::where('keterserapan', 'bekerja')->count();
        $percent1 = ($desiredDataCount1 / $totalData) * 100;
        $percent2 = ($desiredDataCount2 / $totalData) * 100;
        $percent3 = ($desiredDataCount3 / $totalData) * 100;
        $percent4 = ($desiredDataCount4 / $totalData) * 100;
        $percent5 = ($desiredDataCount5 / $totalData) * 100;

        $alumni = Alumni::orderby('created_at')->get();
        $count = Alumni::select('keterserapan')->count();
        $wirausaha = Alumni::where('keterserapan', 'wirausaha')->count();
        $bekerja = Alumni::where('keterserapan', 'bekerja')->count();
        $profesi = Alumni::where('keterserapan', 'pendidikan profesi')->count();
        $tunggu = Alumni::where('keterserapan', 'masa tunggu')->count();
        $kuliah = Alumni::where('keterserapan', 'kuliah')->count();
        $data = [
            'title' => 'Dashboard',
            'alumni' => $alumni,
            'count' => $count,
            'wirausaha' => $wirausaha,
            'bekerja' => $bekerja,
            'profesi' => $profesi,
            'tunggu' => $tunggu,
            'kuliah' => $kuliah,
            'percent1' => $percent1,
            'percent2' => $percent2,
            'percent3' => $percent3,
            'percent4' => $percent4,
            'percent5' => $percent5,
            'jobs' => $jobs,
        ];
        return view('pages.back.alumni.index', $data);
    }

    public function alumniList()
    {
        $alumni = Alumni::orderBy('created_at')->get();
        $data = [
            'alumni' => $alumni,
            'title' => 'Daftar Alumni',
            'breadcrumb' => 'Daftar Alumni'
        ];
        return view('pages.back.alumni.alumni_list', $data);
    }

    public function input_loker()
    {
        $data = [
            'title' => 'Input Lowongan Pekerjaan',
            'breadcrumb' => 'Input Lowongan Kerja'
        ];
        return view('pages.back.alumni.alumni_input_loker', $data);
    }

    public function loker_list()
    {
        $jobs = Jobs::orderBy('created_at')->get();
        $data = [
            'jobs' => $jobs,
            'title' => 'Daftar Lowongan Pekerjaan',
            'breadcrumb' => 'Daftar Lowongan Pekerjaan'
        ];
        return view('pages.back.alumni.alumni_loker_list', $data);
    }

    public function pengumuman()
    {
        $pengumuman = Pengumuman::orderBy('created_at')->get();
        $data = [
            'pengumuman' => $pengumuman,
            'title' => 'Aktivitas Alumni',
            'breadcrumb' => 'Aktivitas Alumni'
        ];
        return view('pages.back.alumni.alumni_activity', $data);
    }

    public function account()
    {
        $data = [
            'title' => 'Account',
            'breadcrumb' => 'Account'
        ];
        return view('pages.back.alumni.account', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $alumni = new Alumni;

        $alumni->nama           = $request->nama;
        $alumni->nis            = $request->nis;
        $alumni->telp           = $request->telp;
        $alumni->tgl_lahir      = $request->tgl_lahir;
        $alumni->kelamin        = $request->kelamin;
        $alumni->jurusan        = $request->jurusan;
        $alumni->thn_lulus      = $request->thn_lulus;
        $alumni->keterserapan   = $request->keterserapan;
        $alumni->alamat         = $request->alamat;

        $alumni->save();
        return redirect()->route('admin.alumni_list');
    }

    public function delete($id)
    {
        $alumni = Alumni::where('id', $id);
        $alumni->delete();
        return redirect()->back();
    }

    public function show(Alumni $alumni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumni $alumni)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $alumni = Alumni::findorFail($id);
        $update = $request->all();

        $alumni->update($update);

        return redirect()->route('admin.alumni_list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumni $alumni)
    {
        //
    }
}
