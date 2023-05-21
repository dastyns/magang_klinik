<?php 
	$conn = new mysqli("localhost", "root", "", "dbmagang");

	$sql = "SELECT * 
            FROM ulasans u 
            INNER JOIN ulasan_baiks ub ON u.id = ub.ulasan_id
            ORDER BY RAND()
            lIMIT 3";

		$stmt = $conn->prepare($sql);
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
