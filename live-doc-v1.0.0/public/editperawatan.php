<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Perawatan</title>
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
    <link href="assets/css/style.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .head {
            margin-bottom: -50px;
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        .txtLabel {
            color: #283779;
            font-family: 'Courier New', Courier, monospace;
        }
    </style>
</head>

<body>
    <main class="main" id="top">
        <nav class="py-3" data-navbar-on-scroll="data-navbar-on-scroll">
            <div class="container">
                <a class="navbar-brand" href="index.php"><img src="assets/img/gallery/logo.png" width="118" alt="logo" /></a>
                <a href="daftarperawatan.php"><button type="button" class="btnBack">Back</button></a>
            </div>
        </nav>
        <br>
        <div class="head">
            <h3 style="color:#283779;"><strong>Edit Jenis Perawatan</strong></h3>
        </div>
        <br><br><br>
        <div class="container">
            <div class="row">
                <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/dot-bg.png);background-position:bottom right;background-size:auto;">
                </div>
                <!--/.bg-holder-->
                <?php
                    $conn = new mysqli("localhost", "root", "", "dbmagang");
                    $id = $_GET['id'];
                    $sql = "SELECT nama, standar_harga 
                                FROM jenis_perawatans
                                WHERE id=?";

                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows ==1) {
                        $row = $result->fetch_assoc();
                    }
                    $nama = $row["nama"];
                    $harga = $row["standar_harga"];
                ?>
                <div class="col-lg-6 z-index-2 mb-5"><img class="w-100" src="assets/img/gallery/appointment.png" alt="..." /></div>
                <div class="col-lg-6 z-index-2 p-5">
                    <form method="post" action="#" class="row g-3">
                        <br><br>
                        <div class="col-md-12 txtLabel">
                            <label>Nama Jenis Perawatan</label>
                            <label class="visually-hidden" for="inputName">Nama Perawatan</label>
                            <input class="form-control form-livedoc-control" id="inputNama" type="text" value="<?php echo $nama ?>"/>
                        </div>
                        <div class="col-md-12 txtLabel">
                            <label>Standar harga Perawatan</label>
                            <label class="visually-hidden" for="inputHarga">Standar harga</label>
                            <input class="form-control form-livedoc-control" id="inputHarga" type="text" value="<?php echo $harga ?>"/>
                        </div>
                        <input class="form-control form-livedoc-control" id="idJenisPerawatan" type="hidden" value="<?php echo $_GET['id'] ?>"/>
                        <!-- <div class="col-md-6">
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
                        </div> -->
                        <div class="col-12">
                            <div class="d-grid">
                                <button class="btn btn-primary rounded-pill" type="submit" id="btnSimpan">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&amp;family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100&amp;display=swap" rel="stylesheet">
</body>
<script>
    $('body').on('click', '#btnSimpan', function(event) {
        event.preventDefault();
        var nama = $("#inputNama").val();
        var harga = $('#inputHarga').val();
        var id = $('#idJenisPerawatan').val();

        $.post("WS/perawatan-edit.php", {
            nama: nama,
            harga: harga,
            id:id,

        }).done(function(data) {
            var result = JSON.parse(data);
            if (result.result == "success") {
                alert(result.message);
                window.location = "daftarperawatan.php";
            } else {
                alert(result.message);
            }
        });
    });
</script>

</html>