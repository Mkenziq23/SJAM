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
            color: #000;
        }

        /* Container struk */
        .receipt {
            width: 100%;
            max-width: 450px;
            margin: 0 auto;
            padding: 15px;
            border: 1px solid #000;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        /* Header */
        .header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .header img {
            width: 60px;
            margin-right: 10px;
        }
        .header .header-text {
            text-align: left;
            font-size: 12px;
        }
        .header .header-text h2 {
            margin: 0;
            font-size: 16px;
        }
        .header .header-text p {
            margin: 2px 0;
        }

        hr {
            border: 1px dashed #000;
            margin: 10px 0;
        }

        /* Informasi Donasi */
        .info p {
            margin: 3px 0;
        }
        .info strong {
            display: inline-block;
            width: 120px;
        }

        .status {
            text-align: center;
            margin: 10px 0;
        }
        .status h3 {
            color: green;
            margin: 5px 0;
        }

        /* Footer / tanda tangan */
        .footer {
            margin-top: 20px;
            text-align: right;
            font-size: 12px;
        }
        .footer p {
            margin: 2px 0;
        }
    </style>
</head>
<body>

    <div class="receipt">
        <!-- Header -->
        <div class="header">
            <img src="{{ public_path('ladun/base/img/sjam-1.jpg') }}" alt="Logo">
            <div class="header-text">
                <h2>{{ $dataSetting->namaTahfiz }}</h2>
                <p>{{ $dataSetting->alamat ?? '-' }}</p>
                <p>Email: {{ $dataSetting->email ?? '-' }}</p>
            </div>
        </div>

        <hr>

        <!-- Informasi Donasi -->
        <div class="info">
            <p><strong>ID Donasi:</strong> {{ substr($dataDonasi->token, 0, 5) }}</p>
            <p><strong>Nama Donatur:</strong> {{ $dataDonasi->nama_donatur }}</p>
            <p><strong>Tipe:</strong> {{ $dataDonasi->tipe }}</p>
            <p><strong>Tanggal:</strong> {{ $dataDonasi->tanggal_donasi }}</p>
        </div>

        <hr>

        <!-- Status Pembayaran -->
        <div class="status">
            <h3>LUNAS</h3>
        </div>

        <hr>

        <!-- Footer -->
        <div class="footer">
            <p>Batang Kuis, {{ date('d / m / Y') }}</p>
            <br><br>
            <p>{{ $dataSetting->namaTahfiz }}</p>
            <p>(Pembina Rumah Tahfiz)</p>
        </div>
    </div>

</body>
</html>
