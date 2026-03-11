<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Hapus session tapi jangan tampilkan halaman logout
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found - Pengaduan Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #f1f3f5, #e9ecef);
            color: #212529;
        }

        .error-container {
            text-align: center;
            background-color: #fff;
            border-radius: 12px;
            padding: 3rem 2rem;
            max-width: 500px;
            width: 90%;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid #dee2e6;
        }

        .error-code {
            font-size: 6rem;
            font-weight: 900;
            color: #dc3545;
            /* warna badge merah seperti Bootstrap */
            margin: 0;
        }

        .error-message {
            font-size: 1.5rem;
            font-weight: bold;
            margin: 1rem 0;
        }

        .error-description {
            font-size: 1rem;
            margin-bottom: 2rem;
            color: #495057;
            line-height: 1.5;
        }

        .btn-home {
            font-size: 1rem;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            background-color: #0d6efd;
            /* warna primary Bootstrap */
            color: #fff;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-home:hover {
            background-color: #0b5ed7;
            transform: translateY(-2px);
        }

        /* CSS-only illustration (tiga lingkaran bouncing) */
        .css-illustration {
            display: flex;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        .circle {
            width: 40px;
            height: 40px;
            background: #0d6efd;
            border-radius: 50%;
            margin: 0 5px;
            animation: bounce 1.5s infinite alternate;
        }

        .circle:nth-child(2) {
            animation-delay: 0.2s;
        }

        .circle:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes bounce {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-15px);
            }
        }

        @media (max-width: 576px) {
            .error-code {
                font-size: 4rem;
            }

            .error-message {
                font-size: 1.2rem;
            }
        }
    </style>
</head>

<body>
    <div class="error-container">
        <!-- CSS-only illustration -->
        <div class="css-illustration">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
        </div>

        <h1 class="error-code">401</h1>
        <div class="error-message">Halaman Tidak Ditemukan</div>
        <div class="error-description">
            Maaf, halaman ini di akses jika anda sudah login.<br>
            Silakan kembali ke halaman utama dan login.
        </div>
        <a href="../../index.php" class="btn btn-home">Kembali ke Beranda</a>
    </div>
</body>

</html>