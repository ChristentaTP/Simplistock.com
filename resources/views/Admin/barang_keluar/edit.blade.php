@extends('layout')

@section('content')
<div class="container">
    <h2>Edit Barang Keluar</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('admin.barangkeluar.update', $barangKeluar->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nama Barang</label>
            <select name="id_barang" class="form-control">
                @foreach($listBarang as $barang)
                    <option value="{{ $barang->id_barang }}" {{ $barang->id_barang == $barangKeluar->id_barang ? 'selected' : '' }}>
                        {{ $barang->nama_barang }} (Stok: {{ $barang->jumlah }})
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah', $barangKeluar->jumlah) }}">
        </div>
        <div class="form-group">
            <label>Penerima</label>
            <select name="penerima" class="form-control">
                @foreach($pegawai as $p)
                    <option value="{{ $p->id_user }}" {{ $p->id_user == $barangKeluar->penerima ? 'selected' : '' }}>
                        {{ $p->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.barangkeluar.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
