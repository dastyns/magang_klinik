<?php
$conn = new mysqli("localhost", "root", "", "dbmagang");
if ($conn->connect_error) {
	$arr = ["result" => "error", "message" => "Error Connect DB"];
} else {
	extract($_POST);
	$sql = "SELECT * FROM jams where dokter_id=? and hari!='semua'";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $idDokter);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows > 0) {
		while ($r = $result->fetch_assoc()) {
			foreach ($slot as $sb) {
				if ($sb['hari'] == $r['hari'] && $sb['jam'] == $r['jam']) {
					if ($sb['status'] != $r['status']) {
						$sql = "update jams set status=? where hari=? and jam=? and dokter_id=?";
						$stmt = $conn->prepare($sql);
						$stmt->bind_param("sssi", $sb['status'], $r['hari'], $r['jam'], $idDokter);
						$stmt->execute();

						if ($stmt->affected_rows > 0) {
							$arr = ["result" => "success", "message" => "Jadwal berhasil diupdate!"];
						} else {
							$arr = ["result" => "error", "message" => "Jadwal gagal diupdate!"];
						}
					}
				}
			}
		}
	}
}
echo json_encode($arr);
?>

