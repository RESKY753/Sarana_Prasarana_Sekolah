<?php
session_start();

if (isset($_POST['Logout']))  {
    header("location:../Views/v_home_siswa.php");
    exit;
}else if(isset($_POST['Logout_admin'])){
    header("location:../Views/v_home_admin.php");
    exit;
}
?>