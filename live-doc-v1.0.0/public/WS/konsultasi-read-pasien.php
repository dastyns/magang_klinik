<?php 

	$emailUser = $_SESSION['emailUser'];
	
	$conn = new mysqli("localhost", "root", "", "dbmagang");

	$arrUlasan=array();
	$sql1 = "SELECT U.konsultasi_id, U.ulasan 
			from ulasans as U
			inner join konsultasis as K on K.id = U.konsultasi_id
			inner join reservasis as R on R.id = K.id_reservasi
			inner join penggunas as P on P.id = R.id_pengguna
			where P.email = ?";

	$stmt1 = $conn->prepare($sql1);
	$stmt1->bind_param("s", $emailUser);
	$stmt1->execute();
	$result1 = $stmt1->get_result();
	if ($result1->num_rows > 0) {
			while ($row1=$result1->fetch_assoc()) {
				array_push($arrUlasan, $row1);
			}
	} 

	$sql = "SELECT K.id, K.tanggal_konsultasi, K.keterangan, K.obat, K.biaya 
			from konsultasis as K
			INNER JOIN reservasis AS R ON K.id_reservasi = R.id 
			INNER JOIN penggunas AS P ON R.id_pengguna = P.id
			where P.email = ?
			ORDER BY K.tanggal_konsultasi desc";
	    
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $emailUser);
		$stmt->execute();
		$result = $stmt->get_result();

			if ($result->num_rows > 0) {
				while ($row=$result->fetch_assoc()) {
					echo "<tr class='alert tabel' role='alert'>";
					echo "<td class='tabel'>". $row["tanggal_konsultasi"] . "</td>";
					echo "<td class='tabel'>". $row["keterangan"] . "</td>";
					echo "<td class='tabel'>". $row["obat"] . "</td>";
					echo "<td class='tabel'>Rp ". $row["biaya"] . "</td>";

					foreach ($arrUlasan as $key => $value) {
						if ($value["konsultasi_id"] == $row["id"]) {
							echo "<td class='tabel'>". $value["keluhan"] . "</td>";
						}else{
							echo "<td class='tabel'><a href='ulasan.php?idKonsultasi=". $row["id"] . "'><button type='button' class='btnUlasan'>Ulasan</button></a></td>";
						}
					}
					
					echo "</tr>";

				}
			} 
	
 ?>