<?php

session_start();
require "../vendors/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$email = $_POST["email"];

$conn = new mysqli("localhost", "root", "", "dbmagang");

$sql = "SELECT * FROM penggunas where email=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row["nama"];
    $subject = "Reset Password";

    $kode = "";
    for ($i = 0; $i < 6; $i++) {
        $kode .= rand(0, 9);
    }
    $_SESSION["kodeVerifikasiResetPassword"] = $kode;
    $message = "Berikut merupakan link untuk melakukan reset password : \r\n
    http://localhost/magang/live-doc-v1.0.0/public/forgotpassword.php?emailUser=$email \r\n
    \r\n Harap masukkan Kode Verifikasi pada link di atas : " . $kode;

    $mail = new PHPMailer(true);

    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = "dastynsusanto.ds@gmail.com";
    $mail->Password = "plsdqxaashnmvtkl";

    $mail->setFrom("dastynsusanto.ds@gmail.com", "Klinik Toton");
    $mail->addAddress($email, $name);

    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send();

    echo "Silahkan cek email anda untuk melanjutkan tahap reset password";
} else {
    echo "Email yang dimasukkan tidak terdaftar";
}
