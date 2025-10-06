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
            color: #333;
        }

        /* Header */
        .header {
            display: flex;
            align-items: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header img {
            width: 70px;
            height: auto;
            margin-right: 15px;
        }
        .header .header-text {
            flex: 1;
        }
        .header h2 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }
        .header p {
            margin: 2px 0;
            font-size: 12px;
        }

        /* Informasi Donasi */
        .donasi-box {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px 15px;
            background-color: #f9f9f9;
            margin-bottom: 15px;
        }
        .donasi-box p {
            margin: 4px 0;
        }

        /* Status Pembayaran */
        .status {
            text-align: center;
            margin: 15px 0;
        }
        .status h4 {
            display: inline-block;
            padding: 8px 20px;
            background-color: #28a745;
            color: #fff;
            border-radius: 5px;
            font-size: 14px;
            margin: 0;
        }

        /* Footer */
        .footer {
            margin-top: 40px;
            font-size: 12px;
        }
        .footer p {
            margin: 2px 0;
        }
        .footer .signature {
            margin-top: 20px;
            text-align: right;
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

    {{-- Informasi Donasi --}}
    <div class="donasi-box">
        <p><strong>ID Donasi :</strong> {{ substr($dataDonasi->token, 0, 5) }}</p>
        <p><strong>Nama Donatur :</strong> {{ $dataDonasi->nama_donatur }}</p>
        <p><strong>Tipe :</strong> {{ $dataDonasi->tipe }}</p>
        <p><strong>Tanggal Pembayaran :</strong> {{ $dataDonasi->tanggal_donasi }}</p>
    </div>

    {{-- Status --}}
    <div class="status">
        <h4>LUNAS</h4>
    </div>

    {{-- Footer --}}
    <div class="footer">
        <p><strong>Batang Kuis, {{ date('d / m / Y') }}</strong></p>
        <div class="signature">
            <p>{{ $dataSetting->namaTahfiz }}</p>
            <p>(Pembina Rumah Tahfiz)</p>
        </div>
    </div>

</body>
</html>
