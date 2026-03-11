<?php
session_start(); // Memulai session untuk mengakses data login siswa
if (!isset($_SESSION['result']['id_siswa'])) {
    include_once '../Views/Layouts/Templates/Login_dulu.php';
    exit();
}

include_once '../Models/m_aspirasi.php';

$aspirasi = new m_aspirasi();

// Ambil id_siswa dari session login
// Jika session tidak ada, id_siswa akan null
$id_siswa = $_SESSION['result']['id_siswa'] ?? null;

// Ambil filter dari URL (misal ?filter=hari_ini)
$filter   = $_GET['filter'] ?? null;

// Jika id_siswa kosong, hentikan eksekusi
// Ini untuk mencegah error atau query ke data siswa yang tidak valid
if (!$id_siswa) {
    die("ID siswa tidak valid");
}

// Tentukan data aspirasi yang akan diambil
if ($filter && $filter !== 'semua') {
    // Jika filter dipilih (hari_ini, kemarin, minggu_ini, bulan_ini, dll)
    // Ambil data dengan filter tanggal tertentu dari model
    $histori_aspirasi = $aspirasi->TampilDataHistoriByTanggal($filter, $id_siswa);
} else {
    // Jika filter 'semua' atau tidak ada filter
    // Ambil semua data aspirasi milik siswa
    $histori_aspirasi = $aspirasi->tampil_data_by_id_siswa($id_siswa);
}

// Tampilkan data ke view
include_once '../Views/v_histori.php';
