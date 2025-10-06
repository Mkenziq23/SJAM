<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Slip Gaji Pengurus</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
            color: #333;
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
        }
        .header h4 {
            margin: 0;
            font-weight: normal;
            color: #555;
        }
        hr {
            border: 1px solid #333;
            margin: 10px 0;
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
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }

        /* Footer */
        .footer {
            margin-top: 50px;
            text-align: right;
        }
        .footer p {
            margin: 2px 0;
        }

        .status {
            margin-top: 20px;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            color: green;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <h2>Rumah Tahfiz {{ $dataSetting->namaTahfiz }}</h2>
        <h4>Slip Gaji Pengurus</h4>
        <hr>
    </div>

    <!-- Data Pengurus -->
    <div>
        <strong>Data Pengurus</strong><br>
        Nama Pengurus : {{ $dataGaji->pengurusData->nama }}<br>
        ID Pengurus : {{ $dataGaji->pengurusData->id_pengurus }}<br>
        Jabatan : {{ $dataGaji->pengurusData->jabatan }}<br>
        Periode Gaji : {{ $dataGaji->periodeGaji($dataGaji->tanggal_pembayaran) }}
    </div>

    <!-- Informasi Gaji -->
    <div style="margin-top: 20px;">
        <strong>Informasi Pembayaran Gaji</strong>
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
                    <td>Rp. {{ number_format($dataGaji->gaji_pokok) }}</td>
                    <td>Rp. {{ number_format($dataGaji->tunjangan) }}</td>
                    <td>Rp. {{ number_format($dataGaji->potongan) }}</td>
                    <td>Rp. {{ number_format($dataGaji->total_gaji) }}</td>
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
