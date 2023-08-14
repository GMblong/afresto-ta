<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Alumni;
use App\Models\Jobs;
use App\Models\ApplyJobs;
use App\Models\Pengumuman;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExcelImport;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name'      => 'required',
            'password'  => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            dd(Auth::attempt());
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->with('error', 'Login failed. Please check your credentials.');
        }
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
    
        return view('pages.back.admin.index', $data);
    }    

    public function alumni_list(Request $request)
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
    
        return view('pages.back.admin.alumni-list', $data);
    }
    

    public function alumni_add()
    {
        $data = [
            'title' => 'Input Alumni',
            'breadcrumb' => 'Input Alumni'
        ];
        return view('pages.back.admin.alumni-add', $data);
    }

    public function alumniStore(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'nis' => 'required',
            'telp' => 'required',
            'tgl_lahir' => 'required',
            'kelamin' => 'required',
            'jurusan' => 'required',
            'thn_lulus' => 'required',
            'keterserapan' => 'required',
            'alamat' => 'required',
            'password' => '',
        ]);

        $alumni = Alumni::create($data);
        return redirect()->route('admin.alumni_list');
    }

    public function updateAlumni(Request $request, $id)
    {
        $alumni = Alumni::findOrFail($id);
        $update = $request->all();
    
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
    
        return redirect()->route('admin.alumni_list');
    }
    

    public function alumniDownload()
    {
        $alumni = Alumni::orderby('created_at')->get();
        $data = [
            'title' => 'Download Data Alumni',
            'breadcrumb' => 'Download Data Alumni',
            'alumni' => $alumni,
        ];

        return view('pages.back.admin.alumni-download', $data);
    }

    public function alumni_category()
{
    // Hitung ulang persentase
    $totalData = Alumni::count();
    
    if ($totalData != 0) {
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
    } else {
        $percent1 = 0;
        $percent2 = 0;
        $percent3 = 0;
        $percent4 = 0;
        $percent5 = 0;
    }

    $data = [
        'title' => 'Keterserapan Alumni',
        'breadcrumb' => 'Sebaran Alumni',
        'percent1' => $percent1,
        'percent2' => $percent2,
        'percent3' => $percent3,
        'percent4' => $percent4,
        'percent5' => $percent5,
    ];

    return view('pages.back.admin.alumni-category', $data);
}

    public function alumniDelete($id)
    {
        $alumni = Alumni::where('id', $id);
        $alumni->delete();
        return redirect()->back();
    }

    public function account()
    {
        $data = [
            'title' => 'My Account',
            'breadcrumb' => 'My Account'
        ];
        return view('pages.back.admin.account', $data);
    }

    public function notification()
    {
        $data = [
            'title' => 'Buat Pengumuman',
            'breadcrumb' => 'Buat Pengumuman'
        ];
        return view('pages.back.admin.notification', $data);
    }

    public function pengumuman()
    {
        $pengumuman = Pengumuman::orderBy('created_at')->get();
        $data = [
            'pengumuman' => $pengumuman,
            'title' => 'Daftar Pengumuman',
            'breadcrumb' => 'Daftar Pengumuman'
        ];
        return view('pages.back.admin.notif-list', $data);
    }

    public function pengumumanCreate(Request $request)
    {
        $request->validate([
            'tanggal'   => 'required',
            'judul'     => 'required',
            'deskripsi' => 'required',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Change 'required' to 'nullable'
        ]);
    
        $fileName = null; // Initialize $fileName as null
    
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage/images'), $fileName);
        }
    
        $pengumuman = new Pengumuman;
    
        $pengumuman->tanggal    = $request->tanggal;
        $pengumuman->judul      = $request->judul;
        $pengumuman->deskripsi  = $request->deskripsi;
        $pengumuman->image      = $fileName;
    
        $pengumuman->save();
    
        return redirect()->route('admin.pengumuman')->with('message', 'Data berhasil tersimpan');
    }    

    public function pengumumanEdit($id)
    {
        $pengumuman = Pengumuman::findorFail($id);
        $data = [
            'title'         => 'Edit Pengumuman',
            'breadcrumb'    => 'Edit Pengumuman',
            'pengumuman'    => $pengumuman,
        ];
        return view('pages.back.admin.notification-edit', $data);
    }

    public function pengumumanUpdate(Request $request, $id)
    {
        $request->validate([
            'tanggal'   => 'required',
            'judul'     => 'required',
            'deskripsi' => 'required',
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $pengumuman = Pengumuman::findorFail($id);
        $pengumuman->tanggal = $request->tanggal;
        $pengumuman->judul = $request->judul;
        $pengumuman->deskripsi = $request->deskripsi;

        if ($request->hasFile('image')) {
            if ($pengumuman->image) {
                Storage::disk('public')->delete($pengumuman->image);
            }
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage/images'), $fileName);
            $pengumuman->image = $fileName;
        }

        $pengumuman->update();

        return redirect()->route('admin.pengumuman');
    }

    public function jobCreate()
    {
        $data = [
            'title' => 'Input Lowongan Pekerjaan',
            'breadcrumb' => 'Input Lowongan Kerja'
        ];
        return view('pages.back.admin.job-create', $data);
    }

    public function jobAdd(Request $request)
    {
        $request->validate([
            'judul'             => 'required',
            'nama_perusahaan'   => 'required',
            'lokasi_perusahaan' => 'required',
            'deskripsi'         => 'required',
            'image'             => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Change 'required' to 'nullable'
        ]);
    
        $fileName = null; // Initialize $fileName as null
    
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage/images'), $fileName);
        }
    
        $jobs = new Jobs;
    
        $jobs->judul                = $request->judul;
        $jobs->nama_perusahaan      = $request->nama_perusahaan;
        $jobs->lokasi_perusahaan    = $request->lokasi_perusahaan;
        $jobs->deskripsi            = $request->deskripsi;
        $jobs->image                = $fileName;
    
        $jobs->save();
    
        return redirect()->route('admin.job_list');
    }
    

        public function jobEdit($id)
    {
        $job = Jobs::find($id);

        if (!$job) {
            return redirect()->back()->with('error', 'Lowongan pekerjaan tidak ditemukan.');
        }

        $data = [
            'job' => $job,
            'title' => 'Edit Lowongan Pekerjaan',
            'breadcrumb' => 'Edit Lowongan Pekerjaan'
        ];

        return view('pages.back.admin.job-edit', $data);
    }

    public function jobUpdate(Request $request, $id)
    {
        $job = Jobs::find($id);

        if (!$job) {
            return redirect()->back()->with('error', 'Lowongan pekerjaan tidak ditemukan.');
        }

        $request->validate([
            'judul'             => 'required',
            'nama_perusahaan'   => 'required',
            'lokasi_perusahaan' => 'required',
            'deskripsi'         => 'required',
            'image'             => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Update job data
        $job->judul             = $request->judul;
        $job->nama_perusahaan   = $request->nama_perusahaan;
        $job->lokasi_perusahaan = $request->lokasi_perusahaan;
        $job->deskripsi         = $request->deskripsi;

        if ($request->hasFile('image')) {
            // Delete the old image
            if ($job->image) {
                Storage::disk('public')->delete('images/' . $job->image);
            }

            // Upload the new image
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage/images'), $fileName);
            $job->image = $fileName;
        }

        $job->update();

        return redirect()->route('admin.job_list')->with('success', 'Lowongan pekerjaan berhasil diperbarui.');
    }

    public function jobDelete($id)
{
    $job = Jobs::findOrFail($id);

    // Hapus gambar dari penyimpanan jika ada
    if ($job->image) {
        Storage::disk('public')->delete('images/' . $job->image);
    }

    // Hapus data lowongan pekerjaan dari database
    $job->delete();

    return redirect()->route('admin.job_list')->with('success', 'Lowongan pekerjaan berhasil dihapus.');
}

    public function lokerList()
    {
        $jobs = Jobs::orderBy('created_at')->get();
        $data = [
            'jobs' => $jobs,
            'title' => 'Daftar Lowongan Pekerjaan',
            'breadcrumb' => 'Daftar Lowongan Pekerjaan'
        ];
        return view('pages.back.admin.job-list', $data);
    }

    public function alumniApply()
    {
        $jobs = Jobs::select('jobs.judul', 'jobs.nama_perusahaan', 'apply_jobs.*', 'alumnis.nama', 'alumnis.telp', 'alumnis.jurusan')
        ->join('apply_jobs', 'jobs.id', '=', 'apply_jobs.job_id')
        ->join('alumnis', 'apply_jobs.nis', '=', 'alumnis.nis')
        ->get();
        // $data = [
        //     'jobs' => $jobs,
        //     'title' => 'Daftar Lowongan Pekerjaan',
        //     'breadcrumb' => 'Daftar Lowongan Pekerjaan'
        // ];
        $data = [
            'jobs' => $jobs,
            'title' => 'Apply Kerja Alumni',
            'breadcrumb' => 'Daftar Apply Kerja Alumni',
        ];
        return view('pages.back.admin.apply-alumni', $data);
    }

    public function verifJobs(Request $request, $id)
    {
        // dd($request->status);
        $apply = ApplyJobs::findorFail($id);
        $apply->status = $request->status;

        $apply->update();

        // dd($id);
        // dd(Auth::user()->email);
        // dd($request->job_id);
        // $apply = new ApplyJobs();
        // $apply->nis = Auth::user()->email;
        // $apply->job_id = $request->job_id; 
        // $apply->status = "Menunggu Konfirmasi";

        // $apply->save();
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Input Alumni',
            'breadcrumb' => 'Input Alumni'
        ];
        return view('pages.back.admin.alumni-create', $data);
    }

    public function editAlumni($id)
    {
        $alumni = Alumni::findorFail($id);
        $data = [
            'title' => 'Update Data Alumni',
            'breadcrumb' => 'Update Data Alumni',
            'alumni' => $alumni,
        ];
        return view('pages.back.admin.alumni-update', $data);
    }

    public function uploadExcel(Request $request)
    {
        $file = $request->file('excel_file');
    
        $request->validate([
            'excel_file' => 'required|mimes:xls,xlsx',
        ]);
    
        $data = Excel::toArray(new ExcelImport, $file);
        foreach ($data[0] as $row) {
            // Check if the required fields are not empty before creating records
            if (!empty($row[1]) && !empty($row[2])) {
                Alumni::create([
                    'nama' => $row[1],
                    'nis' => $row[2],
                    'telp' => $row[3],
                    'tgl_lahir' => Carbon::parse($row[4]),
                    'kelamin' => $row[5],
                    'jurusan' => $row[6],
                    'thn_lulus' => $row[7],
                    'keterserapan' => $row[8],
                    'alamat' => $row[9],
                ]);
    
                User::create([
                    'name' => $row[1],
                    'email' => $row[2],
                    'role' => 'alumni',
                    'password' => Hash::make($row[2]),
                ]);
            }
        }
    
        // Hitung ulang persentase setelah menambah data
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
    
        // Redirect back with updated percentages
        return redirect()->route('admin.alumni_list')
            ->with([
                'success' => 'Data berhasil diunggah ke database.',
                'percent1' => $percent1,
                'percent2' => $percent2,
                'percent3' => $percent3,
                'percent4' => $percent4,
                'percent5' => $percent5,
            ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
