<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Alumni;
use App\Models\Jobs;
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
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->with('error', 'Login failed. Please check your credentials.');
        }
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
        //count total data
        $count = Alumni::select('keterserapan')->count();
        $alumni = Alumni::orderby('created_at')->get();
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
            'jobs' => $jobs,
        ];
        return view('pages.back.admin.index', $data);
    }

    public function alumni_list()
    {
        $alumni = Alumni::orderby('created_at')->get();
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
        $alumni = Alumni::findorFail($id);
        $update = $request->all();

        $alumni->update($update);

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
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $fileName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('storage/images'), $fileName);

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
            'image'             => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $fileName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('storage/images'), $fileName);

        $jobs = new Jobs;

        $jobs->judul                = $request->judul;
        $jobs->nama_perusahaan      = $request->nama_perusahaan;
        $jobs->lokasi_perusahaan    = $request->lokasi_perusahaan;
        $jobs->deskripsi            = $request->deskripsi;
        $jobs->image                = $fileName;

        $jobs->save();

        return redirect()->route('admin.job_list');
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
        $data = [
            'title' => 'Apply Kerja Alumni',
            'breadcrumb' => 'Daftar Apply Kerja Alumni',
        ];
        return view('pages.back.admin.apply-alumni', $data);
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

    public function upload(Request $request)
    {
        if ($request->hasFile('excel_file')) {
            $path = $request->file('excel_file')->getRealPath();

            $data = Alumni::load($path, function ($reader) {
            })->get();

            if (!empty($data) && $data->count()) {
                foreach ($data as $key => $value) {
                    // Simpan data ke database menggunakan model
                    Alumni::create([
                        'id' => $value->id,
                        'nama' => $value->nama,
                        'nis' => $value->nis,
                        'telp' => $value->telp,
                        'tgl_lahir' => $value->tgl_lahir,
                        'kelamin' => $value->kelamin,
                        'jurusan' => $value->jurusan,
                        'thn_lulus' => $value->thn_lulus,
                        'keterserapan' => $value->keterserapan,
                        'alamat' => $value->alamat,
                        'password' => $value->password,
                        // Tambahkan kolom lain sesuai dengan struktur tabel Anda
                    ]);
                }
                // Berhasil menyimpan data dari Excel ke database
                return redirect()->back()->with('success', 'Data berhasil diunggah ke database.');
            }
        }

        // Jika tidak ada file atau gagal menyimpan data
        return redirect()->back()->with('error', 'Terjadi kesalahan saat mengunggah data.');
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
        foreach ($data as $x => $row) {
//            dd($x);
            if ($row[$x] != null) {
                Alumni::create([
                    'nama'          => $row[$x][1],
                    'nis'           => $row[$x][2],
                    'telp'          => $row[$x][3],
                    'tgl_lahir'     => Carbon::parse($row[$x][4]),
                    'kelamin'       => $row[$x][5],
                    'jurusan'       => $row[$x][6],
                    'thn_lulus'     => $row[$x][7],
                    'keterserapan'  => $row[$x][8],
                    'alamat'        => $row[$x][9],
                ]);
                User::create([
                    'name' => $row[$x][2],
                    'email' => $row[$x][2],
                    'role' => 'alumni',
                    'password' => Hash::make($row[$x][2]),
                ]);
            }
        }

        return redirect()->route('admin.alumni_list');
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
