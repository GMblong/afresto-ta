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
                        <h4 class="px-3 py-3 px-lg-4 py-lg-4 mb-0 text-start">Daftar Alumni</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="viewTables" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Keterserapan</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Profesi</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Sakyamous</td>
                                    <td>IPA</td>
                                    <td>Google</td>
                                    <td>Programmer</td>
                                    <td>Disetujui</td>
                                    <td>
                                        <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#verification">Verifikasi</a>
                                        <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#detailData">Detail</a>
                                    </td>
                                </tr>
                                <!-- Verification Modal Start -->
                                <div class="modal fade" id="verification" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label for="jovVerif" class="form-label">Verifikasi</label>
                                                            <select id="jovVerif" class="form-select">
                                                                <option selected>Pilih...</option>
                                                                <option>Disetujui</option>
                                                                <option>Ditolak</option>
                                                                <option>Pending</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Verification Modal End --}}

                                <!-- Detail Data Modal Start -->
                                <div class="modal fade" id="detailData" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header border-bottom border-1">
                                                <h4 class="modal-title" id="exampleModalLabel">Detail
                                                    Apply Kerja Alumni
                                                </h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12 col-md-12">
                                                        <div class="mb-3 d-block">
                                                            <h5>Nama Alumni</h5>
                                                            <span>Sakyamous</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Detail Data Modal End --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
