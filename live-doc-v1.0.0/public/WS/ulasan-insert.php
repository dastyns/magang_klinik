<?php

$idKonsul = $_POST['idKonsul'];
$ulasan = $_POST['ulasan'];


$conn = new mysqli("localhost", "root", "", "dbmagang");

if ($conn->connect_error) {
	$arr = ["result" => "error", "message" => "Error Connect DB"];
} else {
	$sql = "INSERT into ulasans(ulasan, konsultasi_id) VALUES(?,?)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("si", $ulasan, $idKonsul);
	$stmt->execute();
	if ($stmt->affected_rows > 0) {
		$arr = ["result" => "success", "message" => "Ulasan berhasil tersimpan"];
	} else {
		$arr = ["result" => "error", "message" => "Ulasan gagal tersimpan"];
	}
}
echo json_encode($arr);
