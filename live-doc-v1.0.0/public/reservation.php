<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Form HTML Template</title>

	<!-- Google font -->
	<link href="http://fonts.googleapis.com/css?family=Playfair+Display:900" rel="stylesheet" type="text/css" />
	<link href="http://fonts.googleapis.com/css?family=Alice:400,700" rel="stylesheet" type="text/css" />

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="assets/css/styleReservation.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body style="background-image:url(assets/img/gallery/hero-bg.png);background-position:top center;background-size:cover;">
	<nav class="py-3" data-navbar-on-scroll="data-navbar-on-scroll">
		<div class="container">
			<a class="navbar-brand" href="index.php"><img src="assets/img/gallery/logo.png" width="118" alt="logo" /></a>
			<a href="index.php"><button type="button" class="btnBack">Back</button></a>
		</div>
	</nav>
	<div id="booking" class="section">
		<div class="container">
			<div class="row">
				<div class="booking-form">
					<div class="booking-bg">
						<div class="form-header">
							<h2>Make your reservation</h2>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate laboriosam numquam at</p>
						</div>
					</div>
					<form>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<span class="form-label">Dokter</span>
									<select class="form-control" required id="dokter">
									<?php
										$conn = new mysqli("localhost", "root", "", "dbmagang");
										
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
								<div class="form-group">
									<span class="form-label">Tanggal Reservasi</span>
									<input class="form-control" type="date" required id="tanggal" value=<?php echo "'" . date('Y-m-d') . "'"; ?>>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<span class="form-label">Jam Datang</span>
									<select class="form-control" id="jam">
										<?php
										$conn = new mysqli("localhost", "root", "", "dbmagang");
										$tanggalHariIni = date('Y-m-d');
										$id1 = 19;
										$id2 = 20;
										$iddokter = 1;
										if ($_SESSION['email'] == "klinik") {
											$sql = "SELECT * from jams
													where id not in (select jam_id 
													from reservasis
													where tanggal_reservasi = ? and jam_id != " . $id1 . " and jam_id != " . $id2 . ") and dokter_id = ".$iddokter;
										} else {
											$sql = "SELECT * from jams
											where id not in (select jam_id
											from reservasis
											where tanggal_reservasi = ?) and id !=" . $id1 . " and id !=" . $id2 . " and dokter_id=". $iddokter;
										}


										$stmt = $conn->prepare($sql);
										$stmt->bind_param("s", $tanggalHariIni);
										$stmt->execute();
										$result = $stmt->get_result();

										if ($result->num_rows > 0) {

											$curhour = date("H.i");
											while ($row = $result->fetch_assoc()) {
												if ((strtotime($row["jam"]) >= strtotime($curhour)) || $row['jam'] == 'lainnya Toton Yuswanto' || $row['jam'] == 'lainnya Umi Yuswanto') {
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
						<?php
						if ($_SESSION['email'] == "klinik") {
							echo "
							<div class='row'>
								<div class='col-md-6' id='divInputNomorTelepon'>
									<div class='form-group'>
										<span class='form-label'>Nomor Telepon</span>
										<input class='form-control' id='nomorTelepon'>
									</div>
								</div>
								<div class='col-md-6' id='divInputNama'>
									<div class='form-group'>
									<span class='form-label'>Nama Lengkap</span>
										<input class='form-control' id='nama'>
									</div>
								</div>
								&nbsp;
							</div>";
						}
						?>



						<div class="row">
							<div class="col-md-10">
								<div class="form-group">
									<span class="form-label">Keluhan</span>
									<textarea class="form-keluhan" cols="50" id="keluhan"></textarea>
								</div>
							</div>
						</div>
						<div class="form-btn">
							<button class="submit-btn" id="btnKonfirmasi">Konfirmasi</button>
						</div>
						<input type="hidden" id="user" value='<?php echo $_SESSION['email'] ?>'>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<script>
	$('body').on('click', '#btnKonfirmasi', function(event) {
		event.preventDefault();
		alert($("#user").val());
		var tanggalReservasi = $("#tanggal").val();
		var keluhan = $("#keluhan").val();
		var jam = $("#jam").val();
		if (jam == null) {
			jam = "";
		}
		if ($("#user").val() == "klinik") {
			if (($("#nomorTelepon").val() == "") || ($("#nama").val() == "")) {
				alert("Mohon mengisi nomor telepon dan nama pasien");
			} else {
				var nama = $("#nama").val();
				var nomor_telepon = $("#nomorTelepon").val();
				$.post("WS/reservasi-insert-offline.php", {
					nomor_telepon: nomor_telepon,
					nama: nama,
					jam: jam,
					tanggalReservasi: tanggalReservasi,
					keluhan: keluhan
				}).done(function(data) {
					var result = JSON.parse(data);
					if (result.result == "success") {
						alert(result.message);
						window.location = "index.php";
					} else {
						alert(result.message);
					}
				});
			}
		} else {
			$.post("WS/reservasi-insert-online.php", {
				jam: jam,
				tanggalReservasi: tanggalReservasi,
				keluhan: keluhan
			}).done(function(data) {
				var result = JSON.parse(data);
				if (result.result == "success") {
					alert(result.message);
					window.location = "index.php";
				} else {
					alert(result.message);
				}
			});
		}

		// if ($('#datangLangsung').is(":checked")){
		// 	jam = 9;
		// }

		// alert("masuk");
		// var nama = $("#nama").val();
		// var nomor_telepon = $("#nomorTelepon").val();
		// alert(nama);
		// alert(nomor_telepon);

		// $.post("WS/reservasi-insert-offline.php", {
		// 	nomor_telepon: nomor_telepon,
		// 	nama: nama,
		// 	jam: jam,
		// 	tanggalReservasi: tanggalReservasi,
		// 	keluhan: keluhan
		// }).done(function(data) {
		// 	var result = JSON.parse(data);
		// 	if (result.result == "success") {
		// 		alert(result.message);
		// 		window.location = "index.php";
		// 	} else {
		// 		alert(result.message);
		// 	}
		// });

	});

	$('body').on('change', '#tanggal', function() {
		var tanggalReservasi = $("#tanggal").val();
		var user = $("#user").val();
		$.post("WS/check-jam.php", {
			tanggalReservasi: tanggalReservasi,
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
				$("#keluhan").attr("disabled", false);
			} else {
				alert("Silahkan memilih tanggal yang sesuai");
				$("#btnKonfirmasi").attr("disabled", true);
				$("#jam").attr("disabled", true);
				$("#keluhan").attr("disabled", true);
			}

		});
	});

	$('body').on('click', '#datangLangsung', function() {
		if ($(this).is(":checked")) {
			$("#divInputNama").prop("hidden", false);
			$("#divInputNomorTelepon").prop("hidden", false);
			// $("#jam").attr("disabled", true);
		} else {
			$("#divInputNama").prop("hidden", true);
			$("#divInputNomorTelepon").prop("hidden", true);
			// $("#jam").attr("disabled", false);
		}
	});
</script>

</html>