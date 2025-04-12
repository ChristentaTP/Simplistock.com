<form action="{{ route('barangkeluar.destroy', $item->id_keluar) }}" method="POST" onsubmit="return confirm('Yakin?')">
    @csrf
    @method('DELETE')
    <button type="submit">Hapus</button>
</form>
