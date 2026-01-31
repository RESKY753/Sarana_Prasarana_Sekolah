<?php
include_once '../Models/m_aspirasi.php';

$aspirasi = new m_aspirasi();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $aspirasi_by_id = $aspirasi->tampil_data_by_id($id);
    
    if (!$aspirasi_by_id) {
        die('Data tidak ditemukan');
    }
    include_once '../Views/v_detail_aspirasi_admin.php';
    exit;
} else {
    $aspirasi_admin = $aspirasi->tampil_data();
}
?>