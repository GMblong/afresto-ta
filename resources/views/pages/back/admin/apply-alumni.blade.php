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
                        <h4 class="px-3 py-3 px-lg-4 py-lg-4 mb-0 text-start">Daftar Pelamar</h4>
                    </div>
                    <div class="card-body table-responsive">
                    <table id="viewTables" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pelamar</th>
                                    <th>Telp</th>
                                    <th>Jurusan</th>
                                    <th>Pekerjaan</th>
                                    <th>Perusahaan</th>
                                    <th>Status</th>
                                    <th>Verifikasi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                    $number = 1;
                                @endphp
                                @foreach ($jobs as $row)
                                    <tr class="align-middle">
                                    <td>{{ $number }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->telp }}</td>
                                        <td>{{ $row->jurusan }}</td>
                                        <td>{{ $row->judul }}</td>
                                        <td>{{ $row->nama_perusahaan }}</td>
                                        <td>
                                        @if($row->status == 'Disetujui')
                                            <a href="#" class="btn btn-success btn-sm">
                                                {{ $row->status }}
                                            </a>
                                        @elseif($row->status == 'Ditolak')
                                            <a href="#" class="btn btn-danger btn-sm">
                                                {{ $row->status }}
                                            </a>
                                        @else($row->status == 'Pending')
                                            <a href="#" class="btn btn-warning btn-sm">
                                                {{ $row->status }}
                                            </a>
                                        @endif
                                        
                                        </td>
                                        <td>
                                            <!-- <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#{{ $row->id }}">Detail</a> -->
                                            <a href="#" class="btn btn-dark btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#{{ $row->id }}">Verifikasi</a>
                                        </td>
                                    </tr>
                                    @php
                                        $number++;
                                    @endphp
                                    <!-- Jobs Modal Start -->
                                    <div class="modal fade" id="{{ $row->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel">Verifikasi Lamaran
                                                    </h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body d-block">
                                                    
                                                    <form method="POST" action="{{ route('admin.verif_jobs', $row->id) }}">
                                                        @csrf
                                                        @method('put')
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label for="status" class="form-label">Verifikasi</label>
                                                                <select name="status" id="status" class="form-select">
                                                                    <option value="" selected>Pilih...</option>
                                                                    <option value="Disetujui">Disetujui</option>
                                                                    <option value="Ditolak">Ditolak</option>
                                                                    <option value="Pending">Pending</option>
                                                                </select>
                                                            </div>
                                                         </div>
                                                        <input name="job_id" type="hidden" id="job_id" value="{{ $row->id }}">
                                                        <div class="btn-login mt-8">
                                                            <button type="submit" class="btn btn-primary btn-md rounded-pill w-100 my-2">
                                                                <span>Verifikasi</span>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Jobs Modal End --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
