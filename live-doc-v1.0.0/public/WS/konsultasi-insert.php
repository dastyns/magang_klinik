<?php
function updateReservasiInsertDetailPerawatan($con, $id, $daftarPerawatan, $idKonsultasi)
{
	$status = 'selesai';
	$sql1 = "UPDATE reservasis SET status_reservasi=? where id=?";
	$stmt1 = $con->prepare($sql1);
	$stmt1->bind_param("si", $status, $id);
	$stmt1->execute();

	if ($stmt1->affected_rows > 0) {
		foreach($daftarPerawatan as $perawatan){
			$sql2 = "INSERT INTO jenis_perawatan_konsultasi(jenis_perawatan_id, konsultasi_id, harga, posisi_gigi) VALUES(?,?,?,?)";
			$stmt2 = $con->prepare($sql2);
			$stmt2->bind_param('iiis', $perawatan["idPerawatan"], $idKonsultasi, $perawatan["harga"], $perawatan["posisiGigi"]);
			$stmt2->execute();
		}
		$arr = ["result" => "success", "message" => "Konsultasi berhasil tersimpan"];
	} else {
		$arr = ["result" => "success", "message" => "Konsultasi gagal tersimpan"];
	}

	return $arr;
}

$idReservasi = $_POST['idReservasi'];
$obat = $_POST['obat'];
$totalharga = $_POST['totalHarga'];
$keterangan = $_POST['keterangan'];
$idPengguna = $_POST['idPengguna'];
$daftarPerawatan = $_POST['daftarPerawatan'];


$conn = new mysqli("localhost", "root", "", "dbmagang");

if ($conn->connect_error) {
	$arr = ["result" => "error", "message" => "Error Connect DB"];
} else {
	$sql = "INSERT into konsultasis(keterangan, obat, total_harga, reservasi_id) VALUES(?,?,?,?)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ssii", $keterangan, $obat, $totalharga, $idReservasi);

	$stmt->execute();

	if ($stmt->affected_rows > 0) {
		$arr = updateReservasiInsertDetailPerawatan($conn, $idReservasi, $daftarPerawatan, $stmt->insert_id);
	} else {
		$arr = ["result" => "error", "message" => "Konsultasi gagal tersimpan"];
	}
}
echo json_encode($arr);
?>