<?php 
    include_once("../../../config/koneksi.php");
    include_once("../controller/peminjamanupdate.php");

    $peminjamanController = new PeminjamanController($kon);

    if (isset($_POST['update'])) {
        $idpeminjaman = $_POST['id_peminjaman'];
        $idpengguna = $_POST['id_pengguna'];
        $tanggalpinjam = $_POST['tanggal_pinjam'];
        $tanggalkembali = $_POST['tanggal_kembali'];

        $message = $peminjamanController->updatePeminjaman($idpeminjaman, $idpengguna, $tanggalpinjam, $tanggalkembali);
        echo $message;

        header("Location: ../../dashboard/data/dspeminjaman.php");
    }

    $idpeminjaman = null;
    $idpengguna = null;
    $tanggalpinjam = null;
    $tanggalkembali = null;

    if (isset($_GET['id_peminjaman']) && is_numeric($_GET['id_peminjaman'])) {
        $idpeminjaman = $_GET['id_peminjaman'];
        $result = $peminjamanController->getDataPeminjaman($idpeminjaman);

        if ($result) {
            $idpeminjaman = $result['id_peminjaman'];
            $idpengguna = $result['id_pengguna'];
            $tanggalpinjam = $result['tanggal_pinjam'];
            $tanggalkembali = $result['tanggal_kembali'];
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
    <title>Halaman Update Peminjaman</title>
</head>
<body>
    <h1>Update Data Peminjaman</h1>
    <a href="../../dashboard/data/dspeminjaman.php">Home</a>
    <form action="update.php" name="update" method="post" enctype="multipart/form-data">
        <table border="1">
            <tr>
                <td>ID Peminjaman</td>
                <td><input type="text" name="id_peminjaman" value="<?php echo $idpeminjaman; ?>" readonly></td>
            </tr>
            <tr>
                <td>ID Pengguna</td>
                <td><input type="text" name="id_pengguna" value="<?php echo $idpengguna; ?>"></td>
            </tr>
            <tr>
                <td>Tanggal Pinjam</td>
                <td><input type="date" name="tanggal_pinjam" value="<?php echo $tanggalpinjam; ?>"></td>
            </tr>
            <tr>
                <td>Tanggal Kembali</td>
                <td><input type="date" name="tanggal_kembali" value="<?php echo $tanggalkembali; ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>