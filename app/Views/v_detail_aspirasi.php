<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Detail Aspirasi</title>
</head>

<body class="bg-light py-4">

    <div class="container d-flex justify-content-center">
        <div class="card shadow-sm rounded-4" style="max-width: 32rem; width:100%;">

            <!-- Header -->
            <div class="card-header bg-primary text-white d-flex align-items-center">
                <a href="../Views/v_home_siswa.php"
                    class="text-white text-decoration-none me-3 fw-bold">
                    &larr;
                </a>
                <span class="fw-bold fs-5">
                    <?= $aspirasi_->judul_aspirasi ?>
                </span>
            </div>


            <!-- Body -->
            <div class="card-body">

                <div class="mb-3">
                    <span class="fw-semibold text-secondary">Kategori</span>
                    <div class="fw-medium"><?= $aspirasi_->ket_kategori ?></div>
                </div>

                <div class="mb-3">
                    <span class="fw-semibold text-secondary">Lokasi</span>
                    <div class="fw-medium"><?= $aspirasi_->lokasi ?></div>
                </div>

                <div class="mb-3">
                    <span class="fw-semibold text-secondary">Status</span><br>
                    <span class="badge bg-primary text-light px-3 py-2">
                        <?= $aspirasi_->status ?>
                    </span>
                </div>
                <div class="mb-3">
                    <span class="fw-semibold text-secondary">Progres Perbaikan:</span><br>
                    <span>
                        <?= $aspirasi_->ket_progres ?>
                    </span>
                </div>

                <hr>

                <div class="mb-3">
                    <span class="fw-semibold text-secondary">Keterangan Aspirasi</span>
                    <p class="mb-0 mt-1">
                        <?= $aspirasi_->ket_aspirasi ?>
                    </p>
                </div>

            </div>

            <!-- Footer info -->
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <span class="fw-semibold">Umpan Balik</span><br>
                    <?= $aspirasi_->umpan_balik ?: '<span class="text-muted">Belum ada umpan balik</span>' ?>
                </li>
                <li class="list-group-item">
                    <span class="fw-semibold">Tanggal Lapor</span><br>
                    <?= $aspirasi_->tanggal_lapor ?>
                </li>
            </ul>

        </div>
    </div>

</body>

</html>