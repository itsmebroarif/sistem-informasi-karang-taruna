<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: DejaVu Sans; font-size: 12px; }
        table { width:100%; border-collapse: collapse; }
        th,td { border:1px solid #000; padding:6px; }
        th { background:#eee; }
    </style>
</head>
<body>

<h3 style="text-align:center">RUNDOWN ACARA KARANG TARUNA</h3>

<table>
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Kegiatan</th>
            <th>PJ</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $row)
        <tr>
            <td>{{ $row->tanggal }}</td>
            <td>{{ $row->waktu_mulai }} - {{ $row->waktu_selesai }}</td>
            <td>{{ $row->kegiatan }}</td>
            <td>{{ $row->penanggung_jawab }}</td>
            <td>{{ $row->keterangan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
