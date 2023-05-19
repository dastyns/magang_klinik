<?php

session_start();

$nomor_telepon = $_SESSION['email'];
$tanggalReservasi = $_POST['tanggalReservasi'];
$jam = $_POST['jam'];
$keluhan = $_POST['keluhan'];

$conn = new mysqli("localhost", "root", "", "dbmagang");

if ($conn->connect_error) {
	$arr = ["result" => "error", "message" => "Error Connect DB"];
} else {
	if ($jam != "") {
		$sql1 = "SELECT id FROM penggunas where email=?";
		$stmt = $conn->prepare($sql1);
		$stmt->bind_param("s", $nomor_telepon);
		$stmt->execute();
		$result = $stmt->get_result();



		if ($result->num_rows > 0) {

			$row = $result->fetch_assoc();
			$curdate = date('Y-m-d');

			$sql2 = "SELECT * FROM reservasis where pengguna_id=? and date(tanggal_reservasi)=?";
			$stmt2 = $conn->prepare($sql2);
			$stmt2->bind_param("is", $row["id"], $curdate);
			$stmt2->execute();
			$result2 = $stmt2->get_result();

			if ($result2->num_rows > 0) {
				$arr = ["result" => "error", "message" => "Batas melakukan reservasi hanya 1 kali per hari"];
			} else {
				$status = "1";
				$sql = "INSERT into reservasis(tanggal_reservasi,keluhan, pengguna_id, status_reservasi, jam_id) VALUES(?,?,?,?,?)";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param("ssiss", $tanggalReservasi, $keluhan, $row["id"], $status, $jam);
				$stmt->execute();
				if ($stmt->affected_rows > 0) {
					$arr = ["result" => "success", "message" => "Reservasi berhasil"];
				} else {
					$arr = ["result" => "error", "message" => "Reservasi gagal"];
				}
			}
		} else {
			$arr = ["result" => "error", "message" => "Email yang digunakan tidak terdaftar"];
		}
	} else {
		$arr = ["result" => "error", "message" => "Silahkan pilih hari besok untuk melakukan reservasi"];
	}
}
echo json_encode($arr);
