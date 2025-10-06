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
            margin-bottom: 10px;
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
            font-weight: bold;
        }
        .header p {
            margin: 2px 0;
            font-size: 12px;
        }
        .header hr {
            border: 2px solid #000;
            margin-top: 5px;
        }

        /* Kotak informasi donasi */
        .box {
            border: 1px solid #000;
            border-radius: 8px;
            padding: 10px 15px;
            margin-top: 10px;
            background-color: #f9f9f9;
        }
        .box p {
            margin: 5px 0;
        }

        /* Pesan terima kasih */
        .thank-you {
            margin-top: 15px;
            font-size: 14px;
            font-weight: bold;
            color: #007bff;
            text-align: center;
        }

        /* Footer / Tanda tangan */
        .footer {
            margin-top: 30px;
            font-size: 12px;
            text-align: right;
        }
        .footer p {
            margin: 2px 0;
        }
        .signature-line {
            margin-top: 40px;
            border-top: 1px solid #000;
            width: 200px;
            text-align: center;
            margin-left: auto;
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
    <hr>

    <!-- Informasi Donasi -->
    <div class="box">
        <p><strong>ID Donasi:</strong> {{ substr($dataDonasi->token, 0, 5) }}</p>
        <p><strong>Nama Donatur:</strong> {{ $dataDonasi->nama_donatur }}</p>
        <p><strong>Tipe Donasi:</strong> {{ $dataDonasi->tipe }}</p>
        <p><strong>Tanggal Donasi:</strong> {{ $dataDonasi->tanggal_donasi }}</p>
    </div>

    <!-- Pesan Terima Kasih -->
    <div class="thank-you">
        Terima kasih atas donasi Anda. Semoga menjadi berkah.
    </div>

    <!-- Footer / Tanda tangan -->
    <div class="footer">
        <p>Batang Kuis, {{ date('d / m / Y') }}</p>
        <div class="signature-line">
            <p>{{ $dataSetting->namaTahfiz }}</p>
            <p>(Pembina Rumah Tahfiz)</p>
        </div>
    </div>

</body>
</html>
