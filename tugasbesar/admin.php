<?php
session_start();
require 'functions.php';


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$mahasiswa = query("SELECT * FROM mahasiswa");




// pagination
// konfigurasi
// $jumlahDataPerHalaman = 5;
// $jumlahData = count(query("SELECT * FROM mahasiswa"));
// $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
// $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
// $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

// $mahasiswa = query("SELECT FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");

//tombol cari di tekan
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);

}

// $user = query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Administrator</title>

    <link rel="stylesheet" href="assets/css/admin.css">
</head>

<body>

    <h1>Daftar Administrator</h1>


    <a class="tambah" href="tambah.php">Tambah data Admin</a>
    <br>
    <a class="logout" href="logout.php">Logout</a>

    <form action="" method="post">
        <input type="search" name="keyword" placeholder="Cari disini..." size="40" autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="cari">Cari</button>
    </form>

    <br>
   

    <div id="container">
        <table border="1" cellpadding="10" cellspacing="0">


            <tr>
                <th>No.</th>
                <th>Aksi</th>
                <th>Gambar</th>
                <th>NRP</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>

            <?php if (empty($mahasiswa)) : ?>
                <tr>
                    <td colspan="7" align="center">Data Admin tidak di temukan</td>
                </tr>
            <?php endif; ?>

            <?php $i = 1; ?>
            <?php foreach ( $mahasiswa as $row) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td>
                        <a href="ubah.php?id=<?= $row["id"]; 
                                ?>">ubah</a>
                        <a href="hapus.php?id=<?= $row["id"];
                                ?>" onclick="return confirm('yakin?');">hapus</a>
                    </td>
                    <td><img src="assets/img/<?= $row["gambar"]; ?>" width="50"></td>
                    <td><?= $row["nrp"]; ?></td>
                    <td><?= $row["nama"]; ?></td>
                    <td><?= $row["email"]; ?></td>
                    <td><?= $row["jurusan"]; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>






        </table>






</body>

</html>