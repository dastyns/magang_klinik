<?php
$key = $_POST['key'];
if ($key == "") {
    $key = "%";
} else {
    $key = "%" . $key . "%";
}
$conn = new mysqli("localhost", "root", "", "dbmagang");

$sql = "SELECT P.nama, date(KO.tanggal_konsultasi) as tanggalTerakhir, KO.tanggal_balik, P.id
FROM penggunas as P
INNER JOIN reservasis AS R on P.id = R.id_pengguna
INNER JOIN konsultasis as KO on R.id = KO.id_reservasi
WHERE KO.id in (
SELECT MAX(K.id)
FROM konsultasis as K
INNER JOIN reservasis AS R ON R.id = K.id_reservasi
GROUP BY R.id_pengguna) and P.nama like ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $key);
$stmt->execute();
$result = $stmt->get_result();

echo "<table class='table table-responsive-xl'>
<tr class='tabel'>
<th><h6>Nama Pasien</h6></th>
<th><h6>Tanggal Konsultasi Akhir</h6></th>
<th><h6>Status</h6></th>
<th>&nbsp;</th>
</tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr class='alert tabel' role='alert'>";
        echo "<td class='tabel'>" . $row["nama"] . "</td>";
        echo "<td class='tabel'>" . $row["tanggalTerakhir"] . "</td>";
        if ($row["tanggal_balik"] != NULL) {
            echo "<td class='status'><span class='active'>" . $row["tanggalTerakhir"] . "</span></td>";
        } else {
            echo "<td class='status'><span class='waiting'>" . "Selesai" . "</span></td>";
        }

        echo "<td class='tabel'><a href='detilkonsuldokter.php?idPengguna=" . $row["id"] . "'><button type='button' class='btnDetil'>Detail</button></a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
