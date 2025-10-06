<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bukti Pembayaran SPP</title>
    <style>
        body { font-family: "DejaVu Sans", sans-serif; font-size: 12px; margin: 20px; }
        .header { text-align: center; border-bottom: 2px solid #000; padding-bottom: 5px; margin-bottom: 15px; }
        .header h2 { margin: 0; font-size: 18px; font-weight: bold; }
        .header p { margin: 2px 0; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table td { padding: 8px 5px; }
        table tr:nth-child(odd) { background-color: #f9f9f9; }
        table tr:nth-child(even) { background-color: #ffffff; }
        .total { font-weight: bold; font-size: 14px; color: #000; }
        .footer { text-align: right; margin-top: 40px; }
        .signature { margin-top: 60px; text-align: center; }
        hr { border: 1px solid #000; margin-top: 10px; }
    </style>
</head>
<body>

    {{-- Kop Surat --}}
    <div class="header">
        <h2>Rumah Tahfidz Qur'an SJAM</h2>
        <p>{{ $alamat ?? '-' }}</p>
        <p>Email: {{ $email ?? '-' }}</p>
        <hr>
        <h3>Bukti Pembayaran SPP</h3>
    </div>

    {{-- Data Pembayaran --}}
    <table border="1">
        <tr>
            <td><strong>Nama Santri</strong></td>
            <td>: {{ $spp->santriData->nama }}</td>
        </tr>
        <tr>
            <td><strong>Bulan / Tahun</strong></td>
            <td>: {{ date("F", mktime(0,0,0,$spp->bulan,10)) }} / {{ $spp->tahun }}</td>
