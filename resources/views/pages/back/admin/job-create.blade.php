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
                        <h4 class="px-3 py-3 px-lg-4 py-lg-4 mb-0">Input Lowongan Pekerjaan</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.job_add') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="judul" class="col-sm-2 col-form-label">Judul Pekerjaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" class="judul" name="judul" id="judul"
                                        placeholder="Judul Pekerjaan">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="perusahaan" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_perusahaan" id="perusahaan"
                                        placeholder="Nama Perusahaan">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="lokasi" class="col-sm-2 col-form-label">Lokasi Perusahaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="lokasi_perusahaan" id="lokasi"
                                        placeholder="Lokasi Perusahaan">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="Alamat"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="image" id="image">
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
    </div>
@endsection()
