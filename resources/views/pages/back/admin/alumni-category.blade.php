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
                <div class="card shadow">
                    <div class="card-title border-bottom border-2 border-primary">
                        <h4 class="px-3 py-3 px-lg-4 py-lg-4 mb-0">Persentase Keterserapan Alumni</h4>
                    </div>
                    <div class="card-body">
                        <div id="piechart"
                            class="w-100 d-flex flex-align-column align-items-center justify-content-center align-items-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
