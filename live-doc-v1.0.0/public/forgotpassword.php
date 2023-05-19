<?php
session_start();
if (!(isset($_SESSION['kodeVerifikasiResetPassword']))) {
    header("Location: signin.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reset Password</title>

    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">

    <link href="assets/css/theme.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</head>

<body>
    <main class="main" id="top">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
            <div class="container"><a class="navbar-brand"><img src="assets/img/gallery/logo.png" width="118" alt="logo" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
                <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base"></ul>
                    <!-- </ul><a class="btn btn-sm btn-outline-primary rounded-pill order-1 order-lg-0 ms-lg-4" href="signup.php">Sign Up</a> -->
                </div>
            </div>
        </nav>
        <section class="py-xxl-10 pb-0" id="home">
            <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/hero-bg.png);background-position:top center;background-size:cover;">
            </div>
            <!--/.bg-holder-->

            <div class="container">
                <div class="row min-vh-xl-100 min-vh-xxl-25">

                    <div class="col-md-7 col-xl-6 col-xxl-5 text-md-start text-center py-3">

                        <h1><strong>Reset </strong>Password,<br />Please&nbsp;<strong>Input </strong>your <strong>New Password</strong></h1>

                        <!-- <p class="fs-1 mb-5">You can get the care you need 24/7 – be it online or in <br />person. You will be treated by caring specialist doctors. </p> -->
                        <br>
                        <div class="col-md-6">
                            <h5><strong>&nbsp;Kode Verifikasi</strong></h5>
                            <input style="padding: 0.7em 2em;" class="form-control form-livedoc-control" id="inputKodeVerifikasi" type="text" />
                            <br>
                            <h5><strong>&nbsp;New Password</strong></h5>
                            <input style="padding: 0.7em 2em;" class="form-control form-livedoc-control" id="inputNewPassword" type="password" />
                            <br>
                            <h5><strong>&nbsp;Repeat Password</strong></h5>
                            <input style="padding: 0.7em 2em;" class="form-control form-livedoc-control input-hover" id="inputRepeatNewPassword" type="password" />
                            <input style="padding: 0.7em 2em;" class="form-control form-livedoc-control input-hover" id="emailUser" type="hidden" value=<?php echo "'" . $_GET["emailUser"] ."'" ?>/>
                        </div>
                        <br>
                        <button style="padding: 0.5em 2em; " id="btnKonfirmasi" class="btn btn-lg btn-primary rounded-pill" role="button">Konfirmasi</button> &nbsp;

                    </div>
                    <div class="col-md-5 col-xl-6 col-xxl-7 order-0 order-md-1 text-end py-7"><img class="pt-7 pt-md-0 w-100" src="assets/img/gallery/hero.png" alt="hero-header" /></div>

                </div>
            </div>

        </section>

    </main>

    <script src="vendors/@popperjs/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="https://scripts.sirv.com/sirvjs/v3/sirv.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="vendors/fontawesome/all.min.js"></script>
    <script src="assets/js/theme.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <script>
        $('body').on('click', '#btnKonfirmasi', function() {
            
            var kodeVerifikasi = $("#inputKodeVerifikasi").val();
            var email = $("#emailUser").val();
            var password = $("#inputNewPassword").val();
            var repeatPassword = $("#inputRepeatNewPassword").val();
            

            $.post("WS/user-forgotpassword.php", {

                kodeVerifikasi: kodeVerifikasi,
                password: password,
                repeatPassword : repeatPassword,
                email : email,

            }).done(function(data) {
                var result = JSON.parse(data);
                if (result.result == "success") {
                    alert(result.message);
                    window.location = "signin.php";
                } else {
                    alert(result.message);
                }
            });
        });
    </script>


</body>

</html>