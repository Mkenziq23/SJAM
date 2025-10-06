<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Detail Donasi Barang</title>
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
            height: auto;
            margin-right: 15px;
        }
        .header-text {
            text-align: left;
        }
        .header-text h2 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }
        .header-text p {
            margin: 2px 0;
            font-size: 12px;
        }
        hr {
            border: 1px solid #000;
            margin: 10px 0;
        }

        /* Data donasi */
        .donasi-data {
            font-size: 12px;
            margin-top: 10px;
        }
        .donasi-data p {
            margin: 3px 0;
        }

        /* Footer */
        .footer {
            position: fixed;
            bottom: 20px;
            width: 100%;
            text-align: right;
            font-size: 12px;
        }
        .footer .signature {
            margin-top: 40px;
        }
        .footer .signature p {
            margin: 2px 0;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <img src="{{ public_path('ladun/base/img/sjam-1.jpg') }}" alt="Logo">
        <div class="header-text">
            <h2>{{ $dataSetting->namaTahfiz ?? 'Rumah Tahfidz' }}</h2>
            <p>{{ $dataSetting->alamat ?? '-' }}</p>
            <p>Email: {{ $dataSetting->email ?? '-' }}</p>
        </div>
    </div>
    <hr>

    <!-- Judul -->
    <h3 style="text-align:center; margin-bottom: 20px;">Detail Donasi Barang</h3>

    <!-- Data Donasi -->
    <div class="donasi-data">
        <p><strong>ID Donasi Barang:</strong> {{ substr($dataDonasi->token, 0, 5) }}</p>
        <p><strong>Nama Donatur:</strong> {{ $dataDonasi->nama_donatur }}</p>
        <p><strong>Tipe Donatur:</strong> {{ $dataDonasi->tipe }}</p>
        <p><strong>Tanggal Penerimaan:</strong> {{ $dataDonasi->tanggal_donasi }}</p>
    </div>
    <hr>

    <!-- Catatan -->
    <div style="margin-top: 10px; font-size: 12px;">
        <p><strong>Catatan:</strong></p>
        <p>Terima kasih atas donasi barang yang diberikan untuk mendukung kegiatan Rumah Tahfidz.</p>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div><strong>Batang Kuis, {{ date('d / m / Y') }}</strong></div>
        <div class="signature">
            <p>{{ $dataSetting->namaTahfiz ?? '_________________' }}</p>
            <p>(Pembina Rumah Tahfiz)</p>
        </div>
    </div>

</body>
</html>
