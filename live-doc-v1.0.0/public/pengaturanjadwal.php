<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Reservasi</title>

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

        .checkboxjadwal{
            width: 20px;
            height: 20px;
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
            <h3 style="color:#283779;">Pengaturan Jadwal Reservasi</h3>
        </div>
        <?php
        $conn = new mysqli("localhost", "root", "", "dbmagang");
        $id=1;
        $sql = "SELECT distinct(jam) FROM jams where dokter_id=? and hari!='semua'";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $dataJam = [];

            while ($row = $result->fetch_assoc()) {
                array_push($dataJam, $row);
            }
        }

        $sql = "SELECT jam, hari, status FROM jams where dokter_id=? and hari!='semua'";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i",  $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $dataHariStatus = [];

            while ($row = $result->fetch_assoc()) {
                array_push($dataHariStatus, $row);
            }
        }

        $sql = "SELECT DISTINCT(hari) FROM jams where dokter_id=? and hari!='semua'";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i",  $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $dataHari = [];

            while ($row = $result->fetch_assoc()) {
                array_push($dataHari, $row);
            }
        }
        ?>
        <section class="ftco-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrap" id="tabelReservasi">
                            <table class="table table-responsive-xl">
                                <tr class="tabel">
                                    <th>Jam</th>
                                    <?php
                                    foreach($dataHari as $dh){
                                        echo "<th>".$dh['hari']."</th>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                <?php
                                    foreach($dataJam as $dj){
                                        echo "<tr>";
                                        echo "<td class='tabel'>" . $dj['jam'] . "</td>";
                                        foreach($dataHari as $dh) {
                                            echo "<td class='tabel'>";
                                            foreach($dataHariStatus as $djs){
                                                if($djs['hari'] == $dh['hari'] && $djs['jam'] == $dj['jam']){
                                                    if ($djs['status'] == "aktif") {
                                                        echo "<div class='form__group'>";
					                                    echo "<input type='checkbox' name='slot[" . $dh['hari'] . "][" . $dj['jam'] . "]' value='aktif' class='checkboxjadwal' checked>";
					                                    echo "</div>";
				                                        
                                                    }else{
                                                        echo "<div class='form__group'>";
					                                    echo "<input type='checkbox' name='slot[" . $dh['hari'] . "][" . $dj['jam'] . "]' value='nonaktif' class='checkboxjadwal'>";
					                                    echo "</div>";
                                                    }
                                                    
                                                } 
                                            }
                                            echo "</td>";
                                        }     
                                        
                                        echo "</tr>";
                                    }
                                ?>
                                </tr>
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

        $('body').on('change', '.checkboxjadwal', function() {
            var curValue = $(this).val();   
            if(curValue == "aktif"){
                $(this).val("nonaktif");
            }else{
                $(this).val("aktif");
            }
            var curValue = $(this).val();
        });
    </script>

</body>

</html>