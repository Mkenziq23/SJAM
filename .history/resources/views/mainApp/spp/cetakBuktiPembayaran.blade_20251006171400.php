<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bukti Pembayaran SPP</title>
    <style>
        body {
            font-family: "DejaVu Sans", sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }
        .header h2 {
            margin: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        td {
            padding: 5px 0;
        }
        .total {
            font-weight: bold;
            font-size: 14px;
        }
        .footer {
            text-align: right;
            margin-top: 30px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>Bukti Pembayaran SPP</h2>
        <p>Rumah Tahfidz / Pondok Pesantren</p>
    </div>

    <table>
        <tr>
            <td><strong>Nama Santri</strong></td>
            <td>: {{ $spp->santriData->nama }}</td>
        </tr>
        <tr>
            <td><strong>Bulan / Tahun</strong></td>
            <td>: {{ date("F", mktime(0, 0, 0, $spp->bulan, 10)) }} / {{ $spp->tahun }}</td>
        </tr>
        <tr>
            <td><strong>Total Pembayaran</strong></td>
            <td>: Rp {{ number_format($spp->total, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td><strong>Tanggal Pembayaran</strong></td>
            <td>: {{ $tanggal }}</td>
        </tr>
        <tr>
            <td><strong>Petugas</strong></td>
            <td>: {{ $spp->pengurusData->nama ?? '-' }}</td>
        </tr>
        <tr>
            <td><strong>Kode Transaksi</strong></td>
            <td>: {{ $spp->token_pembayaran }}</td>
        </tr>
    </table>

    <div class="footer">
        <p>Banyuwangi, {{ $tanggal }}</p>
        <p><strong>Petugas,</strong></p><br><br>
        <p><u>{{ $spp->pengurusData->nama ?? '_________________' }}</u></p>
    </div>

</body>
</html>
