<?php
$conn = new mysqli("localhost", "root", "", "dbmagang");
if ($conn->connect_error) {
	$arr = ["result" => "error", "message" => "Error Connect DB"];
} else {
    extract($_POST);
	$sql = "INSERT into jenis_perawatans(nama, standar_harga) VALUES(?,?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("si", $nama, $harga);
	$stmt->execute();
	if ($stmt->affected_rows > 0) {
		$arr = ["result" => "success", "message" => "Perawatan berhasil ditambahkan!"];
	} else {
		$arr = ["result" => "error", "message" => "Perawatan gagal ditambahkan!"];
	}
}
echo json_encode($arr);
?>