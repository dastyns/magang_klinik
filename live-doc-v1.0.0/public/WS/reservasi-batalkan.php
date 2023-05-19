<?php

$idReservasi = $_POST['idReservasi'];


$conn = new mysqli("localhost", "root", "", "dbmagang");

if ($conn->connect_error) {
	$arr = ["result" => "error", "message" => "Error Connect DB"];
} else {
	$sql = "DELETE FROM reservasis where id=?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $idReservasi);
	$stmt->execute();
	if ($stmt->affected_rows > 0) {
		$arr = ["result" => "success", "message" => "Reservasi berhasil dibatalkan"];
	} else {
		$arr = ["result" => "error", "message" => "Reservasi gagal dibatalkan"];
	}
}
echo json_encode($arr);
?>