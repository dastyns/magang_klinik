<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <link href="assets/css/style.css" rel="stylesheet" />


    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .tabel {
            text-align: center;
        }

        .containerSearch {
            width: 400px;
            height: 42px;
            border: 3px solid #283779;
            padding: 0px 10px;
            border-radius: 50px;
            background-color: white;
            text-align: center;
        }

        .tableSearch {
            width: 100%;
            height: 100%;
            vertical-align: middle;
        }

        .search {
            border: none;
            width: 100%;
            height: 100%;
            padding: 0px 5px;
            border-radius: 50px;
            font-size: 18px;
            font-family: "Nunito";
            color: #424242;
            font-weight: 500;

        }

        .search:focus {
            outline: none;
        }

        .icon:hover {
            color: #2255b9;
            font-size: 18px;
        }

        .icon {
            font-size: 26;
            color: #2980b9;
        }

        .btnSearchs {
            background-color: inherit;
            border: none;
            cursor: pointer;
        }

        h6 {
            color: #283779;
            font-weight: bold;
        }

        .btnDetil {
            border-radius: 15px;
            background-color: #283779;
            color: white;
            font-size: medium;
            width: 100px;
            border: 0px;
        }

        .btnDetil:hover {
            background-color: #1b71a1;
        }

        .head {
            margin-bottom: -50px;
            display: flex;
            align-items: center;
            flex-direction: column;
        }
    </style>
</head>

<body>
    <!-- <main class="main" id="top" style="background-image:url(assets/img/gallery/hero-bg.png);background-position:top center;background-size:cover;"> -->
    <main class="main" id="top">
        <nav class="py-3" data-navbar-on-scroll="data-navbar-on-scroll">
            <div class="container">
                <a class="navbar-brand" href="index.php"><img src="assets/img/gallery/logo.png" width="118" alt="logo" /></a>
                <a href="index.php"><button type="button" class="btnBack">Back</button></a>
            </div>
        </nav>
        <div class="head">
            <h3 style="color:#283779;">Daftar Konsultasi Pasien</h3>
            <div class="containerSearch">
                <table class="tableSearch">
                    <tr>
                        <td>
                            <input type="text" id="keySearch" class="search" placeholder="Search Name">
                        </td>

                        <td>
                            <button class="btnSearchs" id="btnSearch"><i class="fa fa-search icon"></i></button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <section class="ftco-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrap" id="tabelReservasi">
                            <table class="table table-responsive-xl">
                                <tr class="tabel">
                                    <th>
                                        <h6>Nama Pasien</h6>
                                    </th>
                                    <th>
                                        <h6>Tanggal Konsultasi Akhir</h6>
                                    </th>
                                    <th>
                                        <h6>Status</h6>
                                    </th>
                                    <th>&nbsp;</th>
                                </tr>

                                <?php

                                $conn = new mysqli("localhost", "root", "", "dbmagang");

                                $sql = "SELECT P.nama, R.tanggal_reservasi, KO.tanggal_balik, P.id
                                        FROM penggunas as P
                                        INNER JOIN reservasis AS R on P.id = R.pengguna_id
                                        INNER JOIN konsultasis as KO on R.id = KO.reservasi_id
                                        WHERE KO.id in (
                                        SELECT MAX(K.id)
                                        FROM konsultasis as K
                                        INNER JOIN reservasis AS R ON R.id = K.reservasi_id
                                        GROUP BY R.pengguna_id)";

                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr class='alert tabel' role='alert'>";
                                        echo "<td class='tabel'>" . $row["nama"] . "</td>";
                                        echo "<td class='tabel'>" . date("d F Y", strtotime($row["tanggalTerakhir"])) . "</td>";
                                        if ($row["tanggal_balik"] != NULL) {
                                            echo "<td class='status'><span class='active'>" . date("d F Y", strtotime($row["tanggal_balik"])) . "</span></td>";
                                        } else {
                                            echo "<td class='status'><span class='waiting'>" . "Selesai" . "</span></td>";
                                        }

                                        echo "<td class='tabel'><a href='detilkonsuldokter.php?idPengguna=" . $row["id"] . "'><button type='button' class='btnDetil'>Detail</button></a></td>";
                                        echo "</tr>";
                                    }
                                }

                                ?>

                                <!-- <tr class="alert tabel" role="alert">
                                    <td class="tabel">Markotto89</td>
                                    <td class="tabel">1 Mei 2002</td>
                                    <td class="status"><span class="active">Active</span></td>
                                    <td class="tabel">
                                        <a href="detilkonsuldokter.php"><button type="button" class="btnDetil">Detail</button></a>
                                    </td>
                                </tr>

                                <tr class="alert tabel" role="alert">
                                    <td>
                                        <label class="checkbox-wrap checkbox-primary">
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="tabel">Markotto88</td>
                                    <td class="tabel">1 Mei 2002</td>
                                    <td class="status tabel"><span class="waiting">Waiting for Resassignment</span></td>
                                    <td class="tabel">
                                        <a href="detilkonsuldokter.php"><button type="button" class="btnDetil">Detail</button></a>
                                    </td>
                                </tr> -->


                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&amp;family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100&amp;display=swap" rel="stylesheet">
    <script>
        $('body').on('click', '#btnSearch', function() {
            var key = $("#keySearch").val();
            $.post("WS/konsultasi-search-nama.php", {
                key: key
            }).done(function(data) {
                $('#tabelReservasi').html(data);
            });
        });
    </script>

</body>

</html>