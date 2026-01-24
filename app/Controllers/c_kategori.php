<?php
include_once '../Models/m_kategori.php' ;

$kategori = new m_kategori();
$kategoris = $kategori->tampil_kategori();
?>