<?php
session_start();

include_once '../Models/m_aspirasi.php';

$aspirasi = new m_aspirasi();
//$kategori = new m_kategori();
//$aspirasis = $aspirasi->tampil_data();
//$kategoris = $kategori->tampil_kategori();

if (isset($_POST['login_siswa'])) {
    $id_siswa = $_SESSION['id_siswa'];
    $judul_aspirasi = $_POST['judul_aspirasi'];
    $ket_aspirasi = $_POST['ket_aspirasi'];
    $kategori = $_POST['id_kategori'];
    //$tanggal_lapor = $_POST['tanggal_lapor'];
    $lokasi = $_POST['lokasi'];

    $tambah_aspirasi = $aspirasi->tambah_aspirasi($id_siswa, $judul_aspirasi, $ket_aspirasi, $kategori,$lokasi);

    $_SESSION['alert'] = [
        'type'    => 'success', // jenis alert (success, error, warning, info)
        'title'   => 'Berhasil', // judul alert
        'message' => 'Berhasil di tambahkan', // isi pesan alert
        'icon' => 'success', // isi pesan alert
        'autoClose' => 4000,
    ];
    header("location:../Views/v_home_siswa.php");
    exit;
}
