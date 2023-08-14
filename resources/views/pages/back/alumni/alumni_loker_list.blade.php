@extends('layouts.alumni')

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
                                <th>Judul Pekerjaan</th>
                                <th>Nama Perusahaan</th>
                                <th>Lokasi Perusahaan</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $number = 1;
                            @endphp
                            @foreach ($jobs as $row)
                            @php
                                // Mengambil data pekerjaan yang di-apply oleh alumni saat ini
                                $appliedJobs = Auth::user()->appliedJobs->pluck('job_id')->toArray();
                                $appliedJob = in_array($row->id, $appliedJobs);
                            @endphp
                            <tr class="align-middle">
                                <td>{{ $number }}</td>
                                <td>{{ $row->judul }}</td>
                                <td>{{ $row->nama_perusahaan }}</td>
                                <td>{{ $row->lokasi_perusahaan }}</td>
                                <td>
                                    @if ($appliedJob)
                                    @if ($row->status == 'Disetujui')
                                    <span class="btn btn-success btn-sm">{{ $row->status }}</span>
                                    @elseif ($row->status == 'Ditolak')
                                    <span class="btn btn-danger btn-sm">{{ $row->status }}</span>
                                    @elseif ($row->status == 'Pending')
                                    <span class="btn btn-warning btn-sm">{{ $row->status }}</span>
                                    @else
                                    <span class="btn btn-secondary btn-sm">{{ $row->status }}</span>
                                    @endif
                                    @else
                                    <span class="text-muted">Belum Apply</span>
                                    @endif
                                <td>
                                    {!! nl2br($row->deskripsi) !!}
                                </td>
                                </td>
                                <td>
                                    <a href="{{ asset('storage/images/' . $row->image) }}" data-bs-toggle="modal" data-bs-target="#modal-{{ $row->id }}">
                                        <img src="{{ asset('storage/images/' . $row->image) }}" width="50" alt="">
                                    </a>
                                </td>
                                <td>
                                    @if (!$appliedJob)
                                    <form action="{{ route('alumni.apply') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="job_id" value="{{ $row->id }}">
                                        <button type="submit" class="btn btn-dark btn-sm">Apply</button>
                                    </form>
                                    @elseif ($row->status == 'Pending')
                                    <a href="{{ route('alumni.cancel_apply', ['id' => $row->id]) }}" class="btn btn-danger btn-sm">Cancel</a>
                                    @endif
                                </td>
                            </tr>
                            @php
                            $number++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@foreach ($jobs as $row)
<!-- Jobs Modal Start -->
<div class="modal fade" id="modal-{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Detail Lowongan Pekerjaan</h4>
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
                @if ($row->status == 'Pending')
                <form method="POST" action="{{ route('alumni.apply') }}">
                    @csrf
                    <input name="job_id" type="hidden" id="job_id" value="{{ $row->id }}">
                    <div class="btn-login mt-2">
                        <button type="submit" class="btn btn-primary btn-md rounded-pill w-100 my-2">
                            <span>Apply</span>
                        </button>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
