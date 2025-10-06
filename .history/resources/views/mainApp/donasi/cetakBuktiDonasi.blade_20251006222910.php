<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bukti Donasi Barang</title>
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
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }
        .header img {
            width: 70px;
            margin-right: 15px;
        }
        .header .header-text h2 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }
        .header .header-text p {
            margin: 2px 0;
            font-size: 12px;
        }

        /* Kotak informasi donasi */
        .box {
            border: 1px solid #000;
            border-radius: 10px;
            padding: 12px 16px;
            margin-top: 15px;
            background-color: #f5f5f5;
        }
        .box p {
            margin: 6px 0;
        }
        .box p strong {
            width: 130px;
            display: inline-block;
        }

        /* Pesan terima kasih */
        .thank-you {
            margin-top: 20px;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            color: #333;
        }

        /* Footer / Tanda tangan */
        .footer {
            margin-top: 40px;
            font-size: 12px;
            text-align: right;
        }
        .signature-line {
            margin-top: 60px;
            border-top: 1px solid #000;
            width: 220px;
            text-align: center;
            margin-left: auto;
        }
        .signature-line p {
            margin: 2px 0;
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

    <!-- Informasi Donasi -->
    <div class="box">
        <p><strong>ID Donasi Barang:</strong> {{ substr($dataDonasi->token, 0, 5) }}</p>
        <p><strong>Nama Donatur:</strong> {{ $dataDonasi->nama_donatur }}</p>
        <p><strong>Tipe Donatur:</strong> {{ $dataDonasi->tipe }}</p>
        <p><strong>Tanggal Penerimaan:</strong> {{ $dataDonasi->tanggal_donasi }}</p>
    </div>

    <!-- Pesan Terima Kasih -->
    <div class="thank-you">
        Terima kasih atas donasi barang Anda. Semoga menjadi berkah dan bermanfaat bagi Rumah Tahfidz.
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
