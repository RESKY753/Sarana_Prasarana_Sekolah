<?php
session_start();
include_once '../Models/m_siswa.php';

$nis = $_POST['nis'];
$password = $_POST['password'];

$siswa = new m_siswa();

try {
    if (isset($_POST['login_siswa'])) {
        $result = $siswa->login($nis, $password);
        if ($result) {
            if ($password == $result['password']) {
                
                $_SESSION['id_siswa'] = $result['id_siswa'];
                $_SESSION['nis'] = $result['nis'];
                $_SESSION['result'] = $result;
                $_SESSION['alert'] = [
                'type'    => 'success', // jenis alert (success, error, warning, info)
                'title'   => 'Berhasil', // judul alert
                'message' => 'Login Berhasil', // isi pesan alert
                'icon' => 'success', // isi pesan alert
                'autoClose' => 4000,
                ];
                header("location:../Views/v_home_siswa.php");
                exit;
            }else{
                $_SESSION['alert'] = [
                    'type'    => 'error', // jenis alert (success, error, warning, info)
                    'title'   => 'Error', // judul alert
                    'message' => 'Kata sandi atau password salah!', // isi pesan alert
                    'autoClose' => 4000,
                ];
                header("location:../Views/v_login_siswa.php");
                exit;
            }
        }else{
            $_SESSION['alert'] = [
                'type'    => 'error', // jenis alert (success, error, warning, info)
                'title'   => 'Error', // judul alert
                'message' => 'Kata sandi atau password anda salah!', // isi pesan alert
                'autoClose' => 4000,
            ];
            header("location:../Views/v_login_siswa.php");
            exit;
        }
    }
} catch (Exception $te) {
    echo $te->getMessage();
}

?>