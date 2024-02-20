<?php  
	include_once("../../../config/koneksi.php");
	require("../../../library/fpdf.php");

	$pdf = new FPDF('L', 'mm', 'A4');
	$pdf->AddPage();

	$pdf->SetFont('Times', 'B', 13);
	$pdf->Cell(0, 15, '', 0, 1);
	$pdf->Cell(250, 10, 'Data Peminjaman', 0, 0, 'R');

	$pdf->Cell(10, 17, '', 0, 1);	
	$pdf->SetFont('Times', 'B', 9);
	$pdf->Cell(10, 7, 'NO', 1, 0, 'C');
	$pdf->Cell(30, 7, 'ID Peminjaman', 1, 0, 'C');
	$pdf->Cell(30, 7, 'ID Pengguna', 1, 0, 'C');
	$pdf->Cell(50, 7, 'Tanggal Peminjaman', 1, 0, 'C');
    $pdf->Cell(50, 7, 'Tanggal Pengembalian', 1, 0, 'C');

	$pdf->Cell(10, 7, '', 0, 1);
	$pdf->SetFont('Times', '', 10);

	$no = 1;
	$data = mysqli_query($kon, "SELECT * FROM peminjaman ORDER BY id_peminjaman ASC");

	while ($d = mysqli_fetch_array($data)) {
		$pdf->Cell(10, 6, $no++, 1, 0, 'C');
		$pdf->Cell(30, 6, $d['id_peminjaman'], 1, 0, 'C');
		$pdf->Cell(30, 6, $d['id_pengguna'], 1, 0, 'C');
		$pdf->Cell(50, 6, $d['tanggal_pinjam'], 1, 0, 'C');
        $pdf->Cell(50, 6, $d['tanggal_kembali'], 1, 1, 'C');
	}

	$pdf->Output();
?>