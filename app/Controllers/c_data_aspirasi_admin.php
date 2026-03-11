<?php
session_start();
if (!isset($_SESSION['result']['id_admin'])) {
    include_once '../Views/Layouts/Templates/template.php';
    exit();
}


include_once '../Models/m_aspirasi.php';
include_once '../Models/m_progres_aspirasi.php';

$aspirasi = new m_aspirasi();
$progres_aspirasi = new m_progres_aspirasi();

// Ambil filter dari query string, kalau ada
$filter = $_GET['filter'] ?? null;

// WAJIB: inisialisasi variabel view
$aspirasi_admin = [];

/* ================= DETAIL ASPIRASI ================= */
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $aspirasi_by_id = $aspirasi->tampil_data_by_id($id);

    if (!$aspirasi_by_id) {
        die('Data tidak ditemukan');
    }

    // Kirim data ke view detail
    include '../Views/v_detail_aspirasi_admin.php';
    exit;
}

/* ================= HISTORI PROGRES ================= */
if (isset($_GET['histori'])) {

    if (!isset($_SESSION['result']['id_admin'])) {
        die('Akses ditolak');
    }

    $id_admin = $_SESSION['result']['id_admin'];
    $histori_admin = $progres_aspirasi->tampil_data_by_id_admin($id_admin);

    include '../Views/v_histori_progres.php';
    exit;
}

/* ================= DATA HOME ADMIN ================= */
// Filter berdasarkan tanggal jika ada
if (!empty($filter)) {
    $aspirasi_admin = $aspirasi->TampilDataByTanggal($filter) ?? [];
} else {
    $aspirasi_admin = $aspirasi->tampil_data() ?? [];
}

// Terakhir, kirim data ke halaman utama
include '../Views/v_home_admin.php';
