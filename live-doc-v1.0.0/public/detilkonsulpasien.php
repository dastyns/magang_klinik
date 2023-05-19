<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>MU Material : Home</title>

    <link id="switcher" href="assets/css/konsul/themes/default-theme.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <!-- Main css File -->
    <!-- <link href="assets/css/konsul/styleDetilKonsul.css" type="text/css" rel="stylesheet" /> -->
    <link href="assets/css/style.css" type="text/css" rel="stylesheet" />

    <!-- Font -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<style>
    .head {
            margin-bottom: -50px;
            display: flex;
            align-items: center;
            flex-direction: column;
        }
</style>
<body>
    <main>
        <nav class="py-3" data-navbar-on-scroll="data-navbar-on-scroll">
            <div class="container">
                <a class="navbar-brand" href="index.php"><img src="assets/img/gallery/logo.png" width="118" alt="logo" /></a>
                <a href="index.php"><button type="button" class="btnBack">Back</button></a>
            </div>
        </nav>

        <!-- <div class="main-wrapper" style="background-image:url(assets/img/gallery/hero-bg.png);background-position:top center;background-size:cover;"> -->
        <div class="main-wrapper">
            <div class="container">
                <div class="about-inner">
                    <div class="about-inner-right">
                        <?php
                        session_start();
                        $email = $_SESSION['email'];
                        

                        $conn = new mysqli("localhost", "root", "", "dbmagang");
                        $sql = "SELECT * 
                                FROM penggunas 
                                WHERE email=?";

                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("s", $email);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $hasil = array();
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                        }
                        $nama = $row["nama"];
                        $email = $row["email"];
                        $noTelp = $row["nomor_telepon"];
                        echo "<h3>$nama</h3>";
                        echo "<p>Kontak : $noTelp | $email</p>";
                        ?>
                        <div class="personal-information">
                            <h3>Daftar Konsultasi Pasien</h3>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-wrap">
                                        <table class="table table-responsive-xl">
                                            <tr class="tabel">
                                                <th>
                                                    <h6>Tanggal Konsultasi</h6>
                                                </th>
                                                <th>
                                                    <h6>Keterangan</h6>
                                                </th>
                                                <th>
                                                    <h6>Obat</h6>
                                                </th>
                                                <th>
                                                    <h6>Biaya</h6>
                                                </th>
                                                <th>
                                                    <h6>Ulasan</h6>
                                                </th>
                                            </tr>

                                            <?php
                                            $conn = new mysqli("localhost", "root", "", "dbmagang");
                                            $sql = "SELECT K.id, date(K.tanggal_konsultasi) as tanggal_konsultasi, K.keterangan, K.obat, K.biaya, U.ulasan
                                            from konsultasis as K
                                            LEFT JOIN reservasis AS R ON K.reservasi_id = R.id 
                                            LEFT JOIN penggunas AS P ON R.id_pengguna = P.id
                                            LEFT JOIN ulasans AS U ON K.id = U.konsultasi_id
                                            where P.email = ?
                                            ORDER BY K.tanggal_konsultasi desc";

                                            $stmt = $conn->prepare($sql);
                                            $stmt->bind_param("s", $email);
                                            $stmt->execute();
                                            $result = $stmt->get_result();

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr class='alert tabel' role='alert'>";
                                                    echo "<td class='tabel'>" . date("d F Y", strtotime($row["tanggal_konsultasi"])) . "</td>";
                                                    echo "<td class='tabel'>" . $row["keterangan"] . "</td>";
                                                    echo "<td class='tabel'>" . $row["obat"] . "</td>";
                                                    echo "<td class='tabel'>Rp " . $row["biaya"] . "</td>";
                                                    if ($row["ulasan"] != "") {
                                                        echo "<td class='tabel'>" . $row["ulasan"] . "</td>";
                                                    } else {
                                                        echo "<td class='tabel'><a href='ulasan.php?idKonsultasi=" . $row["id"] . "'><button type='button' class='btnDetil'>Ulasan</button></a></td>";
                                                    }

                                                    echo "</tr>";
                                                }
                                            }

                                            ?>
                                            <!-- <tr class="alert tabel" role="alert">
                                                <td class="tabel">1 Mei 2002</td>
                                                <td class="tabel">Cabut gigi</td>
                                                <td class="tabel">Antibiotik</td>
                                                <td class="tabel">Rp 300.000</td>
                                                <td><a href="ulasan.php"><button type="button" class="btnDetil">Ulasan</button></a></td>
                                            </tr> -->
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>