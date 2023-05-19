<?php 
	
	$idPengguna = $_GET['idPengguna'];
	
	$conn = new mysqli("localhost", "root", "", "dbmagang");

	$sql = "SELECT nama, email, nomor_telepon from penggunas where id=?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s", $idPengguna);
	$stmt->execute();

	    
		$result = $stmt->get_result();

		if ($result->num_rows > 0) {
				$row=$result->fetch_assoc();
				echo "<h3>" . $row["nama"] . "</h3>";
				echo "<p>Kontak : ". $row["email"] . " | " . $row["nomor_telepon"] . "</p>";
				echo "<td class='tabel'>". $row["tanggalTerakhir"] . "</td>";
		} 
	
 ?>

 <?php 

 	$idPengguna = $_GET['idPengguna'];
	
	$conn = new mysqli("localhost", "root", "", "dbmagang");

	$sql = "SELECT K.tanggal_konsultasi, K.keterangan, K.obat, K.biaya, U.ulasan
			from konsultasis as K
			INNER JOIN reservasis AS R ON K.id_reservasi = R.id 
			INNER JOIN penggunas AS P ON R.id_pengguna = P.id
			INNER JOIN ulasans AS U ON U.konsultasi_id = K.id
			where P.id = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s", $idPengguna);
	$stmt->execute();
	$result = $stmt->get_result();

		if ($result->num_rows > 0) {
			while ($row=$result->fetch_assoc()) {
				echo "<tr class='alert tabel' role='alert'>";
				echo "<td class='tabel'>". $row["tanggal_konsultasi"] . "</td>";
				echo "<td class='tabel'>". $row["keterangan"] . "</td>";
				echo "<td class='tabel'>". $row["obat"] . "</td>";
				echo "<td class='tabel'>Rp ". $row["biaya"] . "</td>";
				echo "</tr>";

			}
		} 
	
 ?>