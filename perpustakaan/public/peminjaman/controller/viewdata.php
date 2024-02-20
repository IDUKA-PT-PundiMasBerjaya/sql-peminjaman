<?php 
    include_once("../../../config/koneksi.php");

    class PeminjamanController {
        private $kon;

        public function __construct($connection) {
            $this->kon = $connection;
        }

        public function getPeminjamanData($id) {
            $result = mysqli_query($this->kon, "SELECT * FROM peminjaman WHERE id_peminjaman = '$id'");
            return mysqli_fetch_array($result);
        }
    }

    $perpusController = new PeminjamanController($kon);
    $id = $_GET['id_peminjaman'];
    $peminjamanData = $perpusController->getPeminjamanData($id);

    if ($peminjamanData) {
        $id = $peminjamanData['id_peminjaman'];
        $idpengguna = $peminjamanData['id_pengguna'];
        $tanggalpinjam = $peminjamanData['tanggal_pinjam'];
        $tanggalkembali = $peminjamanData['tanggal_kembali'];
    }
?>