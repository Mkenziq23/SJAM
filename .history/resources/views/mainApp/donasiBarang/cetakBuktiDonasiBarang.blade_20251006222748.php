<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bukti Penerimaan Donasi Barang</title>
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
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header img {
            width: 60px;
            height: auto;
            margin-right: 15px;
        }
        .header .header-text {
            text-align: left;
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

        /* Info donasi */
        .info-donasi {
            margin-bottom: 20px;
        }
        .info-donasi p {
            margin: 4px 0;
        }

        hr {
            border: 1px solid #000;
            margin: 10px 0;
        }

        /* Footer / tanda tangan */
        .footer {
            margin-top: 40px;
            text-align: right;
        }
        .footer p {
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

    <!-- Data Donasi -->
    <div class="info-donasi">
        <p><strong>ID Donasi Barang:</strong> {{ substr($dataDonasi->token, 0, 5) }}</p>
        <p><strong>Nama Donatur:</strong> {{ $dataDonasi->nama_donatur }}</p>
        <p><strong>Tipe Donatur:</strong> {{ $dataDonasi->tipe }}</p>
        <p><strong>Tanggal Penerimaan:</strong> {{ $dataDonasi->tanggal_donasi }}</p>
    </div>

    <hr>

    <!-- Catatan Penerimaan -->
    <div style="margin-top: 10px; font-size:12px;">
        <p><strong>Catatan Penerimaan Donasi Barang</strong></p>
        <p>Terima kasih atas kontribusi Anda, donasi barang ini telah diterima dan dicatat di Rumah Tahfidz Qur'an SJAM.</p>
    </div>

    <hr>

    <!-- Footer / Tanda tangan -->
    <div class="footer">
        <p>Batang Kuis, {{ date('d / m / Y') }}</p>
        <br><br>
        <p><strong>{{ $dataSetting->namaTahfiz }}</strong></p>
        <p>(Pembina Rumah Tahfiz)</p>
    </div>

</body>
</html>
