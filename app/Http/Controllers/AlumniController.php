<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\ApplyJobs;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengumuman;
use App\Models\Jobs;
use App\Models\User;
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

        public function index(Request $request)
    {
        $keterserapan = $request->input('keterserapan');

        $alumniQuery = Alumni::orderBy('created_at');
    
        if ($keterserapan) {
            $alumniQuery->where('keterserapan', $keterserapan);
        }
    
        $alumni = $alumniQuery->get();
    
        // Hitung total data dan persentase
        $totalData = Alumni::count();
        $desiredDataCount1 = Alumni::where('keterserapan', 'wirausaha')->count();
        $desiredDataCount2 = Alumni::where('keterserapan', 'pendidikan profesi')->count();
        $desiredDataCount3 = Alumni::where('keterserapan', 'masa tunggu')->count();
        $desiredDataCount4 = Alumni::where('keterserapan', 'kuliah')->count();
        $desiredDataCount5 = Alumni::where('keterserapan', 'bekerja')->count();
    
        if ($totalData != 0) {
            $percent1 = ($desiredDataCount1 / $totalData) * 100;
            $percent2 = ($desiredDataCount2 / $totalData) * 100;
            $percent3 = ($desiredDataCount3 / $totalData) * 100;
            $percent4 = ($desiredDataCount4 / $totalData) * 100;
            $percent5 = ($desiredDataCount5 / $totalData) * 100;
        } else {
            $percent1 = 0;
            $percent2 = 0;
            $percent3 = 0;
            $percent4 = 0;
            $percent5 = 0;
        }
    
        $count = Alumni::count();
        $wirausaha = Alumni::where('keterserapan', 'wirausaha')->count();
        $bekerja = Alumni::where('keterserapan', 'bekerja')->count();
        $profesi = Alumni::where('keterserapan', 'pendidikan profesi')->count();
        $tunggu = Alumni::where('keterserapan', 'masa tunggu')->count();
        $kuliah = Alumni::where('keterserapan', 'kuliah')->count();
        $data = [
            'title' => 'Dashboard',
            'count' => $count,
            'percent1' => $percent1,
            'percent2' => $percent2,
            'percent3' => $percent3,
            'percent4' => $percent4,
            'percent5' => $percent5,
            'alumni' => $alumni,
            'wirausaha' => $wirausaha,
            'bekerja' => $bekerja,
            'profesi' => $profesi,
            'tunggu' => $tunggu,
            'kuliah' => $kuliah,
        ];

        return view('pages.back.alumni.index', $data);
    }


    public function alumniList(Request $request)
    {
        $keterserapan = $request->input('keterserapan');

        $alumniQuery = Alumni::orderBy('created_at');
    
        if ($keterserapan) {
            $alumniQuery->where('keterserapan', $keterserapan);
        }
    
        $alumni = $alumniQuery->get();
    
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
        $user = Auth::user();
    
        // Get the IDs of jobs applied by the current alumni
        $appliedJobIds = $user->appliedJobs->pluck('job_id')->toArray();
    
        // Get all jobs along with their application status for the current alumni
        $jobs = Jobs::leftJoin('apply_jobs', function($join) use ($user) {
            $join->on('jobs.id', '=', 'apply_jobs.job_id')
                ->where('apply_jobs.nis', $user->email);
        })
        ->select('jobs.*', 'apply_jobs.status')
        ->get();
    
        $data = [
            'jobs' => $jobs,
            'appliedJobIds' => $appliedJobIds, // Pass the applied job IDs to the view
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
        $alumni = Alumni::where('nis', Auth::user()->email)->first();
        if (!$alumni) {
            // Handle jika data alumni tidak ditemukan
        }
        
        $data = [
            'alumni' => $alumni,
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
    
    public function applyJobs(Request $request)
    {
        $request->validate([
            'job_id' => 'required|exists:jobs,id', // Pastikan job_id yang di-submit valid
        ]);
    
        // Cek apakah alumni sudah mengajukan lamaran untuk pekerjaan ini sebelumnya
        $existingApplication = ApplyJobs::where('nis', Auth::user()->email)
                                        ->where('job_id', $request->job_id)
                                        ->first();
        if ($existingApplication) {
            return redirect()->back()->with('error', 'Anda sudah mengajukan lamaran untuk pekerjaan ini.');
        }
    
        // Jika belum ada lamaran, buat lamaran baru
        $apply = new ApplyJobs();
        $apply->nis = Auth::user()->email;
        $apply->job_id = $request->job_id;
        $apply->status = 'Pending';
        $apply->save();
    
        return redirect()->back()->with('success', 'Lamaran pekerjaan berhasil diajukan.');
    }

    public function cancelApply($id)
{
    $user = Auth::user();
    $appliedJob = ApplyJobs::where('job_id', $id)
                            ->where('nis', $user->email)
                            ->first();

    if ($appliedJob) {
        $appliedJob->delete();
        return redirect()->back()->with('success', 'Apply pekerjaan berhasil dibatalkan.');
    }

    return redirect()->back()->with('error', 'Anda belum pernah meng-apply pekerjaan ini.');
}

    public function verifJobs(Request $request, $id)
    {
        $apply = ApplyJobs::findOrFail($id);
        $apply->status = $request->status;
        $apply->save();

        return redirect()->back()->with('success', 'Status lamaran berhasil diperbarui.');
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
// ...
public function editAlumni(Request $request, $id)
{
    $alumni = Alumni::findOrFail($id);
    $update = $request->validate([
        'nama' => 'required|string|max:255',
        'nis' => 'required|string|max:255',
        'telp' => 'required|string|max:255',
        'tgl_lahir' => 'required|date',
        'kelamin' => 'required|string|in:Laki-laki,Perempuan',
        'jurusan' => 'required|string|in:IPA,IPS',
        'thn_lulus' => 'required|integer',
        'keterserapan' => 'required|string|in:Wirausaha,Pendidikan Profesi,Masa Tunggu,Kuliah,Bekerja',
        'alamat' => 'required|string',
    ]);

    $alumni->update($update);

    // Update corresponding user data
    $user = User::where('email', $alumni->nis)->first();
    if ($user) {
        $user->update([
            'name' => $update['nama'],
            'email' => $update['nis'], 
            // Update other user fields as needed
        ]);
    }

    return redirect()->route('alumni.account')->with('success', 'Data pribadi berhasil diperbarui.');
}
// ...


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumni $alumni)
    {
        //
    }
}
