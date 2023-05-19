<?php

session_start();
if ($_SESSION['nomor_telepon'] == "klinik") {
	$nomor_telepon = $_POST['nomor_telepon'];
} else {
	$nomor_telepon = $_SESSION['nomor_telepon'];
}
$tanggalReservasi = $_POST['tanggalReservasi'];

$jam = $_POST['jam'];
$keluhan = $_POST['keluhan'];
$nama = $_POST['nama'];

$conn = new mysqli("localhost", "root", "", "dbmagang");

if ($conn->connect_error) {
	$arr = ["result" => "error", "message" => "Error Connect DB"];
} else {
	if ($jam != "") {
		$sql1 = "SELECT id FROM penggunas where nomor_telepon=?";
		$stmt = $conn->prepare($sql1);
		$stmt->bind_param("s", $nomor_telepon);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows > 0) {

			$row = $result->fetch_assoc();

			$sql2 = "SELECT * FROM reservasis where id_pengguna=? and date(tanggal_reservasi)=?";
			$stmt2 = $conn->prepare($sql2);
			$stmt2->bind_param("is", $row["id"], $tanggalReservasi);
			$stmt2->execute();
			$result2 = $stmt2->get_result();

			if ($result2->num_rows > 0) {
				$arr = ["result" => "error", "message" => "Batas melakukan reservasi hanya 1 kali per hari"];
			} else {
				$status = "1";
				$sql = "INSERT into reservasis(tanggal_reservasi,keluhan, id_pengguna, status_reservasi, jam_idjam) VALUES(?,?,?,?,?)";
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
			$sql = "INSERT INTO penggunas(nama,nomor_telepon) values(?,?)";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("ss", $nama, $nomor_telepon);
			$stmt->execute();
			if ($stmt->affected_rows > 0) {

				$sql1 = "SELECT id FROM penggunas where nomor_telepon=?";
				$stmt = $conn->prepare($sql1);
				$stmt->bind_param("s", $nomor_telepon);
				$stmt->execute();
				$result = $stmt->get_result();

				if ($result->num_rows > 0) {

					$row = $result->fetch_assoc();

					$sql2 = "SELECT * FROM reservasis where id_pengguna=? and date(tanggal_reservasi)=?";
					$stmt2 = $conn->prepare($sql2);
					$stmt2->bind_param("is", $row["id"], $tanggalReservasi);
					$stmt2->execute();
					$result2 = $stmt2->get_result();

					if ($result2->num_rows > 0) {
						$arr = ["result" => "error", "message" => "Batas melakukan reservasi hanya 1 kali per hari"];
					} else {
						$status = "1";
						$sql = "INSERT into reservasis(tanggal_reservasi,keluhan, id_pengguna, status_reservasi, jam_idjam) VALUES(?,?,?,?,?)";
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
					$arr = ["result" => "error", "message" => "gagal menemukan pengguna"];
				}
			} else {
				$arr = ["result" => "error", "message" => "gagal mendaftarkan pengguna"];
			}
		}
	} else {
		$arr = ["result" => "error", "message" => "Silahkan pilih hari besok untuk melakukan reservasi"];
	}
}
echo json_encode($arr);
