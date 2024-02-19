<?php 
    include_once("../../../config/koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kelas</title>
</head>
<body>
    <form action="dskelas.php" method="get">
        <label>Cari: </label>
        <input type="text" name="cari">
        <input type="submit" name="Cari">
    </form>
    <?php 
        if (isset($_GET['cari'])) {
            $cari = $_GET['cari'];
        }
    ?>
    <table border="1">
        <h1>Data Kelas</h1>
        <a href="../../kelas/view/tambah.php">| Tambah Data |</a>
        <a href="../../kelas/view/cetak.php" target="_blank"> Cetak |</a>
        <a href="../dashboard.php"> Home |</a><br><br>
            <?php 
                if (isset($_GET['cari'])) {
                    $cari = $_GET['cari'];
                    $ambildata = mysqli_query($kon, "SELECT * FROM kelas WHERE id LIKE '%".$cari."%' OR judul LIKE '%".$cari."%' OR penulis LIKE '%".$cari."%'");
                } else {
                    $ambildata = mysqli_query($kon, "SELECT * FROM kelas ORDER BY 'id' ASC");
                    $num = mysqli_num_rows($ambildata);
                }
            ?>
        <tr>
            <th>No</th>
            <th>Nama Kelas</th>
            <th>Wali kelas</th>
            <th>Ketua Kelas</th>
            <th>Kursi</th>
            <th>Meja</th>
            <th>Gambar Kelas</th>
            <th>Aksi</th>
        </tr>   
        <?php 
            while ($userAmbilData = mysqli_fetch_array($ambildata)) {
                echo "<tr>";
                echo "<td>" . $id = $userAmbilData['id'] . "</td>";
                echo "<td>" . $namakelas = $userAmbilData['namakelas'] . "</td>";
                echo "<td>" . $walikelas = $userAmbilData['walikelas'] . "</td>";
                echo "<td>" . $ketuakelas = $userAmbilData['ketuakelas'] . "</td>";
                echo "<td>" . $kursi = $userAmbilData['kursi'] . "</td>";
                echo "<td>" . $meja = $userAmbilData['meja'] . "</td>";
                echo "<td>" . $gambar_kelas = $userAmbilData['gambar_kelas'] . "</td>";

                echo "<td> 
                    | <a href='../../kelas/view/update.php?id=" .$userAmbilData['id']. "'>Edit</a> |
                    <a href='../../kelas/view/view.php?id=" .$userAmbilData['id']. "'>View</a> |
                    <a href='../../kelas/controller/kelashapus.php?id=" .$userAmbilData['id']. "'>Hapus</a> |
                    </td>";
                    
            }
        ?>
</body>
</html>