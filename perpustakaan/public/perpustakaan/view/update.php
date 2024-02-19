<?php 
    include_once("../../../config/koneksi.php");
    include_once("../controller/bukuupdate.php");

    $bukuController = new BukuController($kon);

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $penulis = $_POST['penulis'];
        $keterangan = $_POST['keterangan'];
        $stok = $_POST['stok'];

        $message = $bukuController->updateBuku($id, $judul, $penulis, $keterangan, $stok);
        echo $message;

        header("Location: ../../dashboard/data/dsperpustakaan.php");
    }

    $id = null;
    $judul = null;
    $penulis = null;
    $keterangan = null;
    $stok = null;

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $result = $bukuController->getDataBuku($id);

        if ($result) {
            $id = $result['id'];
            $judul = $result['judul'];
            $penulis = $result['penulis'];
            $keterangan = $result['keterangan'];
            $stok = $result['stok'];
        } else {
            echo "ID tidak ditemukan.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Update Buku</title>
</head>
<body>
    <h1>Update Data Buku</h1>
    <a href="../../dashboard/data/dsperpustakaan.php">Home</a>
    <form action="update.php" name="update" method="post" enctype="multipart/form-data">
        <table border="1">
            <tr>
                <td>ID</td>
                <td><input type="text" name="id" value="<?php echo $id; ?>" readonly></td>
            </tr>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judul" value="<?php echo $judul; ?>"></td>
            </tr>
            <tr>
                <td>Penulis</td>
                <td><input type="text" name="penulis" value="<?php echo $penulis; ?>"></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td><input type="text" name="keterangan" value="<?php echo $keterangan; ?>"></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><input type="text" name="stok" value="<?php echo $stok; ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>