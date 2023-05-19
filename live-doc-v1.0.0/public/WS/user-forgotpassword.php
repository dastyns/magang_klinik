<?php
session_start();

$sessionKodeVerifikasi = $_SESSION["kodeVerifikasiResetPassword"];
$kodeVerifikasi = $_POST['kodeVerifikasi'];
$newPassword = $_POST['password'];
$repeatNewPassword = $_POST['repeatPassword'];
$email = $_POST['email'];

if ($sessionKodeVerifikasi == $kodeVerifikasi) {
    if ($newPassword == $repeatNewPassword) {
        $conn = new mysqli("localhost", "root", "", "dbmagang");
        if ($conn->connect_error) {
            $arr = ["result" => "error", "message" => "Error Connect DB"];
        } else {
            $sql = "UPDATE penggunas set password=? WHERE email=?";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $newPassword, $email);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                unset($_SESSION['kodeVerifikasiResetPassword']);
                $arr = ["result" => "success", "message" => "Password berhasil diubah"];
            } else {
                $arr = ["result" => "error", "message" => "Password gagal diubah"];
            }
        }
    } else {
        $arr = ["result" => "error", "message" => "Pastikan password yang dimasukkan sama"];
    }
} else {
    $arr = ["result" => "error", "message" => "Kode Verifikasi tidak sesuai. Mohon periksa kembali email anda."];
}

echo json_encode($arr);
