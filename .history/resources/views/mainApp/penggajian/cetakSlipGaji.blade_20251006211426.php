<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Slip Gaji Pengurus</title>
    <style>
        /* Ukuran A4 dan margin aman cetak */
        @page {
            size: A4;
            margin: 20mm;
        }

        body {
            font-family: "Times New Roman", serif;
            font-size: 12pt;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 18pt;
        }
        .header h2 {
            margin: 5px 0;
            font-size: 14pt;
            font-weight: normal;
            color: #555;
        }
        hr {
            border: 1px solid #333;
            margin: 10px 0;
        }

        /* Box dan layout */
        .box {
            border: 1px solid #333;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .box-title {
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 12pt;
            color: #444;
            text-decoration: underline;
        }

        .row-data {
            display: flex;
            justify-content: space-between;
        }
        .row-data div {
            width: 48%;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid #333;
        }
        th, td {
            padding: 10px;
            text-align: center;
            font-size: 12pt;
        }
        th {
            background-color: #f2f2f2;
        }
        .total {
            font-weight: bold;
            background-color: #e8f4e8;
        }

        /* Status pembayaran */
        .status {
            margin-top: 20px;
            text-align: center;
            font-size: 14pt;
            font-weight: bold;
            color: green;
        }

        /* Footer */
        .footer {
            margin-top: 60px;
            text-align: right;
            font-size: 12pt;
        }
        .footer p {
            margin: 2px 0;
        }

        /* Cetak */
        @media print {
            body {
                margin: 0;
            }
            .header, .footer {
                page-break-inside: avoid;
            }
            table {
                page-break-inside: auto;
            }
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
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

    <!-- Status Pembayaran -->
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
