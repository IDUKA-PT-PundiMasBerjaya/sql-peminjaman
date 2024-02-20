<?php 
    include_once("../../../config/koneksi.php");

    class PeminjamanController {
        private $kon;

        public function __construct($connection) {
            $this->kon = $connection;
        }

        public function tambahPeminjaman() {
            $setAuto = mysqli_query($this->kon, "SELECT MAX(id_peminjaman) AS max_id FROM peminjaman");
            $result = mysqli_fetch_assoc($setAuto);
            $max_id = $result['max_id'];

            if (is_numeric($max_id)) {
                $nounik = $max_id + 1;
            } else {
                $nounik = 1;
            } return $nounik;
        }

        public function tambahDataPeminjaman($data) {
            $idpeminjaman = $data['id_peminjaman'];
            $idpengguna = $data['id_pengguna'];
            $tanggalpinjam = $data['tanggal_pinjam'];
            $tanggalkembali = $data['tanggal_kembali'];

            $insertData = mysqli_query($this->kon, "INSERT INTO peminjaman(id_peminjaman, id_pengguna, tanggal_pinjam, tanggal_kembali) VALUES ('$idpeminjaman', '$idpengguna', '$tanggalpinjam', '$tanggalkembali')");
            
            if ($insertData) {
                return "Data berhasil disimpan.";
            } else {
                return "Gagal menyimpan data.";
            }
        }
    }
?>