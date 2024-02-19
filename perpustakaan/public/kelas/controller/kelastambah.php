<?php 
    include_once("../../../config/koneksi.php");

    class KelasController {
        private $kon;

        public function __construct($connection) {
            $this->kon = $connection;
        }

        public function tambahKelas() {
            $setAuto = mysqli_query($this->kon, "SELECT MAX(id) AS max_id FROM kelas");
            $result = mysqli_fetch_assoc($setAuto);
            $max_id = $result['max_id'];

            if (is_numeric($max_id)) {
                $nounik = $max_id + 1;
            } else {
                $nounik = 1;
            } return $nounik;
        }

        public function tambahDataKelas($data) {
            $id = $data['id'];
            $namakelas = $data['namakelas'];
            $walikelas = $data['walikelas'];
            $ketuakelas = $data['ketuakelas'];
            $kursi = $data['kursi'];
            $meja = $data['meja'];

            $insertData = mysqli_query($this->kon, "INSERT INTO kelas(id, namakelas, walikelas, ketuakelas, kursi, meja) VALUES ('$id', '$namakelas', '$walikelas', '$ketuakelas', '$kursi', '$meja')");

			if ($insertData) {
				return "Data berhasil disimpan.";
			} else {
				return "Gagal menyimpan data.";
			}
        }
    }
?>