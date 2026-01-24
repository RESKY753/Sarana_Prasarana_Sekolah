<?php

session_start();
include_once '../Controllers/c_data.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Sarana Prasarana Sekolah</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Assets/dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/hanzcode1/MyAlert@main/style.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body style="font-family: Arial, Helvetica, sans-serif;">
    <div class="container" style="max-width: 100%;">
        <header class="item header">Pengaduan Sarana Prasarana Sekolah</header>
        <aside class="item sidebar ">
            <ul>
                <a href="v_aspirasi.php" class="text-decoration-none fw-bold text-dark">Ajukan keluhan</a><br>
                <hr>
                <a href="" class="text-decoration-none fw-bold text-dark">Status Keluhan</a><br>
                <hr>
                <form action="../Controllers/c_logout.php" method="post">
                    <a href="../Views/v_logout.php" class=" text-decoration-none btn bg-white border-0 text-danger fw-bold bg-light">Logout</a><br>
                </form>
                <hr>
            </ul>
        </aside>
        <main class="item main">
            <h5 class="fw-bold">Keluhan Semua Siswa</h5>
            <li class="nav-item dropdown list-unstyled">
                <a class="nav-link dropdown-toggle mb-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Filter
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Hari ini</a></li>
                    <li><a class="dropdown-item" href="#">Kemarin</a></li>
                    <li><a class="dropdown-item" href="#">Minggu Ini</a></li>
                    <li><a class="dropdown-item" href="#">Minggu Lalu</a></li>
                    <li><a class="dropdown-item" href="#">Bulan Ini</a></li>
                    <li><a class="dropdown-item" href="#">Bulan Lalu</a></li>
                </ul>
            </li>
            <div class="d-flex flex-column gap-3">
                <div class="d-flex flex-column gap-3">
                    <?php $no = 1;
                    foreach ($aspirasis as $data): ?>
                        <div class="card">
                            <div class='card-header'>
                                <?= $no++ ?>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?= $data->judul_aspirasi ?></h5>
                                <p class="card-text badge rounded-pill bg-primary-subtle text-primary mb-2"><?= $data->status ?></p>
                                <p class="card-text"><?= $data->tanggal_lapor ?></p>
                                <a href="../Controllers/c_data.php?id=<?= $data->id_aspirasi ?>" class="btn btn-primary">lihat</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
    </div>
    </main>
    <footer class="item footer">
        foooter
    </footer>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/gh/hanzcode1/MyAlert@main/script.js"></script>

<?php if (isset($_SESSION['alert'])): ?>
    <script>
        MyAlert.show(<?= json_encode($_SESSION['alert']) ?>);
    </script>
<?php unset($_SESSION['alert']);
endif; ?>

</html>