<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        #pemb {
            border-collapse: collapse;
            width: 100%
        }
        #pemb td, #pemb th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        #pemb th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4caf50;
            color: #fff;
        }
    </style>
    
    <title>Laporan Pembayaran SPP</title>
</head>
<body>
    <table border="1" cellpadding="10" cellspacing="0" id="pemb">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Petugas</th>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Tanggal Bayar</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Nominal</th>
                <th>Jumlah Bayar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembayaran as $pemb)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $pemb->petugas->nama_petugas }}</td>
                    <td>{{ $pemb->siswa->nisn }}</td>
                    <td>{{ $pemb->siswa->nama }}</td>
                    <td>{{ $pemb->tgl_bayar }}</td>
                    <td>{{ $pemb->bulan_dibayar }}</td>
                    <td>{{ $pemb->tahun_dibayar }}</td>
                    <td>{{ $pemb->siswa->spp->nominal }}</td>
                    <td>{{ $pemb->jumlah_bayar }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>