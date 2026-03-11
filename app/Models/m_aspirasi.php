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
                a.id_aspirasi,
                a.judul_aspirasi,
                a.tanggal_lapor,
                a.lokasi,
                p.status,
                k.ket_kategori
                FROM aspirasi a
                LEFT JOIN progres_aspirasi p
                ON a.id_aspirasi = p.id_aspirasi
                LEFT JOIN kategori k
                ON a.id_kategori = k.id_kategori";

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
                progres_aspirasi.id_progres,
                progres_aspirasi.status,
                progres_aspirasi.tanggal_update,
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

    function tampil_data_by_id_siswa($id_siswa)
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
                WHERE id_siswa = $id_siswa";
        $query = mysqli_query($koneksi->koneksi, $sql);
        if ($query->num_rows > 0) {
            while ($data = mysqli_fetch_object($query)) {
                $result[] = $data;
            }
            return $result;
        }
    }
    function TampilDataByTanggal($filter)
    {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // variabel untuk menampung kondisi WHERE
        $where = "";

        // menentukan filter berdasarkan pilihan user
        switch ($filter) {

            // tampilkan semua data (tanpa filter tanggal)
            case 'semua':
                $where = "";
                break;
                
            // data yang dibuat hari ini
            case 'hari_ini':
                $where = "WHERE a.tanggal_lapor >= CURDATE()
                      AND a.tanggal_lapor < CURDATE() + INTERVAL 1 DAY";
                break;

            // data yang dibuat kemarin
            case 'kemarin':
                $where = "WHERE a.tanggal_lapor >= CURDATE() - INTERVAL 1 DAY
                      AND a.tanggal_lapor < CURDATE()";
                break;

            // data dari awal minggu (senin) sampai hari ini
            case 'minggu_ini':
                $where = "WHERE a.tanggal_lapor >= DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY)
                      AND a.tanggal_lapor < CURDATE() + INTERVAL 1 DAY";
                break;
        }

        // query untuk mengambil data aspirasi beserta status dan kategori
        $sql = "SELECT
                a.id_aspirasi,
                a.judul_aspirasi,
                a.tanggal_lapor,
                a.lokasi,
                p.status,
                k.ket_kategori
            FROM aspirasi a
            LEFT JOIN progres_aspirasi p ON a.id_aspirasi = p.id_aspirasi
            LEFT JOIN kategori k ON a.id_kategori = k.id_kategori
            $where
            ORDER BY a.tanggal_lapor DESC";

        // menjalankan query ke database
        $query = mysqli_query($koneksi->koneksi, $sql);

        // menyiapkan array hasil data
        $result = [];

        // jika query berhasil dan datanya ada
        if ($query && mysqli_num_rows($query) > 0) {
            // ambil data satu per satu dalam bentuk object
            while ($row = mysqli_fetch_object($query)) {
                $result[] = $row;
            }
        }

        // mengembalikan data dalam bentuk array
        return $result;
    }
    function TampilDataHistoriByTanggal($filter, $id_siswa)
    {
        // Membuat koneksi ke database menggunakan class m_koneksi
        $koneksi = new m_koneksi();

        // Jika id_siswa kosong (misal session gagal), langsung kembalikan array kosong
        // Ini mencegah query error atau mengambil data siswa lain
        if (empty($id_siswa)) {
            return [];
        }

        // Buat array untuk menampung kondisi WHERE SQL
        $where = [];

        // Selalu filter berdasarkan id_siswa, agar hanya data milik siswa yang login
        $where[] = "a.id_siswa = " . intval($id_siswa);

        // Menentukan filter tanggal berdasarkan pilihan user
        switch ($filter) {
            case 'hari_ini':
                // Ambil data yang tanggal_lapor-nya sama dengan hari ini
                $where[] = "a.tanggal_lapor >= CURDATE() AND a.tanggal_lapor < CURDATE() + INTERVAL 1 DAY";
                break;
            case 'kemarin':
                // Ambil data yang tanggal_lapor-nya kemarin
                $where[] = "a.tanggal_lapor >= CURDATE() - INTERVAL 1 DAY AND a.tanggal_lapor < CURDATE()";
                break;
            case 'minggu_ini':
                // Ambil data dari awal minggu (Senin) sampai hari ini
                $where[] = "a.tanggal_lapor >= DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY) AND a.tanggal_lapor < CURDATE() + INTERVAL 1 DAY";
                break;
            case 'bulan_ini':
                // Ambil data dari awal bulan sampai sekarang
                $where[] = "MONTH(a.tanggal_lapor) = MONTH(CURDATE()) AND YEAR(a.tanggal_lapor) = YEAR(CURDATE())";
                break;
            case 'semua':
            default:
                // Tidak perlu filter tanggal, ambil semua aspirasi siswa
                break;
        }

        // Gabungkan semua kondisi WHERE menjadi satu string untuk SQL
        // Misal: "WHERE a.id_siswa = 6 AND a.tanggal_lapor >= CURDATE()"
        $where_sql = 'WHERE ' . implode(' AND ', $where);

        // Buat query utama untuk mengambil data aspirasi
        // LEFT JOIN progres_aspirasi dan kategori supaya tetap muncul walau belum ada progres/kategori
        $sql = "SELECT 
                a.judul_aspirasi,
                a.tanggal_lapor,
                a.id_kategori,
                a.lokasi,
                a.ket_aspirasi,
                p.status,
                p.ket_progres,
                p.umpan_balik,
                k.ket_kategori
            FROM aspirasi a
            LEFT JOIN progres_aspirasi p ON a.id_aspirasi = p.id_aspirasi
            LEFT JOIN kategori k ON a.id_kategori = k.id_kategori
            $where_sql
            ORDER BY a.tanggal_lapor DESC"; // Urut dari terbaru

        // Jalankan query ke database
        $query = mysqli_query($koneksi->koneksi, $sql);

        // Siapkan array untuk menampung hasil data
        $result = [];

        // Jika query berhasil dan ada data, ambil satu per satu
        if ($query && mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_object($query)) {
                $result[] = $row; // Masukkan setiap baris data sebagai object ke array hasil
            }
        }

        // Kembalikan hasil data sebagai array object
        return $result;
    }
}
