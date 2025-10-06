<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Bukti Pembayaran SPP</title>
    <style>
        @page { margin: 20px 30px; }
        body {
            font-family: "DejaVu Sans", sans-serif;
            font-size: 12px;
            color: #000;
        }

        .kop-surat {
            text-align: center;
            border-bottom: 3px double #000;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .kop-surat img {
            width: 60px;
            height: 60px;
            position: absolute;
            top: 20px;
            left: 40px;
        }

        .kop-surat h2 {
            margin: 0;
            font-size: 16px;
            text-transform: uppercase;
        }

        .kop-surat h3 {
            margin: 0;
            font-size: 14px;
            font-weight: normal;
        }

        .kop-surat p {
            font-size: 11px;
            margin: 2px 0;
        }

        .judul {
            text-align: center;
            margin-top: 5px;
            margin-bottom: 10px;
            font-weight: bold;
            text-decoration: underline;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        td {
            padding: 5px 3px;
            vertical-align: top;
        }

        .label {
            width: 35%;
            font-weight: bold;
        }

        .value {
            width: 65%;
        }

        .total {
            font-weight: bold;
            font-size: 13px;
            color: #000;
        }

        .footer {
            margin-top: 40px;
            width: 100%;
            text-align: right;
        }

        .footer .ttd {
            text-align: right;
            display: inline-block;
            margin-top: 30px;
        }

        .garis {
            border-top: 1px dashed #000;
            margin-top: 5px;
            width: 200px;
        }

        .catatan {
            font-size: 11px;
            margin-top: 30px;
            border-top: 1px solid #000;
            padding-top: 5px;
            color: #555;
        }

    </style>
</head>
<body>

    <div class="kop-surat">
        {{-- Ganti path logo sesuai lokasi file logo kamu --}}
        <img src="{{ public_path('images/logo.png') }}" alt="Logo Lembaga">
        <h2>RUMAH TAHFIDZ / PONDOK PESANTREN</h2>
        <h3>Jl. Contoh No. 123, Banyuwangi</h3>
        <p>Telp. (0333) 123456 | Email: admin@rumahtahfidz.id</p>
    </div>

    <div class="judul">BUKTI PEMBAYARAN SPP</div>

    <table>
        <tr>
            <td class="label">Nama Santri</td>
            <td class="value">: {{ $spp->santriData->nama }}</td>
        </tr>
        <tr>
            <td class="label">Bulan / Tahun</td>
            <td class="value">: {{ date("F", mktime(0, 0, 0, $spp->bulan, 10)) }} / {{ $spp->tahun }}</td>
        </tr>
        <tr>
            <td class="label">Total Pembayaran</td>
            <td class="value total">: Rp {{ number_format($spp->total, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td class="label">Tanggal Pembayaran</td>
            <td class="value">: {{ $tanggal }}</td>
        </tr>
        <tr>
            <td class="label">Petugas</td>
            <td class="value">: {{ $spp->pengurusData->nama ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">Kode Transaksi</td>
            <td class="value">: {{ $spp->token_pembayaran }}</td>
        </tr>
    </table>

    <div class="footer">
        <p>Banyuwangi, {{ $tanggal }}</p>
        <div class="ttd">
            <p><strong>Petugas,</strong></p>
            <br><br><br>
            <p><u>{{ $spp->pengurusData->nama ?? '_________________' }}</u></p>
            <div class="garis"></div>
        </div>
    </div>

    <div class="catatan">
        <p><strong>Catatan:</strong></p>
        <p>Bukti ini sah dan telah diverifikasi oleh sistem. Harap disimpan sebagai arsip pembayaran santri.</p>
    </div>

</body>
</html>
