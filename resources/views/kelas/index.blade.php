<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data Kelas</h4>
            <div>
                <!-- Tombol Dashboard yang baru ditambahkan -->
                <a href="{{ route('admin.dashboard') }}" class="btn btn-light btn-sm me-2">
                    <i class="fas fa-arrow-left"></i> Dashboard
                </a>
                
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            
            <!-- Pesan Sukses -->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Tombol Tambah -->
            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                + Tambah Kelas
            </button>

            <!-- Tabel Data -->
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kelas</th>
                        <th>Jurusan</th>
                        <th>Tahun Angkatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kelas as $k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $k->nama_kelas }}</td>
                            <td>{{ $k->jurusan }}</td>
                            <td>{{ $k->tahun_angkatan }}</td>
                            <td>
                                <a href="{{ route('kelas.edit', $k->id_kelas) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('kelas.destroy', $k->id_kelas) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin mau hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data kelas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah Kelas -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('kelas.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kelas Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nama Kelas</label>
                        <input type="text" name="nama_kelas" class="form-control" required placeholder="Contoh: XII RPL 1">
                    </div>
                    <div class="mb-3">
                        <label>Jurusan</label>
                        <input type="text" name="jurusan" class="form-control" required placeholder="Contoh: RPL">
                    </div>
                    <div class="mb-3">
                        <label>Tahun Angkatan</label>
                        <input type="number" name="tahun_angkatan" class="form-control" required placeholder="Contoh: 2024">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>