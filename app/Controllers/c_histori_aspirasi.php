<?php
session_start();
include_once '../Models/m_aspirasi.php';

$aspirasi = new m_aspirasi();

if (isset($_GET['id'])) {
    $id_siswa = $_GET['id'];
    $histori_aspirasi = $aspirasi->tampil_data_by_id_siswa($id_siswa);
    include_once '../Views/v_histori.php';
}
?>