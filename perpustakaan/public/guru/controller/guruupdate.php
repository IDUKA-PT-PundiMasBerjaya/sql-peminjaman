<?php 
    include_once("../../../config/koneksi.php");

    class GuruController {
        private $kon;

        public function __construct($connection) {
            $this->kon = $connection;
        }

        public function updateGuru($id, $nama, $alamat, $email, $no_hp) {
            $result = mysqli_query($this->kon, "UPDATE guru SET id = '$id', nama = '$nama', alamat = '$alamat', email = '$email', no_hp = '$no_hp' WHERE id = '$id'");

            if ($result) {
                return "Data Berhasil";
            } else {
                return "Data Gagal Diubah";
            }
        }

        public function getDataGuru($id) {
            $sql = "SELECT * FROM guru WHERE id = '$id'";
            $ambilData = $this->kon->query($sql);
            
            if ($result = mysqli_fetch_array($ambilData)) {
                return $result;
            } else {
                return null;
            }
        } 
    }
?>