<?php 
    include_once("../../../config/koneksi.php");

    class PeminjamanController {
        private $kon;

        public function __construct($connection) {
            $this->kon = $connection;
        }

        public function updatePeminjaman($idpeminjaman, $idpengguna, $tanggalpinjam, $tanggalkembali) {
            $result = mysqli_query($this->kon, "UPDATE peminjaman SET id_peminjaman = '$idpeminjaman', id_pengguna = '$idpengguna', tanggal_pinjam = '$tanggalpinjam', tanggal_kembali = '$tanggalkembali' WHERE id_peminjaman = '$idpeminjaman'");

            if($result) {
                return "Sukses meng-update data.";
            } else {
                return "Gagal meng-update data.";
            }
        }

        public function getDataPeminjaman($idpeminjaman) {
            $sql = "SELECT * FROM peminjaman WHERE id_peminjaman = '$idpeminjaman'";
            $ambildata = $this->kon->query($sql);

            if ($result = mysqli_fetch_array($ambildata)) {
                return $result;
            } else {
                return null;
            }
        }
    }
?>