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
            margin-bottom: 20px;
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
        hr {
            border: 1px solid #000;
            margin: 10px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table td {
            padding: 6px 4px;
        }
        .label {
            width: 40%;
            font-weight: bold;
        }
        .total {
            font-weight: bold;
            font-size: 14px;
            color: #000;
        }
        .footer {
            margin-top: 40px;
            text-align: right; /* Tanda tangan berada di kanan */
        }
        .signature {
            /* margin-top: 20px; */
            text-align: right; /* Nama ttd tetap di kanan */
        }
    </style>
</head>
<body>

    {{-- Header --}}
    <div class="header">
        <h2>Rumah Tahfidz Qur'an SJAM</h2>
        <p>{{ $alamat ?? '-' }}</p>
        <p>Email: {{ $email ?? '-' }}</p>
        <hr>
        <h3>Bukti Pembayaran SPP</h3>
    </div>

    {{-- Data Pembayaran --}}
    <table>
        <tr>
            <td class="label">Nama Santri</td>
            <td>: {{ $spp->santriData->nama }}</td>
        </tr>
        <tr>
            <td class="label">Bulan / Tahun</td>
            <td>: {{ date("F", mktime(0,0,0,$spp->bulan,10)) }} / {{ $spp->tahun }}</td>
        </tr>
        <tr>
            <td class="label">Total Pembayaran</td>
            <td class="total">: Rp {{ number_format($spp->total, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td class="label">Tanggal Pembayaran</td>
            <td>: {{ $tanggal }}</td>
        </tr>
        <tr>
            <td class="label">Petugas</td>
            <td>: {{ $spp->pengurusData->nama ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">Kode Transaksi</td>
            <td>: {{ $spp->token_pembayaran }}</td>
        </tr>
    </table>

    {{-- Footer / Tanda tangan --}}
    <div class="footer">
        <p>Banyuwangi, {{ $tanggal }}</p>
        <div class="signature">
            <p><strong>Petugas</strong></p><br><br>
            <p><u>{{ $spp->pengurusData->nama ?? '_________________' }}</u></p>
        </div>
    </div>

</body>
</html>
