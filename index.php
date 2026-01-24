<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>

    </style>
</head>

<body class="bg-light d-flex justify-content-center align-items-center min-vh-100">
    <div class="container bg-white shadow-lg rounded-5 p-5" style="max-width:1100px">
        <h1 class=" text-center mb-5">Pengaduan Sarana Sekolah</h1>
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="p-4 rounded-4 fw-bold text-warning-emphasis bg-warning-subtle">
                    <h5 class="card-title">Menunggu</h5>
                    <p class="card-text">1</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded-4 fw-bold text-warning-emphasis bg-primary-subtle">
                    <h5 class="card-title">Di Proses</h5>
                    <p class="card-text">1</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded-4 fw-bold text-warning-emphasis bg-success-subtle">
                    <h5 class="card-title">Selesai</h5>
                    <p class="card-text">1</p>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <!-- Admin -->
            <div class="col-md-6">
                <div class="card border-1 rounded-4 h-100">
                    <div class="card-body p-4">
                        <span class="badge rounded-pill bg-primary-subtle text-primary mb-2">
                            Login Admin
                        </span>
                        <h2 class="mt-2">Login Sebagai admin</h2>
                        <ul class="text-secondary">
                            <p>Jika anda seorang admin klik masuk sebagai admin disini</p>
                        </ul>
                        <a href="app/Views/v_login.php" class="btn btn-primary w-100 py-2 rounded-4">
                            Masuk Sebagai Admin
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-1 rounded-4 h-100">
                    <div class="card-body p-4">
                        <span class="badge rounded-pill bg-primary-subtle text-primary mb-2">
                            Login Siswa
                        </span>
                        <h2 class="mt-2">Login Sebagai siswa</h2>
                        <ul class="text-secondary">
                            <p>Jika anda seorang admin klik masuk sebagai siswa disini</p>
                        </ul>
                        <a href="app/Views/v_login_siswa.php" class="btn btn-success w-100 py-2 rounded-4">
                            Masuk Sebagai Siswa
                        </a>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>