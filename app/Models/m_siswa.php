<?php
include_once 'm_koneksi.php';

class m_siswa
{
    function login($nis, $password)
    {
        $koneksi = new m_koneksi();

        $query = mysqli_query(
            $koneksi->koneksi,
            "SELECT id_siswa, nis, password
         FROM siswa
         WHERE nis = '$nis'"
        );

        return mysqli_fetch_assoc($query);
    }
}
