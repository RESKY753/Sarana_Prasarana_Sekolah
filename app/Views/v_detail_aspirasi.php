<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Deatail aspirasi</title>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="p-3 m-0 border-0 bd-example m-0 border-0">
    <!-- Example Code Start-->
    <div class="card" style="width:30rem;">
        <div class="card-header text-center">
            <?= $aspirasi_->judul_aspirasi ?>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item ">
                <p>Kategori:<br><?= $aspirasi_->ket_kategori ?></p>
                <p>Lokasi:<br><?= $aspirasi_->lokasi ?></p>
                <p><?= $aspirasi_->status ?></p>
                <p>Keterangan aspirasi:<br><?= $aspirasi_->ket_aspirasi ?></p>
            </li>
            <li class="list-group-item">Umpan balik:<br><?= $aspirasi_->umpan_balik ?></li>
            <li class="list-group-item">Tanggal lapor:<br><?= $aspirasi_->tanggal_lapor ?></li>
        </ul>
    </div>
    <!-- Example Code End -->
</body>

</html>