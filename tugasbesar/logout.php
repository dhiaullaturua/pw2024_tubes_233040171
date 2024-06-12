<?php 
session_start();
$_SESSION = [];
session_unset(); 
session_destroy();

// hapus cookie
setcookie('id', '', time() - 3600);
setcookie('hash', '', time() - 3600);

header("Location: login.php");
exit;
?>