<?php 
    include_once("../../../config/koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
</head>
<body>
    <form action="dsperpustakaan.php" method="get">
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
        <h1>Data Buku Perpustakaan</h1>
        <a href="#">| Tambah Buku |</a>
        <a href="#"> Cetak |</a>
        <a href="../dashboard.php"> Home |</a><br><br>
            <?php 
                if (isset($_GET['cari'])) {
                    $cari = $_GET['cari'];
                    $ambildata = "SELECT * FROM buku WHERE judul LIKE '%".$cari."%' OR penulis LIKE '%".$cari."%'";
                } else {
                    $ambildata = mysqli_query($kon, "SELECT * FROM buku ORDER BY 'id_buku' ASC");
                    $num = mysqli_num_rows($ambildata);
                }
            ?>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Keterangan</th>
            <th>Stok</th>
            <th>Gambar</th>
            <th>Mata pelajaran</th>
            <th>Aksi</th>
        </tr>   
        <?php 
            while ($userAmbilData = mysqli_fetch_array($ambildata)) {
                echo "<tr>";
                echo "<td>" . $id = $userAmbilData['id_buku'] . "</td>";
                echo "<td>" . $judul = $userAmbilData['judul'] . "</td>";
                echo "<td>" . $penulis = $userAmbilData['penulis'] . "</td>";
                echo "<td>" . $keterangan = $userAmbilData['keterangan'] . "</td>";
                echo "<td>" . $stok = $userAmbilData['stok'] . "</td>";
                echo "<td>" . $gambar = $userAmbilData['gambar'] . "</td>";
                echo "<td>" . $mata_pelajaran = $userAmbilData['matapelajaran_idpelajaran'] . "</td>";

                echo "<td> 
                    | <a href='../../perpustakaan/view/pinjam.php?id_buku=" .$userAmbilData['id_buku']. "'>Pinjam Buku</a> | 
                    <a href='../../perpustakaan/view/view.php?id_buku=" .$userAmbilData['id_buku']. "'>View</a> |
                    <a href='../../perpustakaan/controller/bukuhapus.php?id_buku=" .$userAmbilData['id_buku']. "'>Hapus</a> |
                
                    </td>";
                    
            }
        ?>
</body>
</html>