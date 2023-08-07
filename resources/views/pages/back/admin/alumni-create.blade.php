@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12 col-lg-md-12 col-lg-12">
                <div class="breadcrumb shadow rounded">
                    @include('partials.back.breadcrumb')
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 div-md-12 col-lg-12">
                <div class="card rounded shadow border-0">
                    <div class="card-title border-bottom border-2 border-primary">
                        <h4 class="px-3 py-3 px-lg-4 py-lg-4 mb-0">Input Data Alumni</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.alumni_store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="nama" class="col-sm-2 col-form-label">Nama Siswa</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" class="form-control" name="nama"
                                        id="nama" placeholder="Nama Siswa" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nis" class="col-sm-2 col-form-label">Nomor Induk Siswa</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" class="form-control" name="nis"
                                        id="nis" placeholder="Nomor Induk Siswa" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="telp" class="col-sm-2 col-form-label">No Telp</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="telp" id="telp"
                                        placeholder="Nomor Telp" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tgl_lhr" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="kelamin" id="kelamin" required>
                                        <option selected>Pilih...</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="jurusan" id="jurusan" required>
                                        <option selected>Pilih...</option>
                                        <option value="IPA">IPA</option>
                                        <option value="IPS">IPS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="graduate" class="col-sm-2 col-form-label">Tahun Lulus</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="thn_lulus" id="th_lulus"
                                        placeholder="Tahun Lulus" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="keterserapan" class="col-sm-2 col-form-label">Keterserapan</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="keterserapan" id="keterserapan" required>
                                        <option selected>Pilih...</option>
                                        <option value="Wirausaha">Wirausaha</option>
                                        <option value="Pendidikan Profesi">Pendidikan Profesi</option>
                                        <option value="Masa Tunggu">Masa Tunggu</option>
                                        <option value="Kuliah">Kuliah</option>
                                        <option value="Bekerja">Bekerja</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Alamat" required></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                            </div>
                            <div class="btn-save">
                                <button type="submit" class="btn btn-primary btn-md" style="float:right">
                                    <span>Save</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card rounded shadow border-0">
                    <div class="card-title my-4 mx-4">
                        <h4>Upload Data By Excel</h4>
                    </div>
                    <div class="card-body">
                        <form action="/admin/upload-data-alumni" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="excel_file" id="excel_file">
                            <button type="submit" class="btn btn-primary btn-md" style="float:right">
                                <span>Upload</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
