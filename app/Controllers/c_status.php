<?php
// include_once '../Models/m_progres_aspirasi.php';
include_once __DIR__ . '/../Models/m_progres_aspirasi.php';

$progres = new m_progres_aspirasi();
$status = ''; // kosong = semua status

$totalstatus = $progres->hitungStatus($status);
?>