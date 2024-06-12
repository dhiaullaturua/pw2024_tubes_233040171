<?php
session_start();
require 'functions.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);


// cek koneksi ke database
if (!$koneksi) {
	die("Koneksi database gagal: " . mysqli_connect_error());
}


// cek cookie 
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil username berdasarkan id
	$result = mysqli_query($koneksi, "SELECT namauser FROM users1 WHERE id = $id");
	if ($result) {
		$row = mysqli_fetch_assoc($result);

		// cek cookie dan username
		if ($key === hash('sha256', $row['namauser'])) {
			$_SESSION['login'] = true;
		}
	}
}


// jika sudah login, langsung ke php
// if (isset($_SESSION["login"])) {
// 	header("Location: index.php	");
// 	exit;
// }

// if (isset($_SESSION['role']) ) {
//     header("Location: admin.php");
//     exit();
// }

// ketika from disubmit
if (isset($_POST["login"])) {

	$namauser = $_POST["namauser"];
	$katasandi = $_POST["katasandi"];

	$result = mysqli_query($koneksi, "SELECT * FROM users1 WHERE namauser = '$namauser'");

	// cek username
	if (mysqli_num_rows($result) === 1) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		if (password_verify($katasandi, $row["katasandi"])) {
			// set session
			$_SESSION["login"] = true;
			if ($row['id_role'] == 1) {
                header("Location: admin.php");
                exit;
            } else {
                header("Location: index.php");
                exit;
            }

			// cek remember me
			if (isset($_POST['remember'])) {
				// buat cookie
				setcookie('id', $row['id'], time() + 60);
				setcookie('key', hash('sha256', $row['namauser']), time() + 60);
			}

			header("Location: index.php");
			exit;
		} else {
			$error = "Pasword Salah!";
		}
	} else {
		$error = "Ussername Tidak Ditemukan";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Halaman Login</title>
	<!-- My Style -->
	<link rel="stylesheet" href="assets/css/login.css">

</head>

<body>
	<section>
		<h3>LOG IN</h3>
		<?php if (isset($error)) : ?>
			<p style="color: white; font-style: italic;">username / password salah!</p>
		<?php endif; ?>
		<form action="" method="post">
			<ul>
				<li>
					<label for="username">Username :</label>
					<input type="text" name="namauser" id="namauser" autofocus>
				</li>
				<li>
					<label for="password">Password :</label>
					<input type="password" name="katasandi" id="katasandi">
				</li>
				<li>
					<input type="checkbox" name="remember" id="remember">
					<label for="remember">Remember Me</label>
				</li>
			</ul>
			<button type="submit" name="login">Login</button>
			<p>Don't have an Account?<a href="registrasi.php">Register</a></p>
		</form>
	</section>
</body>

</html>