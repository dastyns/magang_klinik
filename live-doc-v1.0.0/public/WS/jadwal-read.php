<?php
$conn = new mysqli("localhost", "root", "", "dbmagang");

$sql = "SELECT jam FROM jams where dokter_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idDokter);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = [];

    while ($row = $result->fetch_assoc()) {
        array_push($data, $r);
    }

    $arr = ["dataJam" => $data];
}


$sql = "SELECT hari, status FROM jams where dokter_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idDokter);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = [];

    while ($row = $result->fetch_assoc()) {
        array_push($data, $r);
    }

    $arr = ["dataHari" => $data];
}
?>