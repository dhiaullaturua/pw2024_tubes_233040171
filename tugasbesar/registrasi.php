<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'functions.php';


if (isset($_POST["register"])) {
	if (register($_POST) > 0) {
		echo "<script>
				alert('user baru berhasil ditambahkan, silahkan login!');
				document.location.href = 'login.php';
			  </script>";
	} else {
		echo "<script>
				alert('gagal menambahkan user baru!');
				document.location.href = 'login.php';
			  </script>";
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Registrasi User</title>
	<!-- My Style -->
	<link rel="stylesheet" href="./assets/css/registrasi.css">
</head>

<body>
	<section>
		<h3>REGISTER</h3>
		<form action="" method="post">
			<ul>
				<li>
					<label for="username">Username :</label>
					<input type="text" name="namauser" id="namauser" required>
				</li>
				<li>
					<label for="password">Password :</label>
					<input type="password" name="katasandi" id="katasandi" required>
				</li>
				<li>
					<label for="password2">Konfirmasi Password :</label>
					<input type="password" name="katasandi2" id="katasandi2" required>
				</li>
				<!-- <li>
					<label for="email">Email :</label>
					<input type="text" name="email" id="email" required>
				</li> -->
				<button type="submit" name="register">Register</button>
				<p>Already have an Account? <a href="login.php">Log in</a></p>
			</ul>
		</form>
	</section>

</body>

</html>