<?php
require 'functions.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if 'id' is set in the URL
// if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
//     echo "<script>
//             alert('ID tidak ditemukan!');
//             document.location.href = 'admin.php';
//           </script>";
//     exit;
// }

$id = $_GET['id'];

if (hapus($id) > 0) {
    echo "
        <script>
            alert('data berhasil dihapus!');
            document.location.href = 'admin.php';
        </script>
        ";
} else {
    echo "
        <script>
            alert('data gagal dihapus!');
            document.location.href = 'admin.php';
        </script>";
}


