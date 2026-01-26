<?php
include_once 'm_koneksi.php';
class m_aspirasi
{
    function tambah_aspirasi($id_siswa, $judul_aspirasi, $ket_aspirasi, $id_kategori, $lokasi)
    {
        $koneksi = new m_koneksi();
        $sql = "INSERT INTO aspirasi (id_siswa,judul_aspirasi, ket_aspirasi, id_kategori, lokasi) VALUES ('$id_siswa', '$judul_aspirasi','$ket_aspirasi','$id_kategori','$lokasi')";
        $query = mysqli_query($koneksi->koneksi, $sql);
        $result = $query;
        return $result;
    }

    function tampil_data()
    {
        $koneksi = new m_koneksi();
        $sql = "SELECT 
                aspirasi.id_aspirasi,
                aspirasi.judul_aspirasi,
                aspirasi.tanggal_lapor,
                progres_aspirasi.status
                FROM aspirasi
                LEFT JOIN progres_aspirasi
                ON aspirasi.id_aspirasi = progres_aspirasi.id_aspirasi";

        $query = mysqli_query($koneksi->koneksi, $sql);
        if ($query->num_rows > 0) {
            while ($data = mysqli_fetch_object($query)) {
                $result[] = $data;
            }
            return $result;
        }
    }
    function tampil_data_by_id($id)
    {
        $koneksi = new m_koneksi();
        $sql = "SELECT 
                aspirasi.judul_aspirasi,
                aspirasi.tanggal_lapor,
                aspirasi.id_kategori,
                aspirasi.lokasi,
                aspirasi.ket_aspirasi,
                progres_aspirasi.status,
                progres_aspirasi.ket_progres,
                progres_aspirasi.umpan_balik,
                kategori.ket_kategori
                FROM aspirasi
                LEFT JOIN progres_aspirasi
                ON aspirasi.id_aspirasi = progres_aspirasi.id_aspirasi
                LEFT JOIN kategori
                ON aspirasi.id_kategori = kategori.id_kategori
                WHERE aspirasi.id_aspirasi = $id";
        $query = mysqli_query($koneksi->koneksi, $sql);
        return mysqli_fetch_object($query);
    }

    function tampil_data_by_id_siswa($id_siswa){
        $koneksi = new m_koneksi();
        $sql = "SELECT 
                aspirasi.judul_aspirasi,
                aspirasi.tanggal_lapor,
                aspirasi.id_kategori,
                aspirasi.lokasi,
                aspirasi.ket_aspirasi,
                progres_aspirasi.status,
                progres_aspirasi.ket_progres,
                progres_aspirasi.umpan_balik,
                kategori.ket_kategori
                FROM aspirasi
                LEFT JOIN progres_aspirasi
                ON aspirasi.id_aspirasi = progres_aspirasi.id_aspirasi
                LEFT JOIN kategori
                ON aspirasi.id_kategori = kategori.id_kategori
                WHERE id_siswa = $id_siswa";
        $query = mysqli_query($koneksi->koneksi, $sql);
        if ($query->num_rows > 0) {
            while ($data = mysqli_fetch_object($query)) {
                $result[] = $data;
            }
            return $result;
        }
        
    }
}
