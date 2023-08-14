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
                    <div class="card-title border-bottom border-2 border-primary d-flex flex-align-row justify-content-between">
                        <h4 class="px-3 py-3 px-lg-4 py-lg-4 mb-0 text-start">Daftar Alumni</h4>
                        <a href="{{route('admin.alumni_download')}}" class="btn btn-dark btn-sm mx-4 my-4">
                        <span>Akun Alumni</span>
                    </a>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="viewTables" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIS</th>
                                    <th>Jurusan</th>
                                    <th>Tahun Lulus</th>
                                    <th>Keterserapan</th>
                                    <th class="no-export">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $number = 1;
                                @endphp
                                @foreach ($alumni as $row)
                                    <tr>
                                        <td>{{ $number }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->nis }}</td>
                                        <td>{{ $row->jurusan }}</td>
                                        <td>{{ $row->thn_lulus }}</td>
                                        <td>{{ $row->keterserapan }}</td>
                                        <td class="no-export">
                                            <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#{{ $row->id }}">Detail</a>
                                            <a href="{{ route('admin.edit_alumni', $row->id) }}"
                                                class="btn btn-success btn-sm">Update</a>
                                            <a href="{{ route('admin.alumni_delete', $row->id) }}" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda Yakin Menghapus Data?');">Hapus</a>
                                        </td>
                                    </tr>
                                    @php
                                        $number++;
                                    @endphp
                                    <!-- Alumni Detail Modal Start -->
                                    <div class="modal fade" id="{{ $row->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel">Detail Alumni</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body d-block">
                                                    <div class="mb-2">
                                                        <h5>Nama</h5>
                                                        <span class="fs-4">{{ $row->nama }}</span>
                                                        <div class="border-bottom mt-2"></div>
                                                    </div>
                                                    <div class="mb-2">
                                                        <h5>NIS</h5>
                                                        <span class="fs-4">{{ $row->nis }}</span>
                                                        <div class="border-bottom mt-2"></div>
                                                    </div>
                                                    <div class="mb-2">
                                                        <h5>Jenis Kelamin</h5>
                                                        <span class="fs-4">{{ $row->kelamin }}</span>
                                                        <div class="border-bottom mt-2"></div>
                                                    </div>
                                                    <div class="mb-2">
                                                        <h5>Jurusan</h5>
                                                        <span class="fs-4">{{ $row->jurusan }}</span>
                                                        <div class="border-bottom mt-2"></div>
                                                    </div>
                                                    <div class="mb-2">
                                                        <h5>Tahun Lulus</h5>
                                                        <span class="fs-4">{{ $row->thn_lulus }}</span>
                                                        <div class="border-bottom mt-2"></div>
                                                    </div>
                                                    <div class="mb-2">
                                                        <h5>Keterserapan</h5>
                                                        <span class="fs-4">{{ $row->keterserapan }}</span>
                                                        <div class="border-bottom mt-2"></div>
                                                    </div>
                                                    <div class="mb-2">
                                                        <h5>Alamat</h5>
                                                        <span class="fs-4">{{ $row->alamat }}</span>
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
                                    {{-- Alumni Detail Modal End --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
