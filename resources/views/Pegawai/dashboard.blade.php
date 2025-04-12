@extends('layout')

@section('content')

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<!-- Main Content -->
<main class="container mx-auto px-4 pt-32 pb-20 max-w-6xl"> <!-- pt-32 to accommodate navbar and running text -->

<h2 class="mb-4" style="color: white;">Dashboard Pegawai - List Barang</h2>

    <form method="GET" action="{{ route('pegawai.dashboard') }}" class="row g-3 mb-4">
        <div class="col-md-4">
            <label for="tipe" class="form-label">Tipe:</label>
            <select name="tipe" class="form-select">
                <option value="">-- Semua --</option>
                @foreach(['Leptop','Monitor','Keyboard','Printer','Router','Switch','Server','Stroge','Aksesoris','Power','Scanne','Smartphone','Tablet','Komputer','Lainnya'] as $tipe)
                    <option value="{{ $tipe }}" {{ request('tipe') == $tipe ? 'selected' : '' }}>{{ $tipe }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="keterangan" class="form-label">Keterangan:</label>
            <select name="keterangan" class="form-select">
                <option value="">-- Semua --</option>
                <option value="Dalam Negeri" {{ request('keterangan') == 'Dalam Negeri' ? 'selected' : '' }}>Dalam Negeri</option>
                <option value="Luar Negeri" {{ request('keterangan') == 'Luar Negeri' ? 'selected' : '' }}>Luar Negeri</option>
            </select>
        </div>

        <div class="col-md-4 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">Filter</button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Tipe</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangs as $barang)
                    <tr>
                        <td>{{ $barang->id_barang }}</td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->tipe }}</td>
                        <td>{{ $barang->jumlah }}</td>
                        <td>{{ $barang->keterangan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
