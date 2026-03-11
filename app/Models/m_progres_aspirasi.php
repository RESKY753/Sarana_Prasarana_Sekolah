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

    function tambah_progres($id_aspirasi, $id_admin, $umpan_balik, $status, $ket_progres)
    {
        $koneksi = new m_koneksi();
        $sql = "INSERT INTO progres_aspirasi(id_aspirasi, tanggal_update, id_admin, umpan_balik, status, ket_progres) VALUES (?, NOW(), ?, ?, ?, ?)";
        $stmt = $koneksi->koneksi->prepare($sql);

        $stmt->bind_param(
            "iisss",   // s=string, i=integer
            $id_aspirasi,
            $id_admin,
            $umpan_balik,
            $status, 
            $ket_progres
        );

        return $stmt->execute();
    }

    function update_progres($id_admin,$umpan_balik,$status,$ket_progres,$id_progres)
    {
        $koneksi = new m_koneksi();
        $sql = "UPDATE progres_aspirasi SET tanggal_update= NOW() , id_admin = ? , umpan_balik = ? , status = ? , ket_progres = ? WHERE id_progres = ?";
        $stmt = $koneksi->koneksi->prepare($sql);

        $stmt->bind_param(
            "isssi",
            $id_admin,
            $umpan_balik,
            $status,
            $ket_progres,
            $id_progres
        );

        return $stmt->execute();
    }
    function hitungStatus($status = '')
    {
        $koneksi = new m_koneksi();
        $sql = "
        SELECT
        SUM(status = 'menunggu') AS menunggu,
        SUM(status = 'proses') AS proses,
        SUM(status = 'selesai') AS selesai
        FROM progres_aspirasi
        WHERE ('$status' = '' OR status = '$status')
    ";

        $result = mysqli_query($koneksi->koneksi, $sql);
        return mysqli_fetch_assoc($result);
    }

    function tampil_data_by_id_admin($id_admin){
        $koneksi = new m_koneksi();
        $sql = "SELECT 
                aspirasi.judul_aspirasi,
                aspirasi.tanggal_lapor,
                aspirasi.id_kategori,
                aspirasi.id_aspirasi,
                aspirasi.lokasi,
                aspirasi.ket_aspirasi,
                progres_aspirasi.status,
                progres_aspirasi.ket_progres,
                progres_aspirasi.umpan_balik,
                progres_aspirasi.tanggal_update,
                kategori.ket_kategori
                FROM aspirasi
                LEFT JOIN progres_aspirasi
                ON aspirasi.id_aspirasi = progres_aspirasi.id_aspirasi
                LEFT JOIN kategori
                ON aspirasi.id_kategori = kategori.id_kategori
                WHERE id_admin = $id_admin";
        $query = mysqli_query($koneksi->koneksi, $sql);
        if ($query->num_rows > 0) {
            while ($data = mysqli_fetch_object($query)) {
                $result[] = $data;
            }
            return $result;
        }

    }
}
