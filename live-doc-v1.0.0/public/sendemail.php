<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
    <!-- <button id="btnSendEmail">Send email</button> -->
    <form action="" method="get">
        <input type="submit" value="Submit" name="submit">

    </form>



    <?php
    if (isset($_GET['submit'])) {
        // $from = $_POST["from"];
        // $to = $_POST["to"];
        // $subject = $_POST["subject"];
        // $message = $_POST["message"];

        $from = "kenkwando08@gmail.com";
        $to = "dastynsusanto.ds@gmail.com";
        $subject = "Test Email";
        $message = "Hello";

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $headers .= "From:" . $from;
        mail($to, $subject, $message, $headers);
        echo "Pesan terkirim";
    }


    ?>

    <script>
        $('body').on('click', '#btnSendEmail', function() {

            var to = "kenkwando08@gmail.com";
            var from = "dastynsusanto.ds@gmail.com";
            var subject = "Test Email";
            var message = "Hello";


            $.post("WS/reservasi-sendemail.php", {

                email: email,
                from: from,
                subject: subject,
                message: message,

            }).done(function(data) {
                alert(data);
            });
        });
    </script>
</body>

</html>