<?php

// $curtime = strtotime("14.00");
// $comtime = strtotime("15.00");
// if ($comtime > $curtime){
//     echo "lebih kecil";
// }
date_default_timezone_set("Asia/Jakarta");
$tanggal = date("d");
$jam = date("H.i");
echo $tanggal . " " . $jam;


?>