<?php

session_start();
date_default_timezone_set("Asia/Jakarta");

header("Access-Control-Allow-Origin: *");
error_reporting(E_ERROR | E_PARSE);
clearstatcache();
$conn = new mysqli("localhost", "root", "", "dbmagang");

$slot = $_POST['slot'];
$dokter = $_POST['dokter'];

if ($conn->connect_error) {
    $arr = ["result" => "error", "message" => "Error Connect DB"];
} else {
    $status = "baru";
    $sql = "SELECT r.id 
            FROM reservasis r
            INNER JOIN jams j on r.jam_id = j.id
            WHERE r.jam_id=? and r.status_reservasi=? and j.dokter_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isi", $slot, $status, $dokter);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $arr = ["result" => "success", "message" => "Terdapat reservasi pada slot tersebut, silahkan batalkan terlebih dahulu!"];
    } else {
        $arr = ["result" => "error", "message" => "Pengubahan jadwal berhasil!"];
    }
}
echo json_encode($arr);
?>
