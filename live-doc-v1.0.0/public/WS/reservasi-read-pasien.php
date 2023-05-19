<?php 
	
	$emailUser = $_SESSION['emailUser'];
	$conn = new mysqli("localhost", "root", "", "dbmagang");

	$sql = "SELECT date(R.tanggal_reservasi) as tanggalReservasi, R.jam, R.keluhan, R.id
			FROM reservasis as R 
			INNER JOIN penggunas as P on P.id = R.pengguna_id
			WHERE date(R.tanggal_reservasi) >= curdate() and R.status_reservasi='1' and P.email = ?";

		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s",$emailUser);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows > 0) {
			while ($row=$result->fetch_assoc()) {
				echo "<tr class='alert tabel' role='alert'>";
				echo "<td class='tabel'>". $row["tanggalReservasi"] . "</td>";
				echo "<td class='tabel'>". $row["jam"] . "</td>";
				echo "<td class='tabel'>". $row["keluhan"] . "</td>";
				echo "</tr>";

			}
		} 
	
 ?>