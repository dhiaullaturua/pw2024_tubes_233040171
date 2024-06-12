<?php
require 'functions_user.php';


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
$usr = query("SELECT * FROM users1 WHERE id = '$id'")[0];

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["ubah"])) {

	// cek apakah data berhasil diubah atau tidak
	if (ubah($_POST) > 0) {
		echo "<script>
                        alert('data berhasil diubah!');
                        document.location.href = 'user.php';
                    </script>
					";
	} else {
		echo "<script>
                        alert('data gagal diubah!');
                        document.location.href = 'user.php';
            </script>
			";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Ubah Data User</title>
	<!-- My Style -->
	<link rel="stylesheet" href="assets/css/ubah.css">
</head>

<body>
	<h1>Ubah Data User</h1>
	<form action="" method="post">
		<input type="hidden" name="id" value="<?= $usr['id']; ?>">
		<ul>
			<li>
				<label for="namauser">Username : </label>
				<input type="text" name="namauser" id="namauser" required
				value="<?= $usr["namauser"]; ?>">
			</li>
			<li>
				<label for="katasandi">Password : </label>
				<input type="password" name="katasandi" id="katasandi" required
				value="<?= $usr["katasandi"]; ?>">
			</li>
			<li>
				<button type="submit" name="ubah">Ubah Data!</button>
			</li>
		</ul>
	</form>
</body>

</html>