<?php
session_start();
include_once '../Models/m_progres_aspirasi.php' ;
if (!isset($_SESSION['result']['id_siswa'])) {
    include_once '../Views/Layouts/Templates/Login_dulu.php';
    exit();
}


$id_aspirasi = $_POST['id_aspirasi'];
$id_admin = $_SESSION['result']['id_admin'];
$id_progres = $_POST['id_progres'];
$status = $_POST['status'];
$umpan_balik = $_POST['umpan_balik'];
$ket_progres = $_POST['keterangan'];

//membuat variabel cobaan buat tes data yang di post sudah masuk belu
// $cobaan = [$id_admin, $id_progres, $status, $umpan_balik, $keterangan]; 

// echo "<pre>";
// var_dump($cobaan);
// echo "<pre>";
$progres = new m_progres_aspirasi();

if (empty($id_progres)) {
    $tambah = $progres->tambah_progres($id_aspirasi, $id_admin, $umpan_balik, $status, $ket_progres);

    $_SESSION['alert'] = [
        'type'    => 'success', // jenis alert (success, error, warning, info)
        'title'   => 'Berhasil', // judul alert
        'message' => 'Data Berhasil ditambah', // isi pesan alert
        'icon' => 'success', // isi pesan alert
        'autoClose' => 4000,
    ];
    header("Location:../Controllers/c_data_aspirasi_admin.php");
    exit;
}else{
    $update = $progres->update_progres($id_admin,$umpan_balik,$status,$ket_progres,$id_progres);

    $_SESSION['alert'] = [
        'type'    => 'success', // jenis alert (success, error, warning, info)
        'title'   => 'Berhasil', // judul alert
        'message' => 'Data Berhasil Diubah', // isi pesan alert
        'icon' => 'success', // isi pesan alert
        'autoClose' => 4000,
    ];
    header("Location:../Controllers/c_data_aspirasi_admin.php");
    exit;
}
?>