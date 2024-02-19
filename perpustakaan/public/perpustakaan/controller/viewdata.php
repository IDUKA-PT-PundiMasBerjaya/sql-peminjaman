<?php 
    include_once("../../../config/koneksi.php");

    class BukuController {
        private $kon;

        public function __construct($connection) {
            $this->kon = $connection;
        }

        public function getBukuData($id) {
            $result = mysqli_query($this->kon, "SELECT * FROM buku WHERE id = '$id'");
            return mysqli_fetch_array($result);
        }
    }

    $perpusController = new BukuController($kon);
    $id = $_GET['id'];
    $bukuData = $perpusController->getBukuData($id);

    if ($bukuData) {
        $id = $bukuData['id'];
        $judul = $bukuData['judul'];
        $penulis = $bukuData['penulis'];
        $keterangan = $bukuData['keterangan'];
        $stok = $bukuData['stok'];
        $gambar = $bukuData['gambar'];
        $mata_pelajaran = $bukuData['matapelajaran_idpelajaran'];
    }
?>