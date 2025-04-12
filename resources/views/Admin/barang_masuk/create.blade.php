@extends('layout')

@section('content')
<div class="container mt-4">
    <h3>Tambah Barang Masuk</h3>

    <form action="{{ route('admin.barangmasuk.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_barang" class="form-label">Nama Barang</label>
            <select name="id_barang" class="form-select">
                @foreach ($listBarang as $barang)
                    <option value="{{ $barang->id_barang }}">{{ $barang->nama_barang }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="supplier" class="form-label">Supplier</label>
            <input type="text" name="supplier" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.barangmasuk.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
