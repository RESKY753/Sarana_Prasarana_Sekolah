<?php
include_once '../Models/m_aspirasi.php';

$aspirasi = new m_aspirasi();

if (isset($_GET['id'])) {       //untuk mengecek jika id tertangkap maka tampilkan data sesuai id
    $id = $_GET['id'];
    $aspirasi_ = $aspirasi->tampil_data_by_id($id);

    if (!$aspirasi_) {
        die('Data tidak ditemukan');
    }
    include_once '../Views/v_detail_aspirasi.php';
    exit;
} else {
    $aspirasis = $aspirasi->tampil_data();
    include_once '../Views/v_home_siswa.php';
}
