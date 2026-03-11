
<?php
if (!isset($_SESSION['result']['id_siswa'])) {
include_once 'Layouts/Templates/Login_dulu.php';
exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori Aspirasi</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Assets/histori.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/hanzcode1/MyAlert@main/style.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body style="font-family: Arial, Helvetica, sans-serif;">
    <div class="d-flex flex-column gap-3">
        <header class="item header position-relative px-3">
            <a href="../Controllers/c_data.php"
                class="position-absolute start-0 top-50 translate-middle-y ms-3
              text-white fw-bold fs-4 text-decoration-none">
                &larr;
            </a>

            <div class="text-center fw-bold text-white">
                Pengaduan Sarana Prasarana Sekolah
            </div>
        </header>

        <div class="card shadow-sm mb-1 ms-2 mt-5" style="max-width: 220px;">
            <div class="card-body p-2">
                <div class="dropdown">
                    <a class="btn w-100 d-flex justify-content-between align-items-center fw-semibold"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        style="background-color:#f1f3f5;">
                        Filter
                        <i class="fa-solid fa-chevron-down"></i>
                    </a>
                    <form action="../Controllers/c_histori_aspirasi.php">
                        <ul class="dropdown-menu w-100 mt-1">
                            <li><button name="filter" class="dropdown-item" value="semua">Semua</button></li>
                            <li><button name="filter" class="dropdown-item" value="hari_ini">Hari ini</button></li>
                            <li><button name="filter" class="dropdown-item" value="kemarin">Kemarin</button></li>
                            <li><button name="filter" class="dropdown-item" value="minggu_ini">Minggu Ini</button></li>
                            <li><button name="filter" class="dropdown-item" value="minggu_lalu">Minggu Lalu</button></li>
                            <li><button name="filter" class="dropdown-item" value="bulan_ini">Bulan Ini</button></li>
                            <li><button name="filter" class="dropdown-item" value="bulan_lalu">Bulan Lalu</button></li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>

        <?php $no = 1;
        foreach ($histori_aspirasi as $data): ?>
            <div class="card shadow-sm mb-5">
                <!-- HEADER -->
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span class="fw-bold">Aspirasi<?= $no++ ?></span>
                    <span class="fw-semibold"><?= $data->tanggal_lapor ?></span>
                </div>

                <div class="card-body">
                    <!-- JUDUL -->
                    <h5 class="fw-bold mb-4"><?= $data->judul_aspirasi ?></h5>

                    <!-- KATEGORI -->
                    <div class="mb-3">
                        <p class="mb-1 fw-bold">Kategori</p>
                        <p><?= $data->ket_kategori ?></p>
                    </div>

                    <!-- LOKASI (DIBAWAH) -->
                    <div class="mb-3">
                        <p class="mb-1 fw-bold">Lokasi</p>
                        <p><?= $data->lokasi ?></p>
                    </div>

                    <!-- STATUS (TIDAK DIUBAH) -->
                    <div class="mb-3">
                        <p class="mb-1 fw-bold">Status</p>
                        <span class="badge rounded-pill bg-primary-subtle text-primary">
                            <?= $data->status ?>
                        </span>
                    </div>
                    <div class="mb-3">
                        <span class="fw-semibold text-secondary">Progres Perbaikan:</span><br>
                        <span>
                            <?= $data->ket_progres ?>
                        </span>
                    </div>

                    <hr>

                    <!-- KETERANGAN -->
                    <div class="mb-3">
                        <p class="mb-1 fw-bold">Keterangan Aspirasi</p>
                        <p><?= $data->ket_aspirasi ?></p>
                    </div>

                    <!-- UMPAN BALIK -->
                    <div class="mb-3">
                        <p class="mb-1 fw-bold">Umpan Balik</p>
                        <p>
                            <?= $data->umpan_balik ?: '<span class="text-muted">Belum ada umpan balik</span>' ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
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