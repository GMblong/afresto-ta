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
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-title border-bottom border-2 border-primary">
                    <h4 class="px-3 py-3 px-lg-4 py-lg-4 mb-0">Account Details</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <h5 class="mb-4">Ubah Data Pribadi</h5>
                            <form action="{{ route('alumni.editAlumni', $alumni->id) }}" method="POST">
                                @csrf
                                @method('put')
                            <div class="row mb-3">
                                <label for="nama" class="col-sm-2 col-form-label">Nama Siswa</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" class="form-control" name="nama"
                                        id="nama" value="{{ $alumni->nama }}" placeholder="Nama Siswa" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nis" class="col-sm-2 col-form-label">Nomor Induk Siswa</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" class="form-control" name="nis"
                                        id="nis" value="{{ $alumni->nis }}" placeholder="Nomor Induk Siswa" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="telp" class="col-sm-2 col-form-label">No Telp</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="telp" id="telp"
                                        value="{{ $alumni->telp }}" placeholder="Nomor Telp" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir"
                                        value="{{ $alumni->tgl_lahir }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="kelamin" id="kelamin" required>
                                        <option value="{{ $alumni->kelamin }}" selected>{{ $alumni->kelamin }}</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="jurusan" id="jurusan" required>
                                        <option value="{{ $alumni->jurusan }}" selected>{{ $alumni->jurusan }}</option>
                                        <option value="IPA">IPA</option>
                                        <option value="IPS">IPS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="graduate" class="col-sm-2 col-form-label">Tahun Lulus</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="thn_lulus" id="th_lulus"
                                        value="{{ $alumni->thn_lulus }}" placeholder="Tahun Lulus" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="keterserapan" class="col-sm-2 col-form-label">Keterserapan</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="keterserapan" id="keterserapan" required>
                                        <option value="{{ $alumni->keterserapan }}" selected>{{ $alumni->keterserapan }}
                                        </option>
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
                                    <input type="text" class="form-control" name="alamat" id="alamat"
                                        rows="3" value="{{ $alumni->alamat }}" placeholder="Alamat" required>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-success btn-md">
                                    <span>Update</span>
                                </button>
                            </div>
                            </form>
                        </div>
                        <div class="col-12 col-md-12 col-lg-12">
                            <h5 class="mb-4">Ubah Password?</h5>
                            <form action="{{ route('password.update') }}" method="post">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label for="current_password" class="form-label">Password Saat Ini</label>
                                    <input type="password" class="form-control" name="current_password"
                                        id="current_password" autocomplete="current-password">
                                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password Baru</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        autocomplete="new-password">
                                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Ulangi Password Baru</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        id="password_confirmation" autocomplete="new-password">
                                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                </div>
                                <button type="submit" class="btn btn-dark btn-md" style="float: right;">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection()
