<?php

session_start();
date_default_timezone_set("Asia/Jakarta");

header("Access-Control-Allow-Origin: *");
error_reporting(E_ERROR | E_PARSE);
clearstatcache();
$conn = new mysqli("localhost", "root", "", "dbmagang");


$tanggalReservasi = $_POST['tanggalReservasi'];
$user = $_POST['user'];
$tanggalRes = strtotime($tanggalReservasi);
$curdate = strtotime(date('Y-m-d'));
$dokter = $_POST['dokter'];

if ($tanggalRes < $curdate) {
	echo "warning";
} else {
	$arr = null;
	if ($conn->connect_error) {
		$arr = ["result" => "error", "message" => "Error Connect DB"];
	} else {
		$id1 = 19;
		$id2 = 20;
		if ($user == "klinik") {
			$sql = "SELECT * from jams
					where id not in (select jam_id 
					from reservasis
					where tanggal_reservasi = ?) and dokter_id = " . $dokter;
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("si", $tanggalReservasi, $dokter);
		} else {
			$sql = "SELECT * from jams
					where id not in (select jam_id
					from reservasis
					where tanggal_reservasi = ?) and id != ? and id != ? and dokter_id = ?";
		}
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("siii", $tanggalReservasi, $id1, $id2, $dokter);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows > 0) {
			$curhour = date("H.i");
			if ($curdate == $tanggalRes) {
				while ($row = $result->fetch_assoc()) {
					if (strtotime($row["jam"]) >= strtotime($curhour) || $row['jam'] == "lainnya") {
						echo "<option value='" . $row["id"] . "'>" . $row["jam"] . "</option>";
					}
				}
			} else {
				while ($row = $result->fetch_assoc()) {
					echo "<option value='" . $row["id"] . "'>" . $row["jam"] . "</option>";
				}
			}
		}
	}
}
