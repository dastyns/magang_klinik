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
		$id1 = 127;
		$id2 = 128;
		$arrHari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
		$namaHari = $arrHari[date("w", $curdate)];
		$namaHariSemua = "Semua";
		$status = "aktif";
		if ($user == "klinik") {
			$sql = "SELECT * from jams
					where id not in (select jam_id 
					from reservasis
					where tanggal_reservasi = ? and status_reservasi='baru')  and dokter_id = ? and hari in (?,?) and status=?";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("sisss", $tanggalReservasi, $dokter, $namaHari, $namaHariSemua, $status);
		} else {
			$sql = "SELECT * from jams
					where id not in (select jam_id
					from reservasis
					where tanggal_reservasi = ? and status_reservasi='baru') and id != ? and id != ? and dokter_id = ? and hari=? and status=?";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("siiiss", $tanggalReservasi, $id1, $id2, $dokter, $namaHari, $status);
		}
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