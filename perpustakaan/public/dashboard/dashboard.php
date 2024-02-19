<?php 
    include_once("../../config/koneksi.php");

    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: ../../login.php");
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
</head>
<body>
    <h2>Halaman utama <?php echo $username; ?>!</h2> 

    | <a href="#"> Balikin Buku </a>|<br><br>

    | <a href="data/dsperpustakaan.php"> Perpustakaan </a>|
    <a href="data/dsguru.php"> Data Guru </a>|
    <a href="data/dssiswa.php"> Data Siswa </a>|
    <a href="data/dskelas.php"> Data Kelas </a>|
    <a href="data/dsmapel.php">Mata Pelajaran </a>|

</body>
<br><br><a href="../../logout.php">| Logout |</a>
</html>