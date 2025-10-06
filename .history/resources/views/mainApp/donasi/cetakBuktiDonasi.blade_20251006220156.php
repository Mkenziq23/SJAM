<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bukti Donasi</title>
    <style>
        body {
            font-family: "DejaVu Sans", sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        /* Header */
        .header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        .header img {
            width: 60px;
            margin-right: 15px;
        }
        .header .header-text {
            text-align: left;
        }
        .header h2 {
            margin: 0;
            font-size: 16px;
        }
        .header p {
            margin: 2px 0;
            font-size: 12px;
        }
        hr {
            border: 1px solid #000;
            margin: 10px 0;
        }

        /* Content */
        .content {
            margin-top: 10px;
        }
        .content h4 {
            color: green;
            margin: 5px 0;
        }

        /* Footer */
        .footer {
            margin-top: 40px;
            text-align: right;
            font-size: 12px;
        }
    </style>
</head>
<body>

    {{-- Header --}}
    <div class="header">
        <img src="{{ public_path('ladun/base/img/sjam-1.jpg') }}" alt="Logo">
        <div class="header-text">
            <h2>{{ $dataSetting->namaTahfiz }}</h2>
            <p>{{ $dataSetting->alamat ?? '-' }}</p>
            <p>Email: {{ $dataSetting->email ?? '-' }}</p>
        </div>
    </div>
    <hr>

    {{-- Informasi Donasi --}}
    <div class="content">
        <p>
            <strong>ID Donasi :</strong> {{ substr($dataDonasi->token, 0, 5) }}<br>
            <strong>Nama Donatur :</strong> {{ $dataDonasi->nama_donatur }}<br>
            <strong>Tipe :</strong> {{ $dataDonasi->tipe }}<br>
            <strong>Tanggal Pembayaran :</strong> {{ $dataDonasi->tanggal_donasi }}
        </p>

        <hr>

        <p><strong>Status Pembayaran</strong></p>
        <h4>LUNAS</h4>

        <hr>

        <div class="footer">
            <p><strong>Batang Kuis, {{ date('d / m / Y') }}</strong></p>
            <br>
            <p>{{ $dataSetting->namaTahfiz }}</p>
            <p>(Pembina Rumah Tahfiz)</p>
        </div>
    </div>

</body>
</html>
