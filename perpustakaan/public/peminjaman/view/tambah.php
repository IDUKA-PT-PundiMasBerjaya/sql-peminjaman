<?php 
    include_once("../../../config/koneksi.php");
    include_once("../controller/peminjamantambah.php");

    $peminjamanController = new PeminjamanController($kon);

    if (isset($_POST['submit'])) {
        $idpeminjaman = $peminjamanController->tambahPeminjaman();

        $data = [
            'id_peminjaman' => $idpeminjaman,
            'id_pengguna' => $_POST['id_pengguna'],
            'tanggal_pinjam' => $_POST['tanggal_pinjam'],
            'tanggal_kembali' => $_POST['tanggal_kembali']
        ];

        $message = $peminjamanController->tambahDataPeminjaman($data);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Peminjaman</title>
</head>
<body>
    <h1>Tambah Data Nilai</h1>
    <a href="../../dashboard/data/dspeminjaman.php">Home</a>
    <form action="tambah.php" method="POST" name="tambah" enctype="multipart/form-data">
        <table border="1">
            <tr>
                <td>ID Peminjaman</td>
                <td><input type="text" name="idpeminjaman" value="<?php echo($peminjamanController->tambahPeminjaman()) ?>" readonly"></td>
            </tr>
            <tr>
                <td>ID Pengguna</td>
                <td><input type="text" name="id_pengguna" required></td>
            </tr>
            <tr>
                <td>Tanggal Pinjam</td>
                <td><input type="date" name="tanggal_pinjam" required></td>
            </tr>
            <tr>
                <td>Tanggal Kembali</td>
                <td><input type="date" name="tanggal_kembali" required></td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Tambah Data">
        <?php if (isset($message)): ?>
            <div class="success-message">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
    </form>
</body>
</html>