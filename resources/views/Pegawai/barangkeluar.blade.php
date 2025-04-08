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

@extends('layout')

@section('content')
<h1 class="text-2xl font-bold mb-4">Dashboard</h1>

<h3 class="text-xl font-semibold mb-2">Data Barang</h3>
<table class="w-full border border-gray-300 mt-4">
    <thead>
    <tr class="bg-gray-200">
        <th class="p-2">No</th>
        <th class="p-2">Nama Barang</th>
        <th class="p-2">Tipe</th>
        <th class="p-2">Jumlah</th>
        <th class="p-2">Keterangan</th>
    </tr>
    </thead>
    <tbody>
    @foreach($barang as $index => $b)
        <tr class="border-t">
            <td class="p-2">{{ $index + 1 }}</td>
            <td class="p-2">{{ $b->nama_barang }}</td>
            <td class="p-2">{{ $b->tipe }}</td>
            <td class="p-2">{{ $b->jumlah }}</td>
            <td class="p-2">{{ $b->keterangan }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<a href="{{ route('admin.barang') }}"
   class="inline-block mt-4 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
   Lihat Data Barang
</a>
@endsection

    </tbody>
</table>
</body>
</html>
