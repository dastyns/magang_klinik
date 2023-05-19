<?php
function update($con, $id)
{
	$status = '0';
	$sql1 = "UPDATE reservasis SET status_reservasi=? where id=?";
	$stmt1 = $con->prepare($sql1);
	$stmt1->bind_param("si",$status, $id);
	$stmt1->execute();

	if ($stmt1->affected_rows > 0) {
		$arr = ["result" => "success", "message" => "Konsultasi berhasil tersimpan"];
	} else {
		$arr = ["result" => "success", "message" => "Konsultasi gagal tersimpan"];
	}

	return $arr;
}
$idReservasi = $_POST['idReservasi'];
$obat = $_POST['obat'];
$biaya = $_POST['biaya'];
$keterangan = $_POST['keterangan'];
$tanggalbalik = $_POST['tanggalbalik'];
$status = "1";
$jam = $_POST['jam'];
$idPengguna = $_POST['idPengguna'];


$conn = new mysqli("localhost", "root", "", "dbmagang");

if ($conn->connect_error) {
	$arr = ["result" => "error", "message" => "Error Connect DB"];
} else {
	if ($tanggalbalik == "") {
		$sql = "INSERT into konsultasis(keterangan, obat, biaya, status_konsultasi, id_reservasi) VALUES(?,?,?,?,?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ssisi", $keterangan, $obat, $biaya, $status, $idReservasi);
	} else {
		$sql = "INSERT into konsultasis(keterangan, obat, biaya, status_konsultasi, tanggal_balik, id_reservasi) VALUES(?,?,?,?,?,?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ssissi", $keterangan, $obat, $biaya, $status, $tanggalbalik, $idReservasi);
	}
	$stmt->execute();
	if ($stmt->affected_rows > 0) {
		if ($tanggalbalik != "") {
			$status = "1";
			$sql = "INSERT into reservasis(tanggal_reservasi, id_pengguna, status_reservasi, jam_idjam) VALUES(?,?,?,?)";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("siss", $tanggalbalik, $idPengguna, $status, $jam);
			$stmt->execute();
			if ($stmt->affected_rows > 0) {
				$arr = ["result" => "success", "message" => "Reservasi berhasil"];
			} else {
				$arr = ["result" => "error", "message" => "Reservasi gagal"];
			}
			$arr = update($conn, $idReservasi);
		} else {
			$arr = update($conn, $idReservasi);
		}
	} else {
		$arr = ["result" => "error", "message" => "Konsultasi gagal tersimpan"];
	}
}
echo json_encode($arr);
?>