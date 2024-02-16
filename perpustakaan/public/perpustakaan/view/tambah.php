<?php 
    include_once("../../../config/koneksi.php");
    include_once("../controller/bukutambah.php");

    $bukuController = new BukuController($kon);

    if (isset($_POST['submit'])) {
        $id = $bukuController->tambahBuku();

        $data = [
            'id_buku' => $id,
            'judul' => $_POST['judul'],
            'penulis' => $_POST['penulis'],
            'keterangan' => $_POST['keterangan'],
            'stok' => $_POST['stok'],
            'matapelajaran_idpelajaran' => $_POST['matapelajaran_idpelajaran'],
        ];

        $message = $bukuController->tambahDataBuku($data);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tambah Buku</title>
</head>
<body>
    <h1>Tambah Data Buku</h1>
    <a href="../../dashboard/data/dsperpustakaan.php">| Home |</a>
    <form action="tambah.php" method="post" name="tambah" enctype="multipart/form-data">
        <table border="1">
            <tr>
                <td>No ID</td>
                <td><input type="text" name="id" value="<?php echo($bukuController->tambahBuku())?>" readonly></td>
            </tr>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judul" required></td>
            </tr>
            <tr>
                <td>Penulis</td>
                <td><input type="text" name="penulis" required></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td><input type="text" name="keterangan" required></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><input type="text" name="stok" required></td>
            </tr>
            <tr>
                <td>Mata pelajaran</td>
                <td>
                    <select name="matapelajaran_idpelajaran">
                        <option value="" disabled selected>Silahkan Pilih</option>
                            <?php 
                                $result = mysqli_query($kon, "SELECT idpelajaran, namapelajaran FROM matapelajaran");
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if ($row['namapelajaran'] != $selectedPelajaran) {
                                        echo "<option value='" . $row['idpelajaran'] . "'>" . $row['idpelajaran'] . "</option>";
                                    }
                                }
                            ?>
                    </select>
                </td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Tambah Data">
        <?php if (isset($message)): ?>
            <div class="sucess-message">
                <?php echo($message) ?>
            </div>
        <?php endif; ?>
    </form>
</body>
</html>