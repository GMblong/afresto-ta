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
                    <h4 class="px-3 py-3 px-lg-4 py-lg-4 mb-0 text-start">Akun Alumni</h4>
                </div>
                <div class="card-body table-responsive">
                    <table id="viewTables" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th>Tahun Lulus</th>
                                <th>NIS</th>
                                <th>Password</th>
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
                                    <td>{{ $row->jurusan }}</td>
                                    <td>{{ $row->thn_lulus }}</td>
                                    <td>{{ $row->nis }}</td>
                                    <td>{{ $row->nis}}</td>
                                    
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
@endsection()