<?php
$conn = new mysqli("localhost", "root", "", "dbmagang");
if ($conn->connect_error) {
	$arr = ["result" => "error", "message" => "Error Connect DB"];
} else {
    extract($_POST);
	$sql = "update jenis_perawatans set nama=?, standar_harga=? where id=?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("sii", $nama, $harga, $id);
	$stmt->execute();
	if ($stmt->affected_rows > 0) {
		$arr = ["result" => "success", "message" => "Perawatan berhasil diubah!"];
	} else {
		$arr = ["result" => "error", "message" => "Perawatan gagal diubah!"];
	}
}
echo json_encode($arr);
?>