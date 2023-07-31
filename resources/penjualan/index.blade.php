<!-- resources/views/penjualan/index.blade.php -->

@extends('layouts.app') <!-- Jika Anda memiliki layout, sesuaikan dengan layout yang Anda gunakan -->

@section('content')
    <h1>Data Penjualan</h1>

    <!-- Tabel Data Penjualan -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penjualanData as $penjualan)
                <tr>
                    <td>{{ $penjualan->id }}</td>
                    <td>{{ $penjualan->productName }}</td>
                    <td>{{ $penjualan->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Highcharts -->
    <div id="chartContainer" style="height: 300px;"></div>

    <!-- Script Highcharts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        // Data penjualan untuk grafik
        const penjualanData = {!! json_encode($penjualanData) !!};
        
        // Format data penjualan ke dalam array untuk grafik
        const chartData = penjualanData.map(item => ({
            name: item.productName,
            y: parseFloat(item.price)
        }));
        
        // Inisialisasi grafik menggunakan Highcharts
        Highcharts.chart('chartContainer', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Grafik Data Penjualan'
            },
            xAxis: {
                categories: chartData.map(item => item.name),
                title: {
                    text: 'Produk'
                }
            },
            yAxis: {
                title: {
                    text: 'Harga'
                }
            },
            series: [{
                name: 'Harga',
                data: chartData.map(item => item.y)
            }]
        });
    </script>
@endsection
