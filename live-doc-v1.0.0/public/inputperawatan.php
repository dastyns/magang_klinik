<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perawatan</title>
    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="assets/css/theme.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</head>

<body>
    <div class="container" style="margin-top:30px;">
        <div class="row">
            <div class="col-12 py-3">
                <!-- <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/people.png);background-position:top center;background-size:contain;">
                    </div> -->
                <!--/.bg-holder-->

                <h1 class="text-center">TAMBAH/EDIT JENIS PERAWATAN</h1>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/dot-bg.png);background-position:bottom right;background-size:auto;">
            </div>
            <!--/.bg-holder-->

            <div class="col-lg-6 z-index-2 mb-5"><img class="w-100" src="assets/img/gallery/appointment.png" alt="..." /></div>
            <div class="col-lg-6 z-index-2">
                <form class="row g-3">
                    <div class="col-md-6">
                        <label class="visually-hidden" for="inputName">Name</label>
                        <input class="form-control form-livedoc-control" id="inputName" type="text" placeholder="Name" />
                    </div>
                    <div class="col-md-6">
                        <label class="visually-hidden" for="inputPhone">Phone</label>
                        <input class="form-control form-livedoc-control" id="inputPhone" type="text" placeholder="Phone" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label visually-hidden" for="inputCategory">Category</label>
                        <select class="form-select" id="inputCategory">
                            <option selected="selected">Category</option>
                            <option> Category One</option>
                            <option> Category Two</option>
                            <option> Category Three</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label visually-hidden" for="inputEmail">Email</label>
                        <input class="form-control form-livedoc-control" id="inputEmail" type="email" placeholder="Email" />
                    </div>
                    <div class="col-md-12">
                        <label class="form-label visually-hidden" for="validationTextarea">Message</label>
                        <textarea class="form-control form-livedoc-control" id="validationTextarea" placeholder="Message" style="height: 250px;" required="required"></textarea>
                    </div>
                    <div class="col-12">
                        <div class="d-grid">
                            <button class="btn btn-primary rounded-pill" type="submit">Sign in</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="vendors/@popperjs/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="https://scripts.sirv.com/sirvjs/v3/sirv.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="vendors/fontawesome/all.min.js"></script>
    <script src="assets/js/theme.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&amp;family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100&amp;display=swap" rel="stylesheet">
</body>

</html>