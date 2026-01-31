<?php
session_start();
include_once '../Models/m_admin.php';

$username = $_POST['username'];
$password = $_POST['password'];

$admin = new m_admin();

try {
    if (isset($_POST['login_admin'])) {
        $result = $admin->login($username, $password);
        if ($result) {
            if ($password == $result['password']) {
                $_SESSION['username'] = $result['username'];
                $_SESSION['result'] = $result;
                $_SESSION['alert'] = [
                'type'    => 'success', // jenis alert (success, error, warning, info)
                'title'   => 'Berhasil', // judul alert
                'message' => 'Login Berhasil', // isi pesan alert
                'icon' => 'success', // isi pesan alert
                'autoClose' => 4000,
                ];
                header("location:../Views/v_home_admin.php");
                exit;
            }else{
                $_SESSION['alert'] = [
                    'type'    => 'error', // jenis alert (success, error, warning, info)
                    'title'   => 'Error', // judul alert
                    'message' => 'Kata sandi atau password salah!', // isi pesan alert
                    'autoClose' => 4000, 
                ];
                header("location:../Views/v_login.php");
                exit;
            }
        }else{
            $_SESSION['alert'] = [
                'type'    => 'error', // jenis alert (success, error, warning, info)
                'title'   => 'Error', // judul alert
                'message' => 'Kata sandi atau password anda salah!', // isi pesan alert
                'autoClose' => 4000,
            ];
            header("location:../Views/v_login.php");
            exit;
        }
    }
} catch (Exception $te) {
    echo $te->getMessage();
}

?>