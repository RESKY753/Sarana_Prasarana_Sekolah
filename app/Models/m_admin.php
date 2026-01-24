<?php
include_once 'm_koneksi.php';

class m_admin{
    function login ($username, $password){
        $koneksi = new m_koneksi();
        $query = mysqli_query($koneksi->koneksi, "SELECT * FROM admin WHERE username = '$username'");
        $result = mysqli_fetch_assoc($query);
        
        return $result;
    }
}
?>