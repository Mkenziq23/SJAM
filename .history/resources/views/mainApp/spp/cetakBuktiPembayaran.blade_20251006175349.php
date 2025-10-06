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

        /* Header */
        .header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            border-bottom: 1.5px solid #000;
            padding-bottom: 10px;
        }
        .header img {
            width: 60px;
            margin-top: -20px;
            height: auto;
            margin-right: 15px;
        }
        .header-text {
            flex: 1;
            text-align: center;
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
        .title {
            text-align: center;
            margin-top: 10px;
            margin-bottom: 15px;
            font-size: 16px;
            font-weight: bold;
        }

        /* Tabel data pembayaran */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }
        table td {
            padding: 6px 4px;
            vertical-align: top;
        }
        .label {
            width: 35%;
            font-weight: bold;
        }
        .total {
            font-weight: bold;
            font-size: 14px;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Footer / tanda tangan */
        .footer {
            margin-top: 30px;
            text-align: right;
        }
        .footer p {
            margin: 2px 0;
        }
        .signature {
            margin-top: 5px; /* jarak lebih rapat */
            text-align: right;
        }
    </style>
</head>
<body>

    {{-- Header --}}
    <div class="header">
        {{-- Logo --}}
        @if(file_exists(public_path('ladun/base/img/sjam-1.jpg')))
            <img src="{{ public_path('ladun/base/img/sjam-1.jpg') }}" alt="Logo" style="margin-top:-40px;">
        @endif

        {{-- Teks header --}}
        <div class="header-text">
            <h2>Rumah Tahfidz Qur'an SJAM</h2>
            <p>{{ $alamat ?? '-' }}</p>
            <p>Email: {{ $email ?? '-' }}</p>
        </div>
    </div>

    <div class="title">BUKTI PEMBAYARAN SPP</div>

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
        <p>Jember, {{ $tanggal }}</p>
        <div class="signature">
            <p><strong>Petugas</strong></p>
            <br><br>
            <p><u>{{ $spp->pengurusData->nama ?? '_________________' }}</u></p>
        </div>
    </div>

</body>
</html>
