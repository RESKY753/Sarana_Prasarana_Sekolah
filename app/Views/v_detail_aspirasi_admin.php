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
    <!-- DETAIL ASPIRASI -->
    <div class="card mb-3 mt-3">
        <div class="card-header fw-bold">Detail Aspirasi</div>
        <div class="card-body">
            <p><strong>Judul:</strong><br><?= $aspirasi_by_id->judul_aspirasi ?></p>
            <p><strong>Kategori:</strong><br><?= $aspirasi_by_id->ket_kategori ?></p>
            <p><strong>Lokasi:</strong><br><?= $aspirasi_by_id->lokasi ?></p>
            <p><strong>Tanggal:</strong><br><?= $aspirasi_by_id->tanggal_lapor ?></p>
            <p>
                <strong>Status:</strong><br>
                <span class="badge bg-warning"><?= $aspirasi_by_id->status ?></span>
            </p>
            <p><strong>Keterangan:</strong></p>
            <p><?= $aspirasi_by_id->ket_aspirasi ?></p>
        </div>
    </div>

    <!-- RIWAYAT PROGRES -->
    <div class="card mb-3">
        <div class="card-header fw-bold">Riwayat Progres</div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">
                    <strong><?= $aspirasi_by_id->tanggal_update ?></strong> —
                    <span class="badge bg-warning" ><?= $aspirasi_by_id->status?></span><br>
                    <?= $aspirasi_by_id->ket_progres ?>
                </li>
            </ul>
        </div>
    </div>

    <!-- FORM UPDATE STATUS -->
    <div class="card">
        <div class="card-header fw-bold">Update Status</div>
        <div class="card-body">
            <form method="post" action="../Controllers/c_progres_aspirasi.php">
                <input type="hidden" name="id_aspirasi">

                <div class="mb-3">
                    <label class="form-label">Status Baru</label>
                    <select
                        name="status"
                        id="statusSelect"
                        class="form-select"
                        required>
                        <option value="" <?= $aspirasi_by_id->status == '' ? 'selected' : '' ?>>Menunggu Respon</option>
                        <option value="menunggu" <?= $aspirasi_by_id->status == 'menunggu' ? 'selected' : '' ?>>
                            Menunggu
                        </option>
                        <option value="proses" <?= $aspirasi_by_id->status == 'proses' ? 'selected' : '' ?>>
                            Proses
                        </option>
                        <option value="selesai" <?= $aspirasi_by_id->status == 'selesai' ? 'selected' : '' ?>>
                            Selesai
                        </option>
                        
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan Progres</label>
                    <textarea
                        name="keterangan"
                        class="form-control"
                        rows="3"
                        required placeholder="<?= $aspirasi_by_id->ket_progres ?>"></textarea>
                </div>

                <!-- UMPAN BALIK (MUNCUL JIKA SELESAI) -->
                <div class="mb-3 d-none" id="feedbackField">
                    <label class="form-label">Umpan Balik untuk Siswa</label>
                    <textarea
                        name="umpan_balik"
                        id="feedbackTextarea"
                        class="form-control"
                        rows="3"
                        placeholder="Tulis umpan balik untuk siswa..."></textarea>
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <a href="../Views/v_home_admin.php" class="btn btn-secondary">
                        ← Kembali
                    </a>
                    <button type="submit" class="btn btn-success" name="gas_update">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        // Ambil elemen dropdown status
        const statusSelect = document.getElementById('statusSelect');

        // Ambil container field feedback (div yang bisa disembunyikan)
        const feedbackField = document.getElementById('feedbackField');

        // Ambil textarea feedback
        const feedbackTextarea = document.getElementById('feedbackTextarea');

        // Event listener: dijalankan setiap kali status diubah
        statusSelect.addEventListener('change', function() {

            // Jika status dipilih "selesai"
            if (this.value === 'selesai') {

                // Tampilkan field feedback
                feedbackField.classList.remove('d-none');

                // Jadikan textarea wajib diisi
                feedbackTextarea.setAttribute('required', true);

            } else {
                // Jika status selain "selesai"

                // Sembunyikan field feedback
                feedbackField.classList.add('d-none');

                // Hapus aturan wajib isi
                feedbackTextarea.removeAttribute('required');

                // Kosongkan isi textarea (biar nggak nyangkut data lama)
                feedbackTextarea.value = '';
            }
        });
    </script>

</body>
<script src="https://cdn.jsdelivr.net/gh/hanzcode1/MyAlert@main/script.js"></script>

<?php if (isset($_SESSION['alert'])): ?>
    <script>
        MyAlert.show(<?= json_encode($_SESSION['alert']) ?>);
    </script>
<?php unset($_SESSION['alert']);
endif; ?>

</html>