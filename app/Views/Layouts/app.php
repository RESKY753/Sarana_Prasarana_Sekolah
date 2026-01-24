<!DOCTYPE html>
<!-- file ini digunakan untuk alert -->
<!-- sumber alert Github:https://github.com/hanzcode1/MyAlert.git -->

<!-- Menandakan dokumen ini HTML5 -->

<html>
<!-- Root elemen HTML -->

<head>
    <meta charset="UTF-8">
    <!-- pemanggilan css dan js di assets yang berisi folder alert -->
    <link rel="stylesheet" href="../../../Assets/MyAlert/style.css">
    <script src="../../../Assets/MyAlert/script.js"></script>

    <!-- Set encoding agar karakter (ID, simbol, dll) tidak rusak -->

    <!-- MyAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/hanzcode1/MyAlert@main/style.css">
    <!-- Style utama untuk tampilan alert (warna, animasi, posisi) -->

    <!-- Font Awesome (dependency) -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Ikon yang dipakai MyAlert (success, error, warning, dll) -->
</head>

<body>
    <!-- Awal body, semua konten halaman ada di sini -->

    <?= $content ?>
    <!--
        Placeholder konten:
        - Isinya HTML dari view (login, dashboard, dll)
        - Diisi oleh controller
        - Setiap halaman akan muncul di sini
    -->

    <!-- MyAlert JS -->
    <script src="https://cdn.jsdelivr.net/gh/hanzcode1/MyAlert@main/script.js"></script>
    <!-- Script utama MyAlert, WAJIB dipanggil sebelum MyAlert.fire() -->

    <?php if (isset($_SESSION['alert'])): ?>
        <!-- Cek apakah controller mengirim alert lewat session -->

        <script>
            MyAlert.fire(<?= json_encode($_SESSION['alert']) ?>);
            // Menjalankan alert di browser
            // Data dikirim dari PHP → JS dalam bentuk JSON
        </script>

    <?php unset($_SESSION['alert']);
    endif; ?>
    <!--
        Hapus alert dari session
        Supaya alert:
        - hanya muncul sekali
        - tidak muncul lagi saat refresh
    -->

</body>

</html>