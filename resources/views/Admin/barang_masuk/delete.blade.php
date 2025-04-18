@extends('layout')

@section('content')
<div class="container mt-4">
    <h4>Yakin ingin menghapus data berikut?</h4>
    <p><strong>{{ $barangMasuk->barang->nama_barang }}</strong> - {{ $barangMasuk->jumlah }} pcs dari {{ $barangMasuk->supplier }}</p>

    <form action="{{ route('admin.barangmasuk.destroy', $barangMasuk->id_masuk) }}" method="POST">
        @csrf @method('DELETE')
        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
        <a href="{{ route('admin.barangmasuk.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
