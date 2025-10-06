<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rekap Absensi Santri</title>
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
            margin-bottom: 10px;
        }
        .header img {
            width: 60px;
            margin-right: 15px;
        }
        .header .header-text {
            text-align: left;
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
            border: 2px solid #000;
            margin-top: 5px;
        }

        /* Tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10px;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th {
            background-color: #636e72;
            color: #dfe6e9;
            padding: 4px;
            text-align: center;
        }
        td {
            padding: 4px;
            text-align: center;
        }

       

    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <img src="{{ public_path('ladun/base/img/sjam-1.jpg') }}" alt="Logo">
        <div class="header-text">
            <h2>{{ $dataSetting->namaTahfiz }}</h2>
            <p>{{ $dataSetting->alamat ?? '-' }}</p>
            <p>Email: {{ $dataSetting->email ?? '-' }}</p>
        </div>
    </div>
    <hr>

    <!-- Informasi Santri -->
    <div style="font-size: 12px; margin-top:10px;">
        <strong>ID Santri:</strong> {{ $dataSantri->id_santri }}<br>
        <strong>Nama Santri:</strong> {{ $dataSantri->nama }}<br>
        <strong>Kafilah:</strong> {{ $dataSantri->kafilahData->nama }}<br>
        <strong>Rekap Periode:</strong> {{ $namaBulan }} / {{ $tahun }}
    </div>

    <!-- Tabel Absensi -->
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>ID Absen</th>
                <th>Waktu Absensi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        @for ($x = 1; $x <= $tHari; $x++)
            @php
                $tAbsen = DB::table('tbl_absensi')
                            ->where('id_santri', $dataSantri->id_santri)
                            ->where('tanggal', $x)
                            ->where('bulan', $bulan)
                            ->where('tahun', $tahun)
                            ->count();
            @endphp
            @if ($tAbsen < 1)
                <tr>
                    <td>{{ $x }}</td>
                    <td>-</td>
                    <td>-</td>
                    <td>TIDAK HADIR</td>
                </tr>
            @else
                @php
                    $qAbsenSantri = DB::table('tbl_absensi')
                                       ->where('id_santri', $dataSantri->id_santri)
                                       ->where('tanggal', $x)
                                       ->where('bulan', $bulan)
                                       ->where('tahun', $tahun)
                                       ->first();
                @endphp
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $qAbsenSantri->token_absensi }}</td>
                    <td>{{ $qAbsenSantri->created_at }}</td>
                    <td>HADIR</td>
                </tr>
            @endif
        @endfor
        </tbody>
    </table>


</body>
</html>
