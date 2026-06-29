<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Sistem Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #1e88e5 0%, #1565c0 100%);
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            margin: 5px 0;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            color: white;
            background: rgba(255,255,255,0.1);
            border-radius: 5px;
        }
        .stat-card {
            border-left: 4px solid;
            transition: transform 0.3s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .stat-card.blue { border-left-color: #2196f3; }
        .stat-card.green { border-left-color: #4caf50; }
        .stat-card.orange { border-left-color: #ff9800; }
        .stat-card.red { border-left-color: #f44336; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar p-3">
            <h4 class="text-white text-center mb-4">
                <i class="fas fa-school"></i> E-Payment
            </h4>
            <hr class="bg-white">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-dashboard me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('kelas.index') }}">
                        <i class="fas fa-chalkboard me-2"></i> Data Kelas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-user-graduate me-2"></i> Data Siswa
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-money-bill me-2"></i> Jenis Pembayaran
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-file-invoice me-2"></i> Tagihan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-chart-bar me-2"></i> Laporan
                    </a>
                </li>
                <li class="nav-item mt-4">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link btn btn-danger w-100">
                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 p-4">
            <h2 class="mb-4">Dashboard Admin</h2>
            
            <!-- Statistik Cards -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card stat-card blue">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted">Total Siswa</h6>
                                    <h3>{{ $totalSiswa }}</h3>
                                </div>
                                <i class="fas fa-user-graduate fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="card stat-card green">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted">Total Kelas</h6>
                                    <h3>{{ $totalKelas }}</h3>
                                </div>
                                <i class="fas fa-chalkboard fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="card stat-card orange">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted">Total Tagihan</h6>
                                    <h5>Rp {{ number_format($totalTagihan, 0, ',', '.') }}</h5>
                                </div>
                                <i class="fas fa-money-bill fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="card stat-card red">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted">Belum Lunas</h6>
                                    <h3>{{ $tagihanBelumLunas }}</h3>
                                </div>
                                <i class="fas fa-exclamation-circle fa-2x text-danger"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabel Tagihan Terbaru -->
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="fas fa-list me-2"></i> Tagihan Terbaru</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Siswa</th>
                                    <th>Jenis Pembayaran</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tagihanTerbaru as $tagihan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $tagihan->siswa->nama_lengkap ?? '-' }}</td>
                                        <td>{{ $tagihan->jenisPembayaran->nama_pembayaran ?? '-' }}</td>
                                        <td>Rp {{ number_format($tagihan->jumlah, 0, ',', '.') }}</td>
                                        <td>
                                            @if($tagihan->status == 'lunas')
                                                <span class="badge bg-success">Lunas</span>
                                            @elseif($tagihan->status == 'belum_lunas')
                                                <span class="badge bg-danger">Belum Lunas</span>
                                            @else
                                                <span class="badge bg-warning">Menunggu</span>
                                            @endif
                                        </td>
                                        <td>{{ $tagihan->created_at->format('d M Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Belum ada data tagihan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>