<?php
    $from = $_POST["from"];
    $to = $_POST["to"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $headers = "From:" . $from;
    mail($to, $subject, $message, $headers);
    echo "Pesan terkirim";

?>