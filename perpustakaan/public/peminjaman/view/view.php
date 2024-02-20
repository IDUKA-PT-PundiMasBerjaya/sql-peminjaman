<?php 
    include_once("../../../config/koneksi.php");
    include_once("../controller/viewdata.php");

    $peminjamanController = new PeminjamanController($kon);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data Peminjaman</title>
</head>
<body>
    <a href="../../dashboard/data/dspeminjaman.php">Home</a><br><br>
    <form action="view.php" method="post" name="update_data">
        <table border="0">
            <tr>
                <td>ID Peminjaman</td>
                <td>: </td>
                <td><?php echo $id; ?></td>
            </tr>
            <tr>
                <td>ID Pengguna</td>
                <td>: </td>
                <td><?php echo $idpengguna; ?></td>
            </tr>
            <tr>
                <td>Tanggal Pinjam</td>
                <td>: </td>
                <td><?php echo $tanggalpinjam; ?></td>
            </tr>
            <tr>
                <td>Tanggal Kembali</td>
                <td>: </td>
                <td><?php echo $tanggalkembali; ?></td>
            </tr>
        </table>
    </form>
</body>
</html>