<?php 
    include_once("../../../config/koneksi.php");

    class BukuController {
        private $kon;

        public function __construct($connection) {
            $this->kon = $connection;
        }
        public function tambahBuku(){
            $setAuto = mysqli_query($this->kon, "SELECT MAX(id_buku) AS max_id FROM buku");
            $result = mysqli_fetch_assoc($setAuto);
            $max_id = $result['max_id'];

            if (is_numeric($max_id)) {
                $nounik = $max_id + 1;
            } else {
                $nounik = 1;
            } return $nounik;
        }

        public function tambahDataBuku($data) {
            $id = $data['id_buku'];
            $judul = $data['judul'];
            $penulis = $data['penulis'];
            $keterangan = $data['keterangan'];
            $stok = $data['stok'];
            $matapelajaran = $data['matapelajaran_idpelajaran'];

        }
    }
?>