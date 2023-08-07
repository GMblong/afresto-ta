@extends('layouts.guests')
@section('content')
    <div class="container-fluid">
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
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIS</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Jurusan</th>
                                        <th>Tahun Lulus</th>
                                        <th>Keterserapan</th>
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
    </div>
@endsection()
