<?php
date_default_timezone_set('Asia/Jakarta');

class m_koneksi{
    private $host = "localhost",
            $username = "root",
            $password = "",
            $db = "pengaduan_sarana_sekolah";

    public $koneksi;
    function __construct()
    {
       $this->koneksi =
        mysqli_connect(
            $this->host,
            $this->username,
            $this->password,
            $this->db
        );
        if ($this->koneksi) {
            // echo "Koneksi ke database " . $this->db . " berhasil";      
            return $this->koneksi;      
        }else{
            die("Koneksi ke database gagal !" . mysqli_connect_error());
        }
    }
}
// $koneksi = new m_koneksi();
?>