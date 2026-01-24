<?php
session_start();

if (isset($_POST['Logout']))  {
    header("location:../Views/_home_siswa.php");
    exit;
}
?>