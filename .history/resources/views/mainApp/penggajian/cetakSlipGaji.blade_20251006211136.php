<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Slip Gaji Pengurus</title>
    <style>
        /* Ukuran A4 dan margin cetak */
        @page { size: A4; margin: 20mm; }

        body {
            font-family: 'Arial', sans-serif;
            font-size: 12pt;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 20px;
            position: relative;
        }
        .header img.logo {
            position: absolute;
            left: 0;
            top: 0;
            width: 80px;
            height: auto;
        }
        .header h1 {
            margin: 0;
            font-size: 18pt;
            color: #2c3e50;
        }
        .header h2 {
            margin: 5px 0;
            font-size: 14pt;
            font-weight: normal;
            color: #34495e;
        }
        .header hr {
            border: 2px solid #3498db;
            margin: 10px 0 0 0;
        }

        /* Box */
        .box {
            border: 1px solid #3498db;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
        }
        .box-title {
            font-weight: bold;
            font-size: 13pt;
            color: #2c3e50;
            margin-bottom: 10px;
            border-bottom: 1px dashed #3498db;
            padding-bottom: 5px;
        }

        .row-data {
            display: flex;
            justify-content: space-between;
            margin-top: 5px;
        }
        .row-data div {
            width: 48%;
        }

        /* Table gaji */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 12pt;
        }
        table, th, td {
            border: 1px solid #3498db;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #3498db;
            color: #fff;
        }
        .total {
            font-weight: bold;
            background-color: #dff9fb;
        }

        /* Status */
        .status {
            text-align: center;
            font-size: 14pt;
            font-weight: bold;
            color: #27ae60;
            margin-top: 20px;
        }

        /* Footer */
        .footer {
            margin-top: 50px;
            text-align: right;
            font-size: 12pt;
            border-top: 1px solid #3498db;
            padding-top: 10px;
        }
        .footer p {
            margin: 2px 0;
        }

        /* Print */
        @media print {
            body { margin: 0; }
            .header, .footer { page-break-inside: avoid; }
            table { page-break-inside: auto; }
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <img src="{{ asset('images/logo.png') }}" class="logo" alt="Logo">
        <h1>Rumah Tahfiz {{ $dataSetting->namaTahfiz }}</h1>
        <h2>Slip Gaji Pengurus</h2>
        <hr>
    </div>

    <!-- Data Pengurus -->
    <div class="box">
        <div class="box-title">Data Pengurus</div>
        <div class="row-data">
            <div>
                <strong>Nama:</strong> {{ $dataGaji->pengurusData->nama }}<br>
                <strong>ID Pengurus:</strong> {{ $dataGaji->pengurusData->id_pengurus }}
            </div>
            <div>
                <strong>Jabatan:</strong> {{ $dataGaji->pengurusData->jabatan }}<br>
                <strong>Periode Gaji:</strong> {{ $dataGaji->periodeGaji($dataGaji->tanggal_pembayaran) }}
            </div>
        </div>
    </div>

    <!-- Informasi Gaji -->
    <div class="box">
        <div class="box-title">Informasi Pembayaran Gaji</div>
        <table>
            <thead>
                <tr>
                    <th>Gaji Pokok</th>
                    <th>Tunjangan</th>
                    <th>Potongan</th>
                    <th>Total Pembayaran / Diterima</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Rp. {{ number_format($dataGaji->gaji_pokok,0,",",".") }}</td>
                    <td>Rp. {{ number_format($dataGaji->tunjangan,0,",",".") }}</td>
                    <td>Rp. {{ number_format($dataGaji->potongan,0,",",".") }}</td>
                    <td class="total">Rp. {{ number_format($dataGaji->total_gaji,0,",",".") }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Status -->
    <div class="status">
        Status Pembayaran: LUNAS
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>Batang Kuis, {{ date('d / m / Y') }}</p>
        <p>{{ $dataSetting->namaTahfiz }}</p>
        <p>(Pembina Rumah Tahfiz)</p>
    </div>

</body>
</html>
