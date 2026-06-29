<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Edit Data Kelas</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('kelas.update', $kelas->id_kelas) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label>Nama Kelas</label>
                    <input type="text" name="nama_kelas" class="form-control" 
                           value="{{ old('nama_kelas', $kelas->nama_kelas) }}" required>
                </div>
                
                <div class="mb-3">
                    <label>Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" 
                           value="{{ old('jurusan', $kelas->jurusan) }}" required>
                </div>
                
                <div class="mb-3">
                    <label>Tahun Angkatan</label>
                    <input type="number" name="tahun_angkatan" class="form-control" 
                           value="{{ old('tahun_angkatan', $kelas->tahun_angkatan) }}" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ url('/kelas') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>