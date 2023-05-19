<?php 
	
	$id = $_POST['idReservation'];
	$conn = new mysqli("localhost", "root", "", "dbmagang");

	$sql = "SELECT * FROM reservasis WHERE id=?";

		$stmt = $conn->prepare($sql);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result = $stmt->get_result();
		$hasil = array();
		if ($result->num_rows > 0) {
			while ($row=$result->fetch_assoc()) {
				$hasil[]=$row;
			}
		} 
		echo json_encode($hasil);
?>
