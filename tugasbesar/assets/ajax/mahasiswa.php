<?php
require "../../functions_user.php";
$users1 = cari($_GET['keyword']);

// $keyword = $_GET["keyword"];

// $query = "SELECT * FROM users1
//             WHERE 
//             namauser LIKE '%$keyword%' OR
//             katasandi LIKE '%$keyword%'
//             ";
// $users1 = query($query);
?>

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