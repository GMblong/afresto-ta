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
                        <h4 class="px-3 py-3 px-lg-4 py-lg-4 mb-0">Pengumuman</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="viewTables" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Judul</th>
                                    <th>Gambar</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $number = 1;
                                @endphp
                                @foreach ($pengumuman as $row)
                                    <tr class="align-middle">
                                        <td>{{ $number}}</td>
                                        <td>{{ $row->tanggal }}</td>
                                        <td>{{ $row->judul }}</td>
                                        <td>
                                            <a href="{{ asset('storage/images/' . $row->image) }}">
                                            <img src="{{ asset('storage/images/' . $row->image) }}" width="50"
                                                alt="">
                                            </a>
                                        </td>
                                        <td>{{ $row->deskripsi }}</td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#{{ $row->id }}">Detail</a>
                                            <a href="{{ route('admin.pengumuman_edit', $row->id) }}"
                                                class="btn btn-success btn-sm">Update</a>
                                            <a href="{{ route('pengumuman.delete', $row->id) }}"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda Yakin Menghapus Data?')">Hapus</a>
                                        </td>
                                    </tr>
                                    @php
                                        $number++;
                                    @endphp
                                    <!-- Alumni Modal Start -->
                                    <div class="modal fade" id="{{ $row->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel">Detail Pengumuman</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body d-block">
                                                    <div class="mb-2">
                                                        <h5>Tanggal</h5>
                                                        <span class="fs-4">{{ $row->tanggal }}</span>
                                                        <div class="border-bottom mt-2"></div>
                                                    </div>
                                                    <div class="mb-2">
                                                        <h5>Judul</h5>
                                                        <span class="fs-4">{{ $row->judul }}</span>
                                                        <div class="border-bottom mt-2"></div>
                                                    </div>
                                                    <div class="mb-2">
                                                        <h5>Deskripsi</h5>
                                                        <span class="fs-4">{{ $row->deskripsi }}</span>
                                                        <div class="border-bottom mt-2"></div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-dark"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Alumni Modal End --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
