<?php
if (!isset($_SESSION['result']['id_admin'])) {
  include_once 'Layouts/Templates/template.php';
  exit();
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="../../Assets/dashboard.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/hanzcode1/MyAlert@main/style.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <span class="navbar-brand">Sistem Aspirasi</span>
      <span class="text-white">Admin</span>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">


      <div class="col-md-2 bg-light min-vh-100 p-3">
        <ul class="nav flex-column">
          <li class="nav-item"><a class="nav-link active" href="#">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Data Aspirasi</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Status Penyelesaian</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Umpan Balik</a></li>
          <li class="nav-item"><a class="nav-link" href="../Controllers/c_data_aspirasi_admin.php?histori">Histori Aspirasi</a></li>
          <li class="nav-item">
            <form action="../Controllers/c_logout_admin.php" method="post">
              <a href="../Views/v_logout.php" class="nav-link" name="logout_admin">Logout</a><br>
            </form>
          </li>
        </ul>
      </div>

      <div class="col-md-10 p-4">

        <div class="row mb-4">
          <div class="col-md-3">
            <div class="card text-bg-primary">
              <div class="card-body">
                <h5>Total Aspirasi</h5>
                <p>120</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card text-bg-warning">
              <div class="card-body">
                <h5>Diproses</h5>
                <p>45</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card text-bg-success">
              <div class="card-body">
                <h5>Selesai</h5>
                <p>60</p>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-3">
          <div class="card-header fw-bold d-flex justify-content-between align-items-center">
            <div>
              Filter Data Aspirasi
            </div>

            <div class="dropdown">
              <a class="btn d-flex justify-content-between align-items-center fw-semibold"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                style="background-color:#f1f3f5; min-width:150px;">
                Filter
                <i class="fa-solid fa-chevron-down ms-2"></i>
              </a>

              <form action="">
                <ul class="dropdown-menu mt-1">
                  <li><button name="filter" class="dropdown-item" value="semua">Semua</button></li>
                  <li><button name="filter" class="dropdown-item" value="hari_ini">Hari ini</button></li>
                  <li><button name="filter" class="dropdown-item" value="kemarin">Kemarin</button></li>
                  <li><button name="filter" class="dropdown-item" value="minggu_ini">Minggu Ini</button></li>
                  <li><button name="filter" class="dropdown-item" value="minggu_lalu">Minggu Lalu</button></li>
                  <li><button name="filter" class="dropdown-item" value="bulan_ini">Bulan Ini</button></li>
                  <li><button name="filter" class="dropdown-item" value="bulan_lalu">Bulan Lalu</button></li>
                </ul>
              </form>
            </div>
          </div>


          <div class="card-body">
            <form method="get" class="row g-3 align-items-end">

              <!-- FILTER TANGGAL -->
              <div class="col-md-3">
                <label class="form-label">Dari Tanggal</label>
                <input type="date" name="tgl_awal" class="form-control">
              </div>

              <div class="col-md-3">
                <label class="form-label">Sampai Tanggal</label>
                <input type="date" name="tgl_akhir" class="form-control">
              </div>

              <!-- FILTER BULAN -->
              <div class="col-md-2">
                <label class="form-label">Bulan</label>
                <select name="bulan" class="form-select">
                  <option value="">Semua</option>
                  <option value="01">Januari</option>
                  <option value="02">Februari</option>
                  <option value="03">Maret</option>
                  <!-- dst -->
                </select>
              </div>

              <!-- FILTER KATEGORI -->
              <div class="col-md-2">
                <label class="form-label">Kategori</label>
                <select name="kategori" class="form-select">
                  <option value="">Semua</option>
                  <option value="1">Fasilitas</option>
                  <option value="2">Kebersihan</option>
                </select>
              </div>

              <!-- FILTER SISWA -->
              <div class="col-md-2">
                <label class="form-label">Siswa</label>
                <input
                  type="text"
                  name="siswa"
                  class="form-control"
                  placeholder="Nama / NIS">
              </div>

              <!-- TOMBOL -->
              <div class="col-md-12 text-end">
                <button class="btn btn-primary btn-sm">
                  Terapkan
                </button>
                <a href="v_daftar_aspirasi_admin.php" class="btn btn-secondary btn-sm">
                  Reset
                </a>
              </div>

            </form>
          </div>
        </div>


        <div class="card">
          <div class="card-header fw-bold">
            Daftar Aspirasi Siswa
          </div>
        </div>

        <div class="card-body">
          <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
              <tr>
                <th>Tanggal</th>
                <th>Judul Aspirasi</th>
                <th>Kategori</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th width="120">Aksi</th>
              </tr>
            </thead>
            <?php foreach ($aspirasi_admin as $data) : ?>
              <tbody>
                <tr>
                  <td><?= $data->tanggal_lapor ?></td>
                  <td><?= $data->judul_aspirasi ?></td>
                  <td><?= $data->ket_kategori ?></td>
                  <td><?= $data->lokasi ?></td>
                  <td>
                    <span class="badge bg-warning"><?= $data->status ?></span>
                  </td>
                  <td>
                    <a href="../Controllers/c_data_aspirasi_admin.php?id=<?= $data->id_aspirasi ?>" class="btn btn-sm btn-primary">
                      Lihat
                    </a>
                  </td>
                </tr>
              </tbody>
            <?php endforeach; ?>
          </table>
        </div>
      </div>

</body>
<script src="https://cdn.jsdelivr.net/gh/hanzcode1/MyAlert@main/script.js"></script>

<?php if (isset($_SESSION['alert'])): ?>
  <script>
    MyAlert.show(<?= json_encode($_SESSION['alert']) ?>);
  </script>
<?php unset($_SESSION['alert']);
endif; ?>

</html>