@if($data->isEmpty())
    <p>Tidak ada data yang terhapus.</p>
@else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Tanggal Dihapus</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->getKey() }}</td>
                <td>{{ $item->nama_barang ?? $item->barang->nama_barang ?? '-' }}</td>
                <td>{{ $item->deleted_at }}</td>
                <td>
                    <form action="{{ route('admin.trash.restore', ['type' => $type, 'id' => $item->getKey()]) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-success">Restore</button>
                    </form>

                    <form action="{{ route('admin.trash.forceDelete', ['type' => $type, 'id' => $item->getKey()]) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus permanen?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus Permanen</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
