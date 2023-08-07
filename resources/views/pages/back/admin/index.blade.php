@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card shadow">
                    <div class="card-title border-bottom border-2 border-primary">
                        <h5 class="px-3 py-3 px-lg-4 py-lg-4 mb-0">Kategori Alumni</h5>
                    </div>
                    <div class="card-body">
                        <div class="row d-flex flex-align-center justify-content-center align-items-center my-lg-4">
                            <div class="col-4 col-md-6 col-lg-3 rounded bg-white shadow p-0 mx-2 my-2">
                                <div class="category fw-bold px-2 py-2 bg-primary rounded text-white text-center">
                                    Wirausaha
                                </div>
                                <div class="total text-center py-3 fw-bold">{{ $wirausaha }}</div>
                            </div>
                            <div class="col-4 col-md-6 col-lg-3 rounded bg-white shadow p-0 mx-2 my-2">
                                <div class="category fw-bold px-2 py-2 bg-success rounded text-white text-center">
                                    Pend Profesi
                                </div>
                                <div class="total text-center py-3 fw-bold">{{ $profesi }}</div>
                            </div>
                            <div class="col-4 col-md-6 col-lg-3 rounded bg-white shadow p-0 mx-2 my-2">
                                <div class="category fw-bold px-2 py-2 bg-warning rounded text-white text-center">
                                    Masa Tunggu
                                </div>
                                <div class="total text-center py-3 fw-bold">{{ $tunggu }}</div>
                            </div>
                            <div class="col-4 col-md-6 col-lg-3 rounded bg-white shadow p-0 mx-2 my-2">
                                <div class="category fw-bold px-2 py-2 rounded text-white text-center"
                                    style="background-color: #ea0e5e">
                                    Kuliah
                                </div>
                                <div class="total text-center py-3 fw-bold">{{ $kuliah }}</div>
                            </div>
                            <div class="col-4 col-md-6 col-lg-3 rounded bg-white shadow p-0 mx-2 my-2">
                                <div class="category fw-bold px-2 py-2 rounded text-white text-center"
                                    style="background-color: #6739b2">
                                    Bekerja
                                </div>
                                <div class="total text-center py-3 fw-bold">{{ $bekerja }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card shadow">
                    <div class="card-title border-bottom border-2 border-primary">
                        <h5 class="px-3 py-3 px-lg-4 py-lg-4 mb-0">Persentase Keterserapan Alumni</h5>
                    </div>
                    <div class="card-body">
                        <div id="piechart" class="w-100 m-0 p-0"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card shadow border-0">
                    <div class="card-title border-bottom border-2 border-primary">
                        <h4 class="px-3 py-3 px-lg-4 py-lg-4 mb-0">Daftar Alumni</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="viewTables" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIS</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Jurusan</th>
                                    <th>Tahun Lulus</th>
                                    <th>Keterserapan</th>
                                    <th>Action</th>
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
                                        <td>{{ $row->kelamin }}</td>
                                        <td>{{ $row->jurusan }}</td>
                                        <td>{{ $row->thn_lulus }}</td>
                                        <td>{{ $row->keterserapan }}</td>
                                        <td><a href="#" class="btn btn-info btn-sm">Detail</a></td>
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
        <!-- <div class="row mt-1">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card shadow border-0">
                    <div class="card-title border-bottom border-2 border-primary">
                        <h4 class="px-3 py-3 px-lg-4 py-lg-4 mb-0">Daftar Lowongan Kerja</h4>
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
                                    <th>Gambar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                    $number = 1;
                                @endphp
                                @foreach ($jobs as $row)
                                    <tr class="align-middle">
                                        <td>{{ $number }}</td>
                                        <td>{{ $row->judul }}</td>
                                        <td>{{ $row->nama_perusahaan }}</td>
                                        <td>{{ $row->lokasi_perusahaan }}</td>
                                        <td>{{ $row->deskripsi }}</td>
                                        <td>
                                            <a href="{{ asset('storage/images/' . $row->image) }}">
                                                <img src="{{ asset('storage/images/' . $row->image) }}" width="50"
                                                alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#{{ $row->id }}">Detail</a>
                                            <a href="#" class="btn btn-dark btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#{{ $row->id }}">Apply</a>
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
                                                    <h4 class="modal-title" id="exampleModalLabel">Detail Lowongan Pekerjaan
                                                    </h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body d-block">
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
                                                    <div class="mb-2">
                                                        <h5>Gambar</h5>
                                                        <span class="fs-4">{{ $row->image }}</span>
                                                        <div class="border-bottom mt-2"></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-dark"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
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
        </div> -->
    </div>
    {{-- ApexCharts --}}
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = {
            series: [{{ $percent1 }}, {{ $percent2 }}, {{ $percent3 }}, {{ $percent4 }},
                {{ $percent5 }}
            ],
            chart: {
                width: 450,
                type: 'pie',
            },
            labels: ['Wirausaha', 'Pendidikan Profesi', 'Masa Tunggu', 'Kuliah', 'Bekerja'],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 320
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#piechart"), options);
        chart.render();
    </script>
@endsection()
