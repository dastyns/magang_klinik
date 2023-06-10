<?php
$conn = new mysqli("localhost", "root", "", "dbmagang");

$sql = "SELECT hari, jam, status FROM jams where dokter_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idDokter);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        
    }
}
