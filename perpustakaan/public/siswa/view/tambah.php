<?php 
    include_once("../../../config/koneksi.php");
    include_once("../controller/siswatambah.php");

    $siswaController = new SiswaController($kon);

    if (isset($_POST['submit'])) {
        $id = $siswaController->tambahSiswa();

        $data = [
            'idsiswa' => $id,
            'nama' => $_POST['nama'],
            'alamat' => $_POST['alamat'],
            'email' => $_POST['email'],
            'no_hp' => $_POST['no_hp'],
            'id_user' => $_POST['id_user']
        ];

        $message = $siswaController->tambahDataSiswa($data);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tambah Data Siswa</title>
</head>
<body>
    <h1>Tambah Data Siswa</h1>
    <a href="../../dashboard/data/dssiswa.php">Home</a>
    <form action="tambah.php" method="post" name="tambah" enctype="multipart/form-data">
        <table border="1">
            <tr>
                <td> ID </td>
                <td><input type="text" name="id" value="<?php echo($siswaController->tambahSiswa())?>" readonly"></td>
            </tr>
            <tr>
                <td> Nama Siswa </td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td> Alamat </td>
                <td><input type="text" name="alamat" required></td>
            </tr>
            <tr>
                <td> Email </td>
                <td><input type="text" name="email" required></td>
            </tr>
            <tr>
                <td> No. HP </td>
                <td><input type="text" name="no_hp" required></td>
            </tr>
            <tr>
                <td> ID User </td>
                <td>
                    <select name="id_user">
                        <option value="" disabled selected>Silahkan Pilih</option>
                            <?php 
                                $result = mysqli_query($kon, "SELECT id, username FROM users");
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if ($row['username'] != $selectedGuru) {
                                        echo "<option value='" . $row['username'] . "'>" . $row['username'] . "</option>";
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
                <?php echo $message;?>
            </div>
        <?php endif; ?>
    </form>
</body>
</html>