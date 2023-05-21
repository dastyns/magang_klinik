
<!doctype html>
<html lang="en">

<head>
    <title>Contact Form 05</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/css/styleUlasan.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body style="background-image: url(assets/img/gallery/bg4.jpg); background-size:cover">
    <!-- <body> -->
    <nav class="py-3" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="assets/img/gallery/logo.png" width="118" alt="logo" /></a>
            <a href="detilkonsulpasien.php"><button type="button" class="btnBack">Back</button></a>
        </div>
    </nav>
    
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="wrapper">
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                <div class="contact-wrap w-100 p-md-5 p-4">
                                    <h3>Ulasan</h3>
                                    <p class="mb-4">Kami menerima segala ulasan yang anda berikan</p>
                                    <div id="form-message-warning" class="mb-4"></div>
                                    <!-- <div id="form-message-success" class="mb-4">
                                        Your message was sent, thank you!
                                    </div> -->
                                    <!-- <div class="row mb-4">
                                        <div class="col-md-4">
                                            <div class="dbox w-100 d-flex align-items-start">
                                                <div class="text">
                                                    <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="dbox w-100 d-flex align-items-start">
                                                <div class="text">
                                                    <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="dbox w-100 d-flex align-items-start">
                                                <div class="text">
                                                    <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <form method="POST" id="contactForm" name="contactForm" class="contactForm">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                <?php
                                                    session_start();
                                                    echo "<input type='text' class='form-control' id='email' value='".$_SESSION['email']."' disabled>";
                                                ?>
                                                    
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                                </div>
                                            </div> -->
                                            <!-- <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                                </div>
                                            </div> -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Create a message here"></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" value='<?php echo $_GET['idKonsultasi']?>' id='idKonsul'>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="submit" value="Send Message" class="btn btn-primary" id='btnSend'>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- <div class="w-100 social-media mt-5">
                                        <h3>Follow us here</h3>
                                        <p>
                                            <a href="#">Facebook</a>
                                            <a href="#">Twitter</a>
                                            <a href="#">Instagram</a>
                                            <a href="#">Dribbble</a>
                                        </p>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-stretch">
                                <div class="info-wrap w-100 p-5 img" style="background-image: url(assets/img/gallery/hero.png);">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script>
    $('body').on('click', '#btnSend', function() {
            
            var idKonsul = $("#idKonsul").val();
            var ulasan = $("#message").val();
            
            $.post("WS/ulasan-insert.php", {
                
                idKonsul: idKonsul,
                ulasan: ulasan,
                
            }).done(function(data) {
                var result = JSON.parse(data);
                alert(result);
                alert(result.result);
                if (result.result == "success") {
                    alert(result.message);
                    window.location = "detilkonsulpasien.php";
                }else{
                    alert(result.message);
                }
            });
        });
</script>

</html>