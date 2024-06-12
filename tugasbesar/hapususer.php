<?php
require 'functions_user.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$id = $_GET['id'];

if (hapus($id) > 0) {
    echo "
        <script>
            alert('data berhasil dihapus!');
            document.loacation.href = 'user.php';
        </script>
        ";
} else {
    echo "
        <script>
            alert('data gagal dihapus!');
            document.loacation.href = 'user.php';
        </script>";
}


