<?php
require 'functions.php';


// Check if 'id' is set in the URL
if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    echo "<script>
            alert('ID tidak ditemukan!');
            document.location.href = 'admin.php';
          </script>";
    exit;
}

// ambil data dari URL
$id = $_GET["id"];

// query data mahasiswa dari id
$mhs = query("SELECT * FROM mahasiswa WHERE id = '$id'")[0];

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["ubah"])) {

	// cek apakah data berhasil diubah atau tidak
	if (ubah($_POST) > 0) {
		echo "<script>
                        alert('data berhasil diubah!');
                        document.location.href = 'admin.php';
                    </script>
					";
	} else {
		echo "<script>
                        alert('data gagal diubah!');
                        document.location.href = 'admin.php';
            </script>
			";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Ubah Data Mahasiswa</title>
	<!-- My style -->
	<link rel="stylesheet" href="assets/css/ubah.css">
</head>

<body>
	<h1>Ubah Data Mahasiswa</h1>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $mhs['id']; ?>">
		<input type="hidden" name="gambarLama" value="<?= $mhs['gambar']; ?>">
		<ul>
			<li>
				<label for="nrp">NRP : </label>
				<input type="text" name="nrp" id="nrp" required
				value="<?= $mhs["nrp"]; ?>">
			</li>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" required
				value="<?= $mhs["nama"]; ?>">
			</li>
			<li>
				<label for="email">Email : </label>
				<input type="email" name="email" id="email" required
				value="<?= $mhs["email"]; ?>">
			</li>
			<li>
				<label for="Jurusan">Jurusan : </label>
				<input type="text" name="jurusan" id="jurusan" required
				value="<?= $mhs["jurusan"]; ?>">
			</li>
			<li>
				<label for="gambar">Gambar : </label>
				<img src="assets/img/<?= $mhs['gambar']; ?>" width="60" >
				<input type="file" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="ubah">Ubah Data!</button>
			</li>
		</ul>
	</form>
</body>

</html>