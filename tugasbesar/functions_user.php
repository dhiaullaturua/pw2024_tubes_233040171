<?php
// Koneksi ke Database
$koneksi = mysqli_connect("localhost", "root", "", "pw2024_tubes_233040171");

function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function cari($keyword)
{
    $query = "SELECT * FROM users1
                WHERE 
                namauser LIKE '%$keyword%' OR
                katasandi LIKE '%$keyword%'
                ";
    return query($query);
}

//hapus data dari tiap elemen dalam form
function hapus($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM users1 WHERE id = '$id'");

    return mysqli_affected_rows($koneksi);
}

//ambil data dari tiap elemen dalam form
function tambah($data)
{
    global $koneksi;

    $namauser = htmlspecialchars($data["namauser"] );
    $katasandi = htmlspecialchars($data["katasandi"] );

    $query = "INSERT INTO users1 
                VALUES
                (null, '$namauser', '$katasandi')
                ";
    mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

    return mysqli_affected_rows($koneksi);
}

function ubah($data)
{
    global $koneksi;

    $id = $data["id"];
    $namauser = htmlspecialchars($data["namauser"]);
    $katasandi = htmlspecialchars($data["katasandi"]);

    $query = "UPDATE users1 SET
                namauser = '$namauser',
                katasandi = '$katasandi',
            WHERE id = '$id'
            ";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

?>