<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f4f4f4;
            text-align: left;
        }
    </style>
</head>
<body>
<h1>Dashboard</h1>

<h3>Data Barang</h3>
<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Tipe</th>
        <th>Jumlah</th>
        <th>Keterangan</th>
    </tr>
    </thead>
    <tbody>
    @foreach($barang as $index => $b)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $b->nama_barang }}</td>
            <td>{{ $b->tipe }}</td>
            <td>{{ $b->jumlah }}</td>
            <td>{{ $b->keterangan }}</td>
        </tr>
    @endforeach
    <a href="{{ route('data.barang') }}" class="btn btn-primary">Lihat Data Barang</a>

    </tbody>
</table>
</body>
</html>
