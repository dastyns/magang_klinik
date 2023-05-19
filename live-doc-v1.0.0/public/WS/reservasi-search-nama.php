<?php
$key = $_POST['key'];
if($key == ""){
    $key = "%";
}
else{
    $key = "%".$key."%";
}
$conn = new mysqli("localhost", "root", "", "dbmagang");

$sql = "SELECT P.nama, date(R.tanggal_reservasi) as tanggalReservasi, J.jam, R.keluhan, R.id
    FROM penggunas as P 
    INNER JOIN reservasis as R on P.id = R.id_pengguna
    INNER JOIN jams as J on J.idjam = R.jam_idjam
    WHERE date(R.tanggal_reservasi) >= curdate() and R.status_reservasi='1' and P.nama like ?
    order by date(R.tanggal_reservasi), J.jam";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $key);
$stmt->execute();
$result = $stmt->get_result();
echo "<table class='table table-responsive-xl'>
<tr class='tabel'>
<th><h6>Nama Pasien</h6></th>
<th><h6>Tanggal Reservasi</h6></th>
<th><h6>Jam Reservasi</h6></th>
<th><h6>Keluhan</h6></th>
<th>&nbsp;</th>
</tr>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr class='alert tabel' role='alert'>";
        echo "<td class='tabel'>" . $row["nama"] . "</td>";
        echo "<td class='tabel'>" . $row["tanggalReservasi"] . "</td>";
        echo "<td class='tabel'>" . $row["jam"] . "</td>";
        echo "<td class='tabel'>" . $row["keluhan"] . "</td>";
        echo "<td class='tabel'><a href='insertkonsul.php?idReservasi=" . $row["id"] . "'><button type='button' class='btnDetil' idReservasi='" . $row["id"] . "'>Konfirmasi</button></a></td>";
        echo "</tr>";
    }
    echo"</table>";
}

?>
