<?php
session_start();
if (!isset($_SESSION['result']['id_siswa'])) {
    include_once '../Views/Layouts/Templates/Login_dulu.php';
    exit();
}

// echo "<pre>";
// var_dump($_SESSION['result']['id_siswa']);
// echo "<pre>";
include_once '../Models/m_aspirasi.php';

// buat objek model
$aspirasi = new m_aspirasi();

// ambil parameter filter dari url kalau ada
$filter = $_GET['filter'] ?? null;

// kalau ada id di url berarti buka halaman detail
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // ambil data berdasarkan id
    $aspirasi_ = $aspirasi->tampil_data_by_id($id);

    // kalau data tidak ada, hentikan proses
    if (!$aspirasi_) {
        die('Data tidak ditemukan');
    }

    // tampilkan halaman detail
    include_once '../Views/v_detail_aspirasi.php';
    exit;
}

// variabel untuk menampung data list
$aspirasis = [];

// jika ada filter tanggal
if (!empty($filter)) {
    // tampilkan data sesuai filter
    $aspirasis = $aspirasi->TampilDataByTanggal($filter) ?? [];
} else {
    // jika tidak ada filter, tampilkan semua data
    $aspirasis = $aspirasi->tampil_data() ?? [];
}

// kirim data ke halaman utama
include_once '../Views/v_home_siswa.php';
