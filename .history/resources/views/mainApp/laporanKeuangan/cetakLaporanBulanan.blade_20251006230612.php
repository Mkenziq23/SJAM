<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Arus Kas</title>
    <style>
        body {
            font-family: "DejaVu Sans", sans-serif;
            font-size: 10px;
            margin: 20px;
        }

        /* Header */
        .header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }
        .header img {
            width: 70px;
            margin-right: 15px;
        }
        .header .header-text h2 {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
        }
        .header .header-text p {
            margin: 2px 0;
            font-size: 10px;
        }

        /* Tabel arus kas */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 10px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 4px 6px;
            text-align: left;
        }
        thead tr {
            background-color: #636e72;
            color: #dfe6e9;
        }

        /* Total */
        .totals {
            margin-top: 15px;
            text-align: right;
            list-style: none;
            padding: 0;
            font-size: 11px;
        }
        .totals li {
            margin: 3px 0;
        }

    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <img src="{{ public_path('ladun/base/img/sjam-1.jpg') }}" alt="Logo">
        <div class="header-text">
            <h2>{{ $dataSetting->namaTahfiz }}</h2>
            <p>{{ $dataSetting->alamat ?? '-' }}</p>
            <p>Email: {{ $dataSetting->email ?? '-' }}</p>
        </div>
    </div>

    <!-- Bulan & Tahun -->
    <table style="margin-top: 10px; font-size:10px;">
        <tr>
            <td><strong>Bulan:</strong> {{ $bulan }}</td>
            <td><strong>Tahun:</strong> {{ $tahun }}</td>
        </tr>
    </table>

    <!-- Tabel Arus Kas -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Arus</th>
                <th>Tipe</th>
                <th>Detail</th>
                <th>Total</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
        @foreach($dataFlow as $flow)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $flow->flow }}</td>
                <td>{{ $flow->type }}</td>
                <td>{{ $flow->setDetail($flow->type, $flow->id_event) }}</td>
                <td>Rp. {{ number_format($flow->total) }}</td>
                <td>{{ $flow->setTanggal($flow->created_at) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Total -->
    <ul class="totals">
        <li><strong>Total Pemasukan:</strong> Rp. {{ number_format($pembukuan['pemasukan']) }}</li>
        <li><strong>Total Pengeluaran:</strong> Rp. {{ number_format($pembukuan['pengeluaran']) }}</li>
        <li><strong>Total Saldo:</strong> Rp. {{ number_format($pembukuan['selisih']) }}</li>
    </ul>


</body>
</html>
