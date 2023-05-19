<?php 
	header("Access-Control-Allow-Origin: *");
	error_reporting(E_ERROR | E_PARSE);
	clearstatcache();
	$conn = new mysqli("localhost", "root", "", "dbmagang");


	$email = $_POST['email'];
	$nama = $_POST['nama'];
	$password = $_POST['password'];
	$nomorTelepon = $_POST['nomorTelepon'];
	$repeatPassword = $_POST['repeatPassword'];

	$arr=null;

	if($conn->connect_error) {
    	$arr= ["result"=>"error","message"=>"Error Connect DB"];
	}
	else{
	    $sql1 = "SELECT * FROM penggunas where nomor_telepon=?";
		$stmt = $conn->prepare($sql1);
		$stmt->bind_param("s",$nomorTelepon);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows > 0) {
			$arr= ["result"=>"error","message"=>"Nomor telepon sudah pernah digunakan, silahkan gunakan nomor telepon lain untuk Sign Up"];
		} 
		else {
			if ($password == $repeatPassword) {
				$sql = "INSERT into penggunas(nama,nomor_telepon, email, password) VALUES(?,?,?,?)";
				    $stmt = $conn->prepare($sql);
					$stmt->bind_param("ssss",$nama, $nomorTelepon, $email, $password);
					$stmt->execute();
					

					if ($stmt->affected_rows > 0) {
						$arr=["result"=>"success"];
					} 
					else {
						$arr= ["result"=>"error","message"=>"sql error: $sql"];
					}
			}else{
				$arr= ["result"=>"error","message"=>"Pastikan password yang dimasukkan sama"];
			}
		}
	}
	echo json_encode($arr);
 ?>