<?php
require 'functions.php';


error_reporting(E_ALL);
ini_set('display_errors', 1);
// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    //ambil data dari tiap elemen dalam form
    $nrp = $_POST["nrp"];
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $jurusan = $_POST["jurusan"];
    $gambar = $_FILES['gambar']['name'];

        if (tambah($_POST) > 0) {
            echo "
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'admin.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Data gagal ditambahkan!');
                document.location.href = 'admin.php';
            </script>";
        }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data pelanggan</title>
    <link rel="stylesheet" href="assets/css/tambah.css">
</head>

<body>

    <h1>Tambah Data Pelanggan</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nrp">NRP :</label>
                <input type="text" name="nrp" id="nrp" required>
            </li>
            <li>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" required>
            </li>
            <li>
                <label for="jurusan">Jurusan :</label>
                <input type="text" name="jurusan" id="jurusan" required>
            </li>
            <li>
                <label for="gambar">Gambar :</label>
                <input type="file" name="gambar" id="gambar" accept="assets/img/" required>
            </li>
            <li>
                <button type="submit" name="submit">Submit</button>
            </li>

        </ul>
    </form>



</body>

</html>