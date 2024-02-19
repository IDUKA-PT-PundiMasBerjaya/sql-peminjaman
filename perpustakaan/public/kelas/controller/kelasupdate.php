<?php  
	include_once("../../../config/koneksi.php");
 
	class KelasController {
		private $kon;

		public function __construct($connection) {
			$this->kon = $connection;
		}

		public function updateKelas($id, $namakelas, $walikelas, $ketuakelas, $kursi, $meja) {
			$result = mysqli_query($this->kon, "UPDATE kelas SET namakelas = '$namakelas', walikelas = '$walikelas', ketuakelas = '$ketuakelas', kursi = '$kursi', meja = '$meja' WHERE id = '$id'");

			if ($result) {
				return "Sukses meng-update data.";
			} else {
				return "Gagal meng-update data.";
			}
		}

		public function getDataKelas($id) {
			$sql = "SELECT * FROM kelas WHERE id = '$id'";
			$ambildata = $this->kon->query($sql);

			if ($result = mysqli_fetch_array($ambildata)) {
				return $result;
			} else {
				return null;
			}
		}
	}
	
?>