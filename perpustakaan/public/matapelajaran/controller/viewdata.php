<?php 
    include_once("../../../config/koneksi.php");

    class MapelController {
        private $kon;

        public function __construct($connection) {
            $this->kon = $connection;
        }

        public function getMapelData($id) {
            $result = mysqli_query($this->kon, "SELECT * FROM matapelajaran WHERE id = '$id'");
            return mysqli_fetch_array($result);
        }
    }

    $kelasController = new MapelController($kon);
    $id = $_GET['id'];
    $mapelData = $kelasController->getMapelData($id);

    if ($mapelData) {
        $id = $mapelData['id'];
        $namapelajaran = $mapelData['namapelajaran'];
        $namaguru = $mapelData['namaguru'];
    }
?>