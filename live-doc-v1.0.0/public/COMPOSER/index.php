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
    <h1>Contact</h1>

    <form method="post" action="send-email.php">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required><br>

        <label for="email">email</label>
        <input type="email" name="email" id="email" required><br>

        <label for="subject">Subject</label>
        <input type="text" name="subject" id="subject" required><br>

        <label for="message">Message</label>
        <textarea name="message" id="message" required></textarea>

        <br>

        <button>Send</button>
    </form>



    
    <!-- <script>
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
    </script> -->
</body>

</html>