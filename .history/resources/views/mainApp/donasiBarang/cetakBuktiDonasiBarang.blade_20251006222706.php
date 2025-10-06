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
            text-align: center;
            margin-bottom: 15px;
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
        hr {
            border: 1px solid #000;
            margin: 10px 0;
        }

        /* Data donasi */
        .donasi-info {
            font-size: 12px;
            margin-top: 20px;
        }
        .donasi-info strong {
            font-size: 13px;
        }

        /* Footer / tanda tangan */
        .footer {
            margin-top: 40px;
            text-align: right;
            font-size: 12px;
        }
        .footer p {
            margin: 2px 0;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <h2>{{ $dataSetting->namaTahfiz }}</h2>
        <p>{{ $dataSetting->alamat ?? '-' }}</p>
        <p>Email: {{ $dataSetting->email ?? '-' }}</p>
        <hr>
        <h3>Bukti Penerimaan Donasi Barang</h3>
    </div>

    <!-- Data Donasi -->
    <div class="donasi-info">
        <p>ID Donasi Barang : {{ substr($dataDonasi->token, 0, 5) }}</p>
        <p>Nama Donatur : {{ $dataDonasi->nama_donatur }}</p>
        <p>Tipe : {{ $dataDonasi->tipe }}</p>
        <p>Tanggal Penerimaan : {{ $dataDonasi->tanggal_donasi }}</p>
    </div>

    <hr>

    <div class="donasi-info" style="margin-top: 10px;">
        <strong>Status Penerimaan:</strong> <br>
        <h4>Diterima</h4>
    </div>

    <hr>

    <!-- Footer / Tanda Tangan -->
    <div class="footer">
        <p>Batang Kuis, {{ date('d / m / Y') }}</p>
        <br><br>
        <p><strong>Pembina Rumah Tahfiz</strong></p>
        <br><br>
        <p><u>{{ $dataSetting->namaTahfiz }}</u></p>
    </div>

</body>
</html>
