<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Barang</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<div class="container">
    <h2 class="mb-4">Data Barang</h2>

    <!-- Tombol Tambah -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#formModal" onclick="openCreateModal()">+ Tambah Barang</button>

    <!-- Tabel Barang -->
    <table class="table table-bordered">
        <thead class="table-light">
        <tr>
            <th>Nama</th>
            <th>Tipe</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($barang as $item)
            <tr id="row-{{ $item->id_barang }}">
                <td>{{ $item->nama_barang }}</td>
                <td>{{ $item->tipe }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>
                    <button class="btn btn-sm btn-warning" onclick="openEditModal({{ $item }})">Edit</button>
                    <button class="btn btn-sm btn-danger" onclick="deleteBarang({{ $item->id_barang }})">Hapus</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form id="barangForm" class="modal-content">
            @csrf
            <input type="hidden" name="id_barang" id="id_barang">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Tambah Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    <label>Nama Barang:</label>
                    <input type="text" name="nama_barang" id="nama_barang" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Tipe:</label>
                    <input type="text" name="tipe" id="tipe" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Jumlah:</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Keterangan:</label>
                    <input type="text" name="keterangan" id="keterangan" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success" onclick="submitForm()">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- JS Bootstrap + AJAX -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function openCreateModal() {
        document.getElementById('modalTitle').innerText = 'Tambah Barang';
        document.getElementById('barangForm').reset();
        document.getElementById('id_barang').value = '';
    }

    function openEditModal(data) {
        document.getElementById('modalTitle').innerText = 'Edit Barang';
        document.getElementById('id_barang').value = data.id_barang;
        document.getElementById('nama_barang').value = data.nama_barang;
        document.getElementById('tipe').value = data.tipe;
        document.getElementById('jumlah').value = data.jumlah;
        document.getElementById('keterangan').value = data.keterangan;
        new bootstrap.Modal(document.getElementById('formModal')).show();
    }

    function submitForm() {
        const form = document.getElementById('barangForm');
        const formData = new FormData(form);
        const id = formData.get('id_barang');
        const method = id ? 'PUT' : 'POST';
        const url = id ? `/data/barang/${id}` : `/data/barang`;

        fetch(url, {
            method: method,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: formData
        })
            .then(res => res.json())
            .then(data => {
                alert(data.message);
                location.reload();
            });
    }

    function deleteBarang(id) {
        if (confirm("Yakin ingin menghapus barang ini?")) {
            fetch(`/data/barang/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
                .then(res => res.json())
                .then(data => {
                    alert(data.message);
                    location.reload();
                });
        }
    }
</script>

</body>
</html>
