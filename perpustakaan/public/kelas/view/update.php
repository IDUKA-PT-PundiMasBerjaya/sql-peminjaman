<?php 
    include_once("../../../config/koneksi.php");
    include_once("../controller/kelasupdate.php");

    $kelasController = new KelasController($kon);

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $namakelas = $_POST['namakelas'];
        $walikelas = $_POST['walikelas'];
        $ketuakelas = $_POST['ketuakelas'];
        $kursi = $_POST['kursi'];
        $meja = $_POST['meja'];

        $message = $kelasController->updateKelas($id, $namakelas, $walikelas, $ketuakelas, $kursi, $meja);
        echo $message;

        header("Location: ../../dashboard/data/dskelas.php");
    }

    $id = null;
    $namakelas = null;
    $walikelas = null;
    $ketuakelas = null;
    $kursi = null;
    $meja = null;

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $result = $kelasController->getDataKelas($id);

        if ($result) {
            $id = $result['id'];
            $namakelas = $result['namakelas'];
            $walikelas = $result['walikelas'];
            $ketuakelas = $result['ketuakelas'];
            $kursi = $result['kursi'];
            $meja = $result['meja'];
        } else {
            echo "ID Tidak Valid";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Update Kelas</title>
</head>
<body>
    <h1>Update Data kelas</h1>
    <a href="../../dashboard/data/dskelas.php">Home</a>
    <form action="update.php" method="POST", name="update" enctype="multipart/form-data">
        <table border="1">
            <tr>
                <td>ID</td>
                <td><input type="text" name="id" value="<?php echo $id; ?>" readonly"></td>
            </tr>
            <tr>
                <td>Nama Kelas</td>
                <td><input type="text" name="namakelas" value="<?php echo $namakelas; ?>""></td>
            </tr>
            <tr>
                <td>Wali Kelas</td>
                <td><input type="text" name="walikelas" value="<?php echo $walikelas; ?>"></td>
            </tr>
            <tr>
                <td>Ketua Kelas</td>
                <td><input type="text" name="ketuakelas" value="<?php echo $ketuakelas; ?>"</td>
            </tr>
            <tr>
                <td>Kursi</td>
                <td><input type="text" name="kursi" value="<?php echo $kursi; ?>"</td>
            </tr>
            <tr>
                <td>Meja</td>
                <td><input type="text" name="meja" value="<?php echo $meja; ?>"</td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>