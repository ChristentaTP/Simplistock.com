@extends('layout')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Dashboard Admin</h1>

    {{-- Ringkasan Data --}}
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Barang</h5>
                    <p class="card-text display-6">{{ $totalBarang }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Masuk</h5>
                    <p class="card-text display-6">{{ $totalMasuk }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Total Keluar</h5>
                    <p class="card-text display-6">{{ $totalKeluar }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Total Pegawai</h5>
                    <p class="card-text display-6">{{ $totalPegawai }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Barang Terbaru --}}
    <div class="card">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">5 Barang Terbaru</h5>
        </div>
        <div class="card-body">
            @if ($barang->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang as $index => $b)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $b->nama_barang }}</td>
                                    <td>{{ $b->stok }}</td>
                                    <td>{{ $b->kategori }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-muted">Tidak ada data barang terbaru.</p>
            @endif
        </div>
    </div>
</div>
@endsection
