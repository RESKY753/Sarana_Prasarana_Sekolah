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

    function tambah_progres($id_aspirasi, $tanggal_update, $id_admin, $umpan_balik, $status, $ket_progres)
    {
        $koneksi = new m_koneksi();
        $sql = "INSERT (id_aspirasi, tanggal_update, id_admin, umpan_balik, status, ket_progres) VALUES ('$id_aspirasi', '$tanggal_update', '$id_admin', '$umpan_balik', '$status', '$ket_progres') INTO progres_aspirasi";
        $query = mysqli_query($koneksi->koneksi, $sql);
        $result = $query;

        return $result;
    }

    function update_progres($id_aspirasi, $tanggal_update, $id_admin, $umpan_balik, $status, $ket_progres, $id_progres){
        $koneksi = new m_koneksi();
        $sql = "UPDATE progres_aspirasi SET id_aspirasi='$id_aspirasi', tanggal_update='$tanggal_update',id_admin='$id_admin',umpan_balik='$umpan_balik',status='$status',ket_progres='$ket_progres' WHERE id_progres = '$id_progres'";
        $query = mysqli_query($koneksi->koneksi, $sql);
        $result = $query;

        return $result;
    }
}
