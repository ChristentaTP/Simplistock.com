@extends('layout')

@section('content')
<div class="container mt-4">
    <h3>Edit Data Barang Masuk</h3>

    <form action="{{ route('admin.barangmasuk.update', $barangMasuk->id_masuk) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="id_barang" class="form-label">Nama Barang</label>
            <select name="id_barang" class="form-select">
                @foreach ($listBarang as $barang)
                    <option value="{{ $barang->id_barang }}" {{ $barangMasuk->id_barang == $barang->id_barang ? 'selected' : '' }}>
                        {{ $barang->nama_barang }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" value="{{ $barangMasuk->jumlah }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="supplier" class="form-label">Supplier</label>
            <input type="text" name="supplier" value="{{ $barangMasuk->supplier }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.barangmasuk.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
