@extends('layout')

@section('content')
<div class="container">
    <h2>Tambah Barang Keluar</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('admin.barangkeluar.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Barang</label>
            <select name="id_barang" class="form-control">
                <option value="">-- Pilih Barang --</option>
                @foreach($listBarang as $barang)
                    <option value="{{ $barang->id_barang }}">{{ $barang->nama_barang }} (Stok: {{ $barang->jumlah }})</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah') }}">
        </div>
        <div class="form-group">
            <label>Penerima</label>
            <select name="penerima" class="form-control">
                <option value="">-- Pilih Pegawai --</option>
                @foreach($pegawai as $p)
                    <option value="{{ $p->id_user }}">{{ $p->nama }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.barangkeluar.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
