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
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card shadow border-0">
                <div class="card-title border-bottom border-2 border-primary">
                    <h4 class="px-3 py-3 px-lg-4 py-lg-4 mb-0">Edit Lowongan Pekerjaan</h4>
                </div>
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('admin.job_update', $job->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Pekerjaan</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="{{ $job->judul }}">
                        </div>
                        <div class="mb-3">
                            <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="{{ $job->nama_perusahaan }}">
                        </div>
                        <div class="mb-3">
                            <label for="lokasi_perusahaan" class="form-label">Lokasi Perusahaan</label>
                            <input type="text" class="form-control" id="lokasi_perusahaan" name="lokasi_perusahaan" value="{{ $job->lokasi_perusahaan }}">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $job->deskripsi }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        @if ($job->image)
                            <div class="mb-3">
                                <img src="{{ asset('storage/images/' . $job->image) }}" alt="Lowongan Pekerjaan" width="150">
                            </div>
                        @endif
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
