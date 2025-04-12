<!-- resources/views/pegawai/listbarang.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Barang</title>
</head>
<body>
    <h1>Daftar Barang Pegawai</h1>

    @if(count($barangs))
        <ul>
            @foreach($barangs as $barang)
                <li>{{ $barang->nama_barang }} (stok: {{ $barang->stok }})</li>
            @endforeach
        </ul>
    @else
        <p>Tidak ada data barang.</p>
    @endif

</body>
</html>
