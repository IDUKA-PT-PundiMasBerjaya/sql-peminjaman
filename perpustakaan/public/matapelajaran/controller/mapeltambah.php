<?php 
    include_once("../../../config/koneksi.php");

    class MapelController {
        private $kon;

        public function __construct($connection) {
            $this->kon = $connection;
        }

        public function tambahMapel() {
            $setAuto = mysqli_query($this->kon, "SELECT MAX(idpelajaran) AS max_id FROM matapelajaran");
            $result = mysqli_fetch_assoc($setAuto);
            $max_id = $result['max_id'];

            if (is_numeric($max_id)) {
                $nounik = $max_id + 1;
            } else {
                $nounik = 1;
            } return $nounik;
        }

        public function tambahDataMapel($data) {
            $id = $data['idpelajaran'];
            $namapelajaran = $data['namapelajaran'];
            $namaguru = $data['namaguru'];

            $insertData = mysqli_query($this->kon, "INSERT INTO matapelajaran(idpelajaran, namapelajaran, namaguru) VALUES ('$id', '$namapelajaran', '$namaguru')");

            if ($insertData) {
                return "Data berhassil disimpan";
            } else {
                return "Gagal menyimpan data";
            }
        }
    }
?>