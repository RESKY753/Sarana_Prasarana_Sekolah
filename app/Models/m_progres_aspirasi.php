<?php
include_once 'm_koneksi.php';

class m_progres_aspirasi
{
    function tampil_data()
    {
        $koneksi = new m_koneksi();
        $sql = "SELECT * FROM progres_aspirasi ";
        $query = mysqli_query($koneksi->koneksi, $sql);
        if ($query->num_rows > 0) {
            while ($data = mysqli_fetch_object($query)) {
                $result[] = $data;
            }
            return $result;
        }
    }

    function tampil_data_by_id($id_progres)
    {
        $koneksi = new m_koneksi();
        $sql = "SELECT FROM progres_aspirasi WHERE id_progres = '$id_progres'";
        $query = mysqli_query($koneksi->koneksi, $sql);
        $result = $query;

        return $result;
    }

    function tambah_progres($id_progres, $ket_progres)
    {
        $koneksi = new m_koneksi();
        $sql = "INSERT (id_progres, ket_progres) VALUES ('$id_progres', '$ket_progres') INTO progres_aspirasi";
        $query = mysqli_query($koneksi->koneksi, $sql);
        $result = $query;

        return $result;
    }
}
