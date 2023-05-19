<?php 
	
	$conn = new mysqli("localhost", "root", "", "dbmagang");

	$sql = "SELECT P.nama, KO.tanggal_konsultasi, KO.tanggal_balik, P.id
			FROM penggunas as P
			INNER JOIN reservasis AS R on P.id = R.pengguna_id
			INNER JOIN konsultasis as KO on R.id = KO.reservasi_id
			WHERE KO.id in (
			SELECT MAX(K.id)
			FROM konsultasis as K
			INNER JOIN reservasis AS R ON R.id = K.reservasi_id
			GROUP BY R.pengguna_id);";
	    
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while ($row=$result->fetch_assoc()) {
				echo "<tr class='alert tabel' role='alert'>";
				echo "<td class='tabel'>". $row["nama"] . "</td>";
				echo "<td class='tabel'>". $row["tanggalTerakhir"] . "</td>";
				echo $row['tanggal_balik'];
				if ($row["tanggal_balik"] != "NULL") {
					echo "<td class='status'><span class='active'>" . $row["tanggal_balik"] . "</span></td>";
				}else{
					echo "<td class='status'><span class='waiting'>" . "Selesai" . "</span></td>";
				}
				
				echo "<td class='tabel'><a href='detilkonsul.php?idPengguna=". $row["id"] . "'><button type='button' class='btnDetil'>Detail</button></a></td>";
				echo "</tr>";

			}
		}
