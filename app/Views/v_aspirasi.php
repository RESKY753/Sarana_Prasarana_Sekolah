<?php
include_once '../Controllers/c_kategori.php';

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

<body style="background-color: whitesmoke;">
    <h2 class="text-center text-emphasis m-5 mb-10 ">Pengajuan Keluhan</h2>
    <form action="../Controllers/c_aspirasi.php" method="post">
        <div class="row g-4 mb-5">
            <div class="rounded-4 col-md-6 bg-white">
                <div class="p-4 fw-bold text-emphasis bg-white ">
                    <label class="form-label" for="typeEmailX-2">Judul Aspirasi</label>
                    <input type="text" id="typeEmailX-2" class="form-control form-control-lg" name="judul_aspirasi" required />
                </div>
                <div class="p-4 fw-bold text-emphasis bg-white">
                    <label class="form-label" for="typeEmailX-2">Keterangan Aspirasi</label>
                    <input type="text" id="typeEmailX-2" class="form-control form-control-lg" name="ket_aspirasi" required />
                </div>
                <div class="p-4  fw-bold text-emphasis bg-white">
                    <label class="form-label" for="typeEmailX-2">Kategori</label>
                    <select name="id_kategori" class="form-select" required>
                        <?= $kategoris; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="rounded-4 fw-bold text-emphasis bg-white m-0">
                    <div class="p-4 rounded-4 fw-bold text-emphasis bg-white">
                        <label class="form-label" for="typeEmailX-2">Tanggal Lapor</label>
                        <input type="date" id="typeEmailX-2" class="form-control form-control-lg" name="tanggal_lapor" value="<?= date('Y-m-d') ?>" readonly/>
                    </div>
                    <div class="p-4 rounded-4 fw-bold text-emphasis bg-white">
                        <label class="form-label" for="typeEmailX-2">Lokasi</label>
                        <input type="text" id="typeEmailX-2" class="form-control form-control-lg" name="lokasi" required />
                    </div>
                    <div class="p-4 rounded-4 fw-bold text-emphasis bg-white">
                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" type="submit" name="login_siswa">Ajukan Keluhan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/gh/hanzcode1/MyAlert@main/script.js"></script>

<?php if (isset($_SESSION['alert'])): ?>
    <script>
        MyAlert.show(<?= json_encode($_SESSION['alert']) ?>);
    </script>
<?php unset($_SESSION['alert']);
endif; ?>

</html>

</html>