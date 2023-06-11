<?php

session_start();

header("Access-Control-Allow-Origin: *");
error_reporting(E_ERROR | E_PARSE);
clearstatcache();
$conn = new mysqli("localhost", "root", "", "dbmagang");


$email = $_POST['email'];
$password = $_POST['password'];


$arr = null;
if ($conn->connect_error) {
	$arr = ["result" => "error", "message" => "Error Connect DB"];
} else {
	$sql = "SELECT * FROM penggunas where email=?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows > 0) {
		$sql = "SELECT * FROM penggunas where email=? and password=?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ss", $email, $password);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows > 0) {
			$r = $result->fetch_assoc();
			$arr = ["result" => "success", "data" => $r];
			$_SESSION["email"] = $r["email"];
			$_SESSION["idPengguna"] = $r["id"];
		} else {
			$arr = ["result" => "error", "message" => "Sign In gagal. Email atau Password salah"];
		}
	} else {
		$arr = ["result" => "error", "message" => "Email belum terdaftar"];
	}
}
echo json_encode($arr);
