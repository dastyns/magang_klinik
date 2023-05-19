<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sign Up</title>

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
            <div class="container"><a class="navbar-brand" href="index.php"><img src="assets/img/gallery/logo.png" width="118" alt="logo" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
                <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
                    </ul><a class="btn btn-sm btn-outline-primary rounded-pill order-1 order-lg-0 ms-lg-4" href="signin.php">Sign In</a>
                </div>
            </div>
        </nav>
        <section class="py-xxl-10 pb-0" id="home">
            <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/arrival-2.png);background-position:top center;background-size:cover;height:100vh">
            </div>
            <!--/.bg-holder-->

            <div class="container">
                <div class="row min-vh-xl-100 min-vh-xxl-25">
                    <!-- <div class="col-md-5 col-xl-6 col-xxl-7 order-0 order-md-1 text-end py-7">
                    <img class="pt-7 pt-md-0 w-100" src="assets/img/gallery/arrival.png" alt="hero-header" />
                </div> -->
                    <div class="col-md-7 col-xl-7 col-xxl-5 text-md-start text-center py-3">

                        <h1>Hello, <br /><strong>Please</strong> Sign Up <strong>to Create </strong>Your Account</h1>

                        <p class="fs-1 mb-5">You can get the care you need 24/7 - be it online or in <br />person. You will be treated by caring specialist doctors. </p>
                        <div class="col-md-6">
                            <label class="visually-hidden" for="inputPhone">Phone</label>
                            <h5><strong>&nbsp;Full Name</strong></h5>
                            <input style="padding: 0.5em 1em;" class="form-control form-livedoc-control" id="inputName" type="text" required/>
                            <br>
                            <h5><strong>&nbsp;Phone Number</strong></h5>
                            <input style="padding: 0.5em 1em;" class="form-control form-livedoc-control" id="inputPhone" type="text" required/>
                            <br>
                            <h5><strong>&nbsp;Email</strong></h5>
                            <input style="padding: 0.5em 1em;" class="form-control form-livedoc-control" id="inputEmail" type="text"/>
                            <br>
                            <h5><strong>&nbsp;Password</strong></h5>
                            <input style="padding: 0.5em 1em;" class="form-control form-livedoc-control input-hover" id="inputPassword" type="password" required/>
                            <br>
                            <h5><strong>&nbsp;Repeat Password</strong></h5>
                            <input style="padding: 0.5em 1em;" class="form-control form-livedoc-control input-hover" id="inputRepeatPassword" type="password" required/>
                            <br>
                        </div>
                        <button style="padding: 0.5em 2em; " id="btnSignUp" class="btn btn-lg btn-primary rounded-pill" >Sign Up</buton> &nbsp;

                    </div>


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
        $('body').on('click', '#btnSignUp', function() {
            
            var fullName = $("#inputName").val();
            var phoneNumber = $("#inputPhone").val();
            var email = $("#inputEmail").val();
            var password = $("#inputPassword").val();
            var repeatPassword = $('#inputRepeatPassword').val();
            $.post("WS/user-signup.php", {
                nama: fullName,
                nomorTelepon: phoneNumber,
                email: email,
                password: password,
                repeatPassword :repeatPassword
            }).done(function(data) {
                var result = JSON.parse(data);
                if (result.result == "success") {
                    window.location = "signin.php";
                }else{
                    alert(result.message);
                }
            });
        });
    </script>


</body>

</html>