<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Pembayaran Sekolah</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        .btn-primary {
            background-color: #0d6efd;
            border: none;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card login-card p-4">
                    <div class="text-center mb-4">
                        <h4 class="fw-bold">Sistem Pembayaran Sekolah</h4>
                        <p class="text-muted">SMK Budi Bakti Ciwidey</p>
                    </div>

                    <!-- Menampilkan Pesan Error (Jika Username/Salah) -->
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first() }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Form Login -->
                    <form method="POST" action="{{ url('/login') }}">
                        <!-- Token Keamanan Wajib Laravel -->
                        @csrf 

                        <div class="mb-3">
                            <label for="username" class="form-label">Username / NISN</label>
                            <input type="text" name="username" class="form-control" placeholder="Masukkan username" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                        </div>
                    </form>
                    
                    <div class="text-center mt-3">
                        <small class="text-muted">Masuk sebagai Admin atau Siswa</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>