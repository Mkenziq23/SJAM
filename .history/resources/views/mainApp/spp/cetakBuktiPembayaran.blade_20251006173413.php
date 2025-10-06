<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bukti Pembayaran SPP</title>
    <style>
        body { font-family: "DejaVu Sans", sans-serif; font-size: 12px; margin: 20px; }
        
        /* Header / Kop */
        .header { text-align: center; margin-bottom: 15px; }
        .header img { width: 60px; float: left; margin-left: 20px; }
        .kop-content { text-align: center; }
        .kop-content h2 { margin: 0; font-size: 18px; font-weight: bold; }
        .kop-content p { margin: 2px 0; font-size: 12px; }
        hr { border: 1px solid #000; margin-top: 5px; margin-bottom: 15px; }

        /* Tabel pembayaran */
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table, table th, table td { border: 1px solid #000; }
        table th { background-color: #007bff; color: #fff; padding: 8px; text-align: left; }
        table td { padding: 8px; }
        table tr:nth-child(even) { background-color: #f2f2f2; }

        /* Total pembayaran */
        .total { font-weight: bold; font-size: 14px; color: #d32f2f; }

        /* Footer / Tanda tangan */
        .footer { text-align: right; margin-top: 40px; }
        .signature { margin-top: 60px; text-align: center; }
    </style>
</head>
<body>

    {{-- Kop Surat --}}
    <div class="header">
        @if(file_exists(public_path('images/logo.png')))
            <img src="{{ public_path('images/logo.png') }}">
        @endif
        <div class="kop-content">
            <h2>Rumah Tahfidz Qur'an SJAM</h2>
            <p>{{ $alamat ?? '-' }}</p>
            <p>Email: {{ $email ?? '-' }}</p>
        </div>
        <div style="clear: both;"></div>
        <hr>
        <h3>Bukti Pembayaran SPP</h3>
    </div>

    {{-- Tabel Data Pembayaran --}}
    <table>
        <tr>
            <th>Nama Santri</th>
            <td>{{ $spp->santriData->nama }}</td>
        </tr>
        <tr>
            <th>Bulan / Tahun</th>
            <td>{{ date("F", mktime(0,0,0,$spp->bulan,10)) }} / {{ $spp->tahun }}</td>
        </tr>
        <tr>
            <th>Total Pembayaran</th>
            <td class="total">Rp {{ number_format($spp->total, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Tanggal Pembayaran</th>
            <td>{{ $tanggal }}</td>
        </tr>
        <tr>
            <th>Petugas</th>
            <td>{{ $spp->pengurusData->nama ?? '-' }}</td>
        </tr>
        <tr>
            <th>Kode Transaksi</th>
            <td>{{ $spp->token_pembayaran }}</td>
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
