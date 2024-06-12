<?php
session_start();
require 'functions_user.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$users1 = query("SELECT * FROM users1");

// if (!isset($_SESSION["login"])) {
//     header('location: login.php');
//     exit;
// }

//tombol-cari di tekan
if (isset($_POST["tombol-cari"])) {
    $users1 = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar User</title>

    <!-- My Style -->
    <link rel="stylesheet" href="assets/css/user.css">
</head>

<body>


    <h1>Daftar User</h1>


    <br>

    <form action="" method="post">
        <input type="search" name="keyword" placeholder="Cari disini..." size="40" autocomplete="off" id="keyword" class="keyword" autofocus>
        <button type="submit" name="cari" id="tombol-cari" class="tombol-cari">Cari</button>
    </form>

    <br>

    <img src="./assets/img/spinner.gif" width="30" id="spinner">

    <a class="tambah-user" href="./tambahuser.php">Tambah User</a>

    <a class="logout" href="./logout.php">Logout</a>



    <div class="container">
        <table border="1" cellpadding="10" cellspacing="0">


            <tr>
                <th>No.</th>
                <th>Aksi</th>
                <th>Nama</th>
                <th>Password</th>
            </tr>

            <?php if (empty($users1)) : ?>
                <tr>
                    <td colspan="7" align="center">Data user tidak di temukan</td>
                </tr>
            <?php endif; ?>

            <?php $i = 1; ?>
            <?php foreach ($users1 as $row) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td>
                        <a href="./ubahuser.php?id=<?= $row["id"];
                                                    ?>">ubah</a>
                        <a href="./hapususer.php?id=<?= $row["id"];
                                                    ?>" onclick="return confirm('yakin?');">hapus</a>
                    </td>
                    <td><?= $row["namauser"]; ?></td>
                    <td><?= $row["katasandi"]; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>
    <script src="assets/js/script.js"></script>
</body>

</html>