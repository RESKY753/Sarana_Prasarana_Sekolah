<?php
session_start();
if (!isset($_SESSION['result']['id_siswa'])) {
    include_once '../Views/Layouts/Templates/Login_dulu.php';
    exit();
}

if (isset($_POST['Logout']))  {
    header("location:../Views/v_home_siswa.php");
    exit;
};

?>