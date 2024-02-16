<?php 
    include_once("../../../config/koneksi.php");
    include_once("../controller/mapeltambah.php");

    $mapelController = new MapelController($kon);

    if (isset($_POST['submit'])) {
        $id = $mapelController->tambahMapel();

        $data = [
            'idpelajaran' => $id,
            'namapelajaran' => $_POST['namapelajaran'],
            'namaguru' => $_POST['namaguru'],
        ];

        $message = $mapelController->tambahDataMapel($data);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Pelajaran</title>
</head>
<body>
    <h1>Tambah Mata Pelajaran</h1>
    <a href="../../dashboard/data/dsmapel.php">Home</a>
    <form action="tambah.php" method="post" name="tambah" enctype="multipart/form-data">
        <table border="1">
            <tr>
                <td>ID</td>
                <td><input type="text" name="id" value="<?php echo($mapelController->tambahMapel())?>" readonly></td>
            </tr>
            <tr>
                <td>Mata Pelajaran</td>
                <td><input type="text" name="namapelajaran" required></td>
            </tr>
            <tr>
                <td>ID Guru</td>
                <td>
                    <select name="namaguru">
                        <option value="" disabled selected>Silahkan Pilih</option>
                            <?php 
                                $result = mysqli_query($kon, "SELECT idguru, nama FROM guru");
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if ($row['nama'] != $selectedGuru) {
                                        echo "<option value='" . $row['idguru'] . "'>" . $row['idguru'] . "</option>";
                                    }
                                }
                            ?>
                    </select>
                </td>
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