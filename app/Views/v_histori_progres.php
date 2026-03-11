<?php
if (!isset($_SESSION['result']['id_admin'])) {
    include_once 'Layouts/Templates/template.php';
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Assets/dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/hanzcode1/MyAlert@main/style.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand">Sistem Aspirasi</span>
            <span class="text-white">Admin</span>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">

            <!-- SIDEBAR -->
            <div class="col-md-2 bg-light min-vh-100 p-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="c_data_aspirasi_admin.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="#">Histori Progres</a>
                    </li>
                </ul>
            </div>

            <!-- CONTENT -->
            <div class="col-md-10 p-4">

                <!-- ================= HARI INI ================= -->
                <h5 class="fw-bold">Hari Ini</h5>
                <?php foreach ($histori_admin as $data):
                ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <strong><?= $data->judul_aspirasi ?></strong>
                                <small class="text-muted"><?= $data->tanggal_update ?></small>
                            </div>

                            <div class="mt-2">
                                <span class="badge bg-secondary"><?= $data->status ?></span>
                            </div>

                            <p class="mt-2 text-muted">
                                <?= $data->ket_aspirasi ?>
                            </p>

                            <div class="text-end">
                                <a href="../Controllers/c_data_aspirasi_admin.php?id=<?= $data->id_aspirasi ?>" class="btn btn-sm btn-primary">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>

                <!-- ================= KEMARIN ================= -->
                <h5 class="fw-bold mt-5">Kemarin</h5>

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <strong>Toilet Bocor</strong>
                            <small class="text-muted">03 Feb 2026 · 14:20</small>
                        </div>

                        <div class="mt-2">
                            <span class="badge bg-secondary">Menunggu</span>
                        </div>

                        <p class="mt-2 text-muted">
                            Ini data dummy
                        </p>

                        <div class="text-end">
                            <a href="v_detail_aspirasi_admin.php?id=2" class="btn btn-sm btn-primary">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>

                <!-- ================= SEBELUMNYA ================= -->
                <h5 class="fw-bold mt-5">Sebelumnya</h5>

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <strong>Pintu Kelas Rusak</strong>
                            <small class="text-muted">30 Jan 2026</small>
                        </div>

                        <div class="mt-2">
                            <span class="badge bg-warning">Proses</span>
                        </div>

                        <p class="mt-2 text-muted">
                            Ini data dummy
                        </p>

                        <div class="text-end">
                            <a href="v_detail_aspirasi_admin.php?id=3" class="btn btn-sm btn-primary">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
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