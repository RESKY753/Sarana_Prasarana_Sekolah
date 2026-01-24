<?php
include_once 'm_koneksi.php';

class m_kategori
{

    function tampil_kategori()
    {

        $koneksi = new m_koneksi();
        $hasil = "";

        $sql = "SELECT id_kategori, ket_kategori FROM kategori";
        $result = mysqli_query($koneksi->koneksi, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $hasil .= "<option value='" . $row['id_kategori'] . "'>" . $row['ket_kategori'] . "</option>";
        }

        return $hasil;
    }
}
