<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="assets/css/fonts/icomoon/style.css">

  <link rel="stylesheet" href="assets/css/insertkonsul/css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/insertkonsul/css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="assets/css/insertkonsul/css/styleInsertKonsul.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

  <title>Konsultasi</title>
</head>

<body>

  <nav class="py-3" data-navbar-on-scroll="data-navbar-on-scroll">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="assets/img/gallery/logo.png" width="118" alt="logo" /></a>
      <a href="reservationList.php"><button type="button" class="btnBack">Back</button></a>
    </div>
  </nav>

  <div class="">
    <div class="contents">
      <div class="container">
        <div class="" style="margin-top: 50px;">
          <div class="col-md-7 py-6">
            <h3>Konsultasi</h3>
            <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
            <?php
            $conn = new mysqli("localhost", "root", "", "dbmagang");
            $idReservasi = $_GET['idReservasi'];
            $sql = "SELECT R.*, P.nama, P.id 
            FROM reservasis as R 
            inner join penggunas as P on R.id_pengguna=P.id 
            WHERE R.id=?";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $idReservasi);
            $stmt->execute();
            $result = $stmt->get_result();
            $hasil = array();
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $hasil[] = $row;
              }
            }
            $nama = $hasil[0]["nama"];
            $keluhan = $hasil[0]["keluhan"];
            echo "<input id='idPengguna' type='hidden' value='" . $hasil[0]["id"] . "'>";
            ?>

            <p>Keluhan pasien:
              <?php
              echo $keluhan
              ?>
            </p>
            <form action="#" method="post">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group first">
                    <label for="fname">Full Name</label>
                    <?php
                    echo "<input type='text' class='form-control' id='nama' value='" . $nama . "' disabled>"
                    ?>

                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group first">
                    <label>Tanggal Konsultasi</label>
                    <?php
                    $tanggal = date("d F Y");
                    echo "<input type='text' class='form-control' id='tanggal' value='" . $tanggal . "' disabled>";
                    ?>

                  </div>
                </div>
              </div>
              <!-- <div class="row">
                
              </div> -->
              <div>
                <div class="form-group last mb-3">
                  <label>Keterangan</label>
                  <textarea class="form-control" style="height: 100px;" placeholder="keterangan" id="keterangan"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group first">
                    <label>Obat</label>
                    <input type="text" class="form-control" id="obat">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group first">
                    <label>Biaya</label>
                    <input type="text" class="form-control" id="biaya">
                  </div>
                </div>
              </div>
              <input type="checkbox" id="checkTanggalBalik"> Tanggal Balik
              <br><br>
              <div class="row" id="divTanggalBalik" hidden>
                <div class="col-md-6">
                  <label id="test">Tanggal Balik</label>
                  <input type="date" value=<?php echo "'" . date('Y-m-d') . "'"; ?> class="form-control" id="tanggal_balik">
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Jam Datang</label>
                    <select class="form-control" id="jam">
                      <?php
                      $conn = new mysqli("localhost", "root", "", "dbmagang");
                      $tanggalHariIni = date('Y-m-d');
                      $sql = "SELECT * from jams
														where idjam not in (select jam_idjam 
														from reservasis
														where tanggal_reservasi = ?)";
                      $stmt = $conn->prepare($sql);
                      $stmt->bind_param("s", $tanggalHariIni);
                      $stmt->execute();
                      $result = $stmt->get_result();

                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          echo "<option value='" . $row["idjam"] . "'>" . $row["jam"] . "</option>";
                        }
                      }

                      ?>
                    </select>
                    <span class="select-arrow"></span>
                  </div>
                </div>
              </div>

              <br>

              <!-- <div class="d-flex mb-5 mt-4 align-items-center">
                <div class="d-flex align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Creating an account means you're okay with our <a href="#">Terms and Conditions</a> and our <a href="#">Privacy Policy</a>.</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
              </div>
              </div> -->
              <input type="hidden" value=<?php echo "'" . $idReservasi . "'" ?> id="idReservasi">
              <input type="submit" value="Konfirmasi" id="btnKonfirmasi" class="btn px-5 btn-primary">

            </form>
          </div>
        </div>
      </div>
    </div>


  </div>

  <script>
    $('body').on('click', '#btnKonfirmasi', function() {

      var keterangan = $("#keterangan").val();
      var obat = $("#obat").val();
      var biaya = $("#biaya").val();
      var idReservasi = $("#idReservasi").val();
      var idPengguna = $("#idPengguna").val();

      var tanggalbalik = "";
      var jam = "";

      if ($("#checkTanggalBalik").is(":checked")) {
        tanggalbalik = $("#tanggal_balik").val();
        jam = $("#jam").val();
      }
      alert(tanggalbalik);

      $.post("WS/konsultasi-insert.php", {
        keterangan: keterangan,
        obat: obat,
        biaya: biaya,
        tanggalbalik: tanggalbalik,
        idReservasi: idReservasi,
        idPengguna: idPengguna,
        jam: jam,
      }).done(function(data) {
        var result = JSON.parse(data);
        alert(result);
        if (result.result == "success") {
          alert(result.message);
          window.location="reservationList.php";
        } else {
          alert(result.message);
        }
      });
    });

    $('body').on('change', '#tanggal_balik', function() {
      var tanggalReservasi = $("#tanggal_balik").val();

      $.post("WS/check-jam.php", {
        tanggalReservasi: tanggalReservasi,

      }).done(function(data) {
        if (data != "warning") {
          $("#jam").html(data);
          $("#btnKonfirmasi").attr("disabled", false);
          $("#jam").attr("disabled", false);
        } else {
          alert("Silahkan memilih tanggal yang sesuai");
          $("#btnKonfirmasi").attr("disabled", true);
          $("#jam").attr("disabled", true);

        }
      });
    });

    $('body').on('click', '#checkTanggalBalik', function() {
      if ($(this).is(":checked")) {
        $("#divTanggalBalik").prop("hidden", false);
      } else {
        $("#divTanggalBalik").prop("hidden", true);
        $("#btnKonfirmasi").attr("disabled", false);
      }
    });
  </script>
</body>

</html>