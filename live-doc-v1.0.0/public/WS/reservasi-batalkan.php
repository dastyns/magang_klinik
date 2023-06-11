<?php
session_start();
$idReservasi = $_POST['idReservasi'];
$user = $_SESSION['idPengguna'];

$conn = new mysqli("localhost", "root", "", "dbmagang");

if ($conn->connect_error) {
	$arr = ["result" => "error", "message" => "Error Connect DB"];
} else {
	if ($user != 1 && $user != 2 && $user != 3) {
		$status = "dibatalkan pasien";
		$sql = "UPDATE reservasis SET status_reservasi =? where id=?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("si", $status, $idReservasi);
		$stmt->execute();
		if ($stmt->affected_rows > 0) {
			$arr = ["result" => "success", "message" => "Reservasi berhasil dibatalkan"];
		} else {
			$arr = ["result" => "error", "message" => "Reservasi gagal dibatalkan"];
		}
	}
	else{
		$status = "dibatalkan klinik";
		$sql = "UPDATE reservasis SET status_reservasi =? where id=?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("si", $status, $idReservasi);
		$stmt->execute();
		if ($stmt->affected_rows > 0) {
			$arr = ["result" => "success", "message" => "Reservasi berhasil dibatalkan"];
		} else {
			$arr = ["result" => "error", "message" => "Reservasi gagal dibatalkan"];
		}
	}
}
echo json_encode($arr);
