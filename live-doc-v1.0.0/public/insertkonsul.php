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
            date_default_timezone_set("Asia/Jakarta");
            $conn = new mysqli("localhost", "root", "", "dbmagang");
            $idReservasi = $_GET['idReservasi'];
            $sql = "SELECT R.*, P.nama, P.id 
            FROM reservasis as R 
            inner join penggunas as P on R.pengguna_id=P.id 
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
                    <label class="txtLabel">Full Name</label>
                    <?php
                    echo "<input type='text' class='form-control' id='nama' value='" . $nama . "' disabled>"
                    ?>

                  </div>
                </div>
                <br><br>
                <div class="col-md-6">
                  <div class="form-group first">
                    <label class="txtLabel">Tanggal Konsultasi</label>
                    <?php
                    $tanggal = date("d F Y");
                    echo "<input type='text' class='form-control' id='tanggal' value='" . $tanggal . "' disabled>";
                    ?>
                  </div>
                </div>
              </div>
              <br>
              <div class="row" id="jenisPerawatan">
                <div class="col-md-4">
                  <div class="form-group first">
                    <label class="txtLabel">Jenis Perawatan</label>
                    <div class="input-group">
                      <select class="custom-select" id="inputJenis">
                        <option value=''>-- Pilih Jenis Perawatan --</option>
                        <?php
                        $sql = "SELECT * FROM jenis_perawatans";

                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id'] . "' harga='" . $row['standar_harga'] . "' nama='".$row['nama']."'>" . $row['nama'] . $row['standar_harga'] . "</option>";
                          }
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group first">
                    <label class="txtLabel">Posisi</label>
                    <input type='text' class='form-control' id='posisi' value=''>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group first">
                    <label class="txtLabel">Harga</label>
                    <?php
                    echo "<input type='text' class='form-control' id='harga' value=''>";
                    ?>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group first">
                    <label class="txtLabel">Aksi</label>
                    <button class="btn btn-outline-secondary" type="button" id="btnTambah">Tambah</button>
                  </div>
                </div>
              </div>


              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Jenis Perawatan</th>
                    <th scope="col">Posisi Gigi</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody id="daftar">

                </tbody>
              </table>




              <br>
              <div>
                <div class="form-group last mb-3">
                  <label class="txtLabel">Keterangan</label>
                  <textarea class="form-control" style="height: 100px;" placeholder="keterangan" id="keterangan"></textarea>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group first">
                    <label class="txtLabel">Obat</label>
                    <input type="text" class="form-control" id="obat">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group first">
                    <label class="txtLabel">Biaya</label>
                    <input type="text" class="form-control" id="biaya">
                  </div>
                </div>
              </div>
              <input type="checkbox" id="checkTanggalBalik" class="txtLabel"> Tanggal Balik
              <br><br>

              <div id="divTanggalBalik" hidden>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group first">
                      <label class="txtLabel">Dokter</label>
                      <select class="form-control" required id="dokter">
                        <?php
                        $sql = "SELECT * from dokters";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {

                          $curhour = date("H.i");
                          while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["id"] . "'>" . $row["nama"] . "</option>";
                          }
                        }

                        ?>
                      </select>
                      <span class="select-arrow"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label id="test" class="txtLabel">Tanggal Balik</label>
                    <input type="date" value=<?php echo "'" . date('Y-m-d') . "'"; ?> class="form-control" id="tanggal_balik">
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="txtLabel">Jam Datang</label>
                      <select class="form-control" id="jam">
                        <?php
                        $tanggalHariIni = date('Y-m-d');
                        $dokter = 1;
                        $sql = "SELECT * from jams
														where id not in (select jam_id
														from reservasis
														where tanggal_reservasi = ?) and dokter_id = ?";

                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("si", $tanggalHariIni, $dokter);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            if ((strtotime($row["jam"]) >= strtotime($curhour)) || $row['jam'] == 'lainnya') {
                              echo "<option value='" . $row["id"] . "'>" . $row["jam"] . "</option>";
                            }
                          }
                        }

                        ?>
                      </select>
                      <span class="select-arrow"></span>
                    </div>
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
      alert(tanggal);
      if ($("#checkTanggalBalik").is(":checked")) {
        tanggalbalik = $("#tanggal_balik").val();
        jam = $("#jam").val();
      }
      // alert(tanggalbalik);
      // alert(keterangan);
      // alert(obat);
      // alert(biaya);
      // alert(idReservasi);
      // alert(idPengguna);

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
        if (result.result == "success") {
          alert(result.message);
          window.location = "reservationList.php";
        } else {
          alert(result.message);
        }
      });
    });

    $('body').on('change', '#tanggal_balik', function() {
      var tanggalReservasi = $("#tanggal_balik").val();
      var dokter = $("#dokter").val();
      var user = "kinik";

      $.post("WS/check-jam.php", {
        tanggalReservasi: tanggalReservasi,
        dokter: dokter,
        user: user

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

    $('body').on('change', '#dokter', function() {
      var tanggalReservasi = $("#tanggal_balik").val();
      var dokter = $('#dokter').val();
      var user = "klinik";

      $.post("WS/check-doctors.php", {
        tanggalReservasi: tanggalReservasi,
        dokter: dokter,
        user: user

      }).done(function(data) {
        if (data != "warning") {
          $("#jam").html(data);
          $("#btnKonfirmasi").attr("disabled", false);
          // if ($('#datangLangsung').is(":checked")) {
          // 	$("#jam").attr("disabled", true);
          // } else {
          // 	$("#jam").attr("disabled", false);
          // }
          $("#jam").attr("disabled", false);
        } else {
          alert("Silahkan memilih tanggal yang sesuai");
          $("#btnKonfirmasi").attr("disabled", true);
          $("#jam").attr("disabled", true);
        }

      });
    });

    $('body').on('change', '#inputJenis', function() {
      var pilihan = $('#inputJenis option:selected').attr('harga');
      $('#harga').val(pilihan);
    });

    $('body').on('click', '#btnTambah', function() {
      var harga = $('#harga').val();
      var posisi = $('#posisi').val();
      var jenis = $('#inputJenis option:selected').attr('nama');
      var baris = "<tr id='jenisPerawatan' harga='" + harga + "' posisi='" + posisi + "' jenis='" + jenis + "'>";
      baris += "<td>";
      baris += jenis;
      baris += "</td>";
      baris += "<td>";
      baris += posisi;
      baris += "</td>";
      baris += "<td>";
      baris += harga;
      baris += "</td>";
      baris += "<td>";
      baris += "<button class='btn btn-outline-secondary btnHapus' type='button'>Hapus</button>";
      baris += "</td>";
      baris += "</tr>";
      $('#daftar').append(baris);
    });

    $('body').on('click', '.btnHapus', function(){   //untuk hapus <tr> nya
			$(this).parent().parent().remove();
		});
  </script>
</body>

</html>