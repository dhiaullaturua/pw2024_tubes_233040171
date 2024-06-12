<?php
require 'functions_user.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    //ambil data dari tiap elemen dalam form
    $namauser = $_POST["namauser"];
    $katasandi = $_POST["katasandi"];
    

    //cek apakah data berhasil di tambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('Data berhasil ditambahkan!');
            document.loacation.href = 'user.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal ditambahkan!');
        document.loacation.href = 'user.php';
    </script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data User</title>
    <link rel="stylesheet" href="assets/css/tambahuser.css">
</head>

<body>
    <h1>Tambah Data User</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="namauser">Username :</label>
                <input type="text" name="namauser" id="namauser" required>
            </li>
            <li>
                <label for="katasandi">Password :</label>
                <input type="password" name="katasandi" id="katasandi" required>
            </li>
            <li>
                <button type="submit" name="submit">Submit</button>
            </li>

        </ul>
    </form>



</body>

</html>