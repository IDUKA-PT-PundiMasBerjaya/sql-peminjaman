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
    <a href="data/dsperpustakaan.php">| Perpustakaan |</a>
    <a href="#">Data Guru |</a>
    <a href="#">Data Siswa |</a>

</body>
<br><br><a href="../../logout.php">| Logout |</a>
</html>