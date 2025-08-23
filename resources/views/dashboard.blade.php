@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Dashboard DUK Dinkes Kampar</h2>

    <!-- Ringkasan Card -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-bg-primary mb-3 text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Pegawai</h5>
                    <h2>{{ $totalPegawai }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-bg-success mb-3 text-center">
                <div class="card-body">
                    <h5 class="card-title">PNS</h5>
                    <h2>{{ $totalPNS }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-bg-warning mb-3 text-center">
                <div class="card-body">
                    <h5 class="card-title">PPPK</h5>
                    <h2>{{ $totalPPPK }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-bg-info mb-3 text-center">
                <div class="card-body">
                    <h5 class="card-title">Unit Kerja</h5>
                    <h2>{{ $totalTempatTugas }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik dan Diagram -->
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">Pegawai per Status Kepegawaian</div>
                <div class="card-body">
                    <canvas id="statusChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-header bg-success text-white">Pegawai per Tempat Tugas</div>
                <div class="card-body">
                    <canvas id="unitChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Pie Chart Status Kepegawaian
    var ctxStatus = document.getElementById('statusChart').getContext('2d');
    new Chart(ctxStatus, {
        type: 'pie',
        data: {
            labels: {!! json_encode(array_keys($statusCounts)) !!},
            datasets: [{
                label: 'Jumlah',
                data: {!! json_encode(array_values($statusCounts)) !!},
                backgroundColor: [
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 206, 86, 0.8)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        }
    });

    // Bar Chart Pegawai per Unit Kerja
    var ctxUnit = document.getElementById('unitChart').getContext('2d');
    new Chart(ctxUnit, {
        type: 'bar',
        data: {
            labels: {!! json_encode(array_keys($tugasCounts)) !!},
            datasets: [{
                label: 'Jumlah Pegawai',
                data: {!! json_encode(array_values($tugasCounts)) !!},
                backgroundColor: 'rgba(75, 192, 192, 0.8)'
            }]
        },
        options: {
            indexAxis: 'y',
            plugins: {
                legend: { display: false }
            }
        }
    });
</script>
@endsection