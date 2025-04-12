@extends('layout')

@section('content')
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<!-- Main Content -->
<main class="container mx-auto px-4 pt-32 pb-20 max-w-6xl"> <!-- pt-32 to accommodate navbar and running text -->

<h2 class="mb-4" style="color: white;">Dashboard Pegawai - List Barang</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('pegawai.barangkeluar.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">ID Barang:</label>
            <input type="text" name="id_barang" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal:</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah:</label>
            <input type="number" name="jumlah" class="form-control" required min="1">
        </div>

        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>

    <hr class="my-5">

    <h3 class="mb-3">Riwayat Barang Keluar oleh Anda</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID Keluar</th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach($riwayat as $r)
                <tr>
                    <td>{{ $r->id_keluar }}</td>
                    <td>{{ $r->id_barang }}</td>
                    <td>{{ $r->barang->nama_barang ?? 'Tidak ditemukan' }}</td>
                    <td>{{ $r->tanggal }}</td>
                    <td>{{ $r->jumlah }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
