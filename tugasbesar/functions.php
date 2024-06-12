<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "pw2024_tubes_233040171");

error_reporting(E_ALL);
ini_set('display_errors', 1);

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

// Check if the user is an admin
// function checkAdmin()
// {
//     if ($_SESSION['role'] !== 'admin') {
//         $_SESSION['alert'] = "Access denied. Admins only.";
//         header("Location: admin.php");
//         exit();
//     }
// }

function cari($keyword)
{
    $query = "SELECT * FROM mahasiswa
                WHERE 
                nama LIKE '%$keyword%' OR
                nrp LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%'
                ";
    return query($query);
}

//hapus data dari tiap elemen dalam form
function hapus($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = '$id'");

    return mysqli_affected_rows($koneksi);
}

//ambil data dari tiap elemen dalam form
function tambah($data)
{
    global $koneksi;

    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    // upload gambar
    $gambar = upload();
    if ( !$gambar ) {
        return false;
    }

    $query = "INSERT INTO mahasiswa
                VALUES
                (null, '$nrp', '$nama', '$email', '$jurusan', '$gambar')
                ";
    mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

    return mysqli_affected_rows($koneksi);
}

function upload() {
    
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if( $error === 4 ) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
                </script>";
            return false;
    }

    // cek apakah yang di upload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
            alert('yang anda upload bukan gambar!');
            </script>";
        return false;
    }

    

    // cek jika ukurannya terlalu besar
    if( $ukuranFile > 5000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar!');
                </script>";
            return false;
    }

    // lolos pengecekan, gambar siap di upload
    
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);


    return $namaFileBaru;

    
}


function ubah($data)
{
    global $koneksi;

    $id = $data["id"];
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

   // cek apakah user pilih gambar baru atau tidak
   if( $_FILES['gambar']['error'] === 4) {
    $gambar = $gambarLama;
   } else {
        $gambar = upload();
   }

    $query = "UPDATE mahasiswa SET
                nrp = '$nrp',
                nama = '$nama',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
            WHERE id = '$id'
            ";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


function register($data)
{
    global $koneksi;

    $namauser = strtolower(stripslashes($data["namauser"]));
    $katasandi = mysqli_real_escape_string($koneksi, $data["katasandi"]);
    $katasandi2 = mysqli_real_escape_string($koneksi, $data["katasandi2"]);
    $id_role = 2;
    // $email = htmlspecialchars($_POST["email"]);

    // cek username sudah pernah ada atau belum
    $result = mysqli_query($koneksi, "SELECT namauser FROM users1 WHERE namauser = '$namauser'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                    alert('username sudah terpakai!');
                    </script>";
        return false;
    }


    // cek konfirmasi password
    if ($katasandi !== $katasandi2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai!');
                </script>";
        return false;
    }

    // enkripsi password
    $katasandi_hashed = password_hash($katasandi, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    $query = ("INSERT INTO users1 (namauser, katasandi, id_role) VALUES ('$namauser', '$katasandi_hashed', '$id_role')");

    if (mysqli_query($koneksi, $query)) {
        return mysqli_affected_rows($koneksi);
    } else {
        echo "<script>
                    alert('Registrasi Gagal:')
                    </script>";
        return false;
    }
}



// mysqli_query($koneksi, "INSERT INTO users1 VALUES('$namauser', '$katasandi', '$id_role')");

// insert ke DB
//     mysqli_query($koneksi, "INSERT INTO users1 VALUES(null, '$namauser', '$katasandi', '$id_role')");

//     return mysqli_affected_rows($koneksi);
// }}
