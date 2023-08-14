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
                        <h4 class="px-3 py-3 px-lg-4 py-lg-4 mb-0">Daftar Lowongan Pekerjaan</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th style="width: 200px;">Judul Pekerjaan</th>
                                    <th style="width: 300px;">Nama Perusahaan</th>
                                    <th style="width: 300px;">Lokasi Perusahaan</th>
                                    <th >Gambar</th>
                                    <th>Deskripsi</th>
                                    <th class="no-export">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $number = 1;
                                @endphp
                                @foreach ($jobs as $row)
                                    <tr class="align-middle" style="height: 60px;">
                                        <td>{{ $number }}</td>
                                        <td>{{ $row->judul }}</td>
                                        <td>{{ $row->nama_perusahaan }}</td>
                                        <td>{{ $row->lokasi_perusahaan }}</td>
                                        <td>
                                            <a href="{{ asset('storage/images/' . $row->image) }}" data-bs-toggle="modal" data-bs-target="#modal-{{ $row->id }}">
                                                <img src="{{ asset('storage/images/' . $row->image) }}" width="50" alt="">
                                            </a>
                                            <!-- Modal for Image Preview -->
                                            <div class="modal fade" id="modal-{{ $row->id }}" tabindex="-1" aria-labelledby="modalLabel-{{ $row->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="modalLabel-{{ $row->id }}">Preview Gambar</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="{{ asset('storage/images/' . $row->image) }}" class="img-fluid" alt="Preview Gambar">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {!! nl2br($row->deskripsi) !!}
                                        </td>
                                        <td class="no-export">
                                            <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#{{ $row->id }}">Detail</a>
                                            <a href="{{ route('admin.job_edit', $row->id) }}" class="btn btn-success btn-sm">Update</a>
                                            <a href="{{ route('admin.job_delete', $row->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Menghapus Data?')">Hapus</a>
                                        </td>
                                    </tr>
                                    @php
                                        $number++;
                                    @endphp
                                    <!-- Jobs Modal Start -->
                                    <div class="modal fade" id="{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="detailModalLabel-{{ $row->id }}">Detail Lowongan Pekerjaan</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body d-block">
                                                <div class="mb-2">
                                                    <h5>Gambar</h5>
                                                    <a href="{{ asset('storage/images/' . $row->image) }}">
                                                        <img src="{{ asset('storage/images/' . $row->image) }}" width="100%" alt="">
                                                    </a>
                                                    <div class="border-bottom mt-2"></div>
                                                </div>
                                                <div class="mb-2">
                                                    <h5>Judul Pekerjaan</h5>
                                                    <span class="fs-4">{{ $row->judul }}</span>
                                                    <div class="border-bottom mt-2"></div>
                                                </div>
                                                <div class="mb-2">
                                                    <h5>Nama Perusahaan</h5>
                                                    <span class="fs-4">{{ $row->nama_perusahaan }}</span>
                                                    <div class="border-bottom mt-2"></div>
                                                </div>
                                                <div class="mb-2">
                                                    <h5>Lokasi Perusahaan</h5>
                                                    <span class="fs-4">{{ $row->lokasi_perusahaan }}</span>
                                                    <div class="border-bottom mt-2"></div>
                                                </div>
                                                <div class="mb-2">
                                                    <h5>Deskripsi</h5>
                                                    <span class="fs-4">{{ $row->deskripsi }}</span>
                                                    <div class="border-bottom mt-2"></div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    {{-- Jobs Modal End --}}
                                    <!-- Deskripsi Modal Start -->
                                    <div class="modal fade" id="deskripsiModal-{{ $row->id }}" tabindex="-1" aria-labelledby="deskripsiModalLabel-{{ $row->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="deskripsiModalLabel-{{ $row->id }}">Deskripsi Pekerjaan</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                {!! nl2br($row->deskripsi) !!}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Deskripsi Modal End -->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
