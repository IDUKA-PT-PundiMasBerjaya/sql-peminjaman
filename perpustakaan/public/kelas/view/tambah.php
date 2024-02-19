<?php 
    include_once("../../../config/koneksi.php");
    include_once("../controller/kelastambah.php");

    $kelasController = new KelasController($kon);

    if (isset($_POST['submit'])) {
        $id = $kelasController->tambahKelas();

        $data = [
            'id' => $id,
            'namakelas' => $_POST['namakelas'],
            'walikelas' => $_POST['walikelas'],
            'ketuakelas' => $_POST['ketuakelas'],
            'kursi' => $_POST['kursi'],
            'meja' => $_POST['meja'],
        ];

        $message = $kelasController->tambahDataKelas($data);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Data Kelas</title>
</head>
<body>
    <h1>Tambah Data Kelas</h1>
    <a href="../../dashboard/data/dskelas.php">Home</a>
    <form action="tambah.php" method="POST" name="tambah" enctype="multipart/form-data">
        <table border="1">
            <tr>
                <td>ID Kelas</td>
                <td><input type="text" name="id" value="<?php echo($kelasController->tambahKelas())?>" readonly"></td>
            </tr>
            <tr>
                <td>Nama Kelas</td>
                <td><input type="text" name="namakelas" required></td>
            </tr>
            <tr>
                <td>Wali Kelas</td>
                <td><input type="text" name="walikelas" required></td>
            </tr>
            <tr>
                <td>Ketua Kelas</td>
                <td><input type="text" name="ketuakelas" required></td>
            </tr>
            <tr>
                <td>Kursi</td>
                <td><input type="text" name="kursi" required></td>
            </tr>
            <tr>
                <td>Meja</td>
                <td><input type="text" name="meja" required></td>
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