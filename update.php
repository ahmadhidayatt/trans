<?php

include ('dbconfig.php');
$cek = count($_POST["cek"]);
$kelas = count($_POST["kelasas"]);
$senin = count($_POST["seninas"]);
$selasa = count($_POST["selasaas"]);
$rabu = count($_POST["rabuas"]);
$kamis = count($_POST["kamisas"]);
$jumat = count($_POST["jumatas"]);
$detail = count($_POST["detailas"]);
if ($cek > 0) {
    for ($i = 0; $i < $kelas; $i++) {

        $sql = "UPDATE form SET kelas='" . mysql_real_escape_string($_POST["kelasas"][$i]) . "',senin='" . mysql_real_escape_string($_POST["seninas"][$i]) . "',selasa='" . mysql_real_escape_string($_POST["selasaas"][$i]) . "',rabu='" . mysql_real_escape_string($_POST["rabuas"][$i]) . "',kamis='" . mysql_real_escape_string($_POST["kamisas"][$i]) . "',jumat='" . mysql_real_escape_string($_POST["jumatas"][$i]) . "',detail='" . mysql_real_escape_string($_POST["detailas"][$i]) . "'  where id ='" . mysql_real_escape_string($_POST["cek"][$i]) . "'";
        mysql_query($sql);
    }
} else {
    echo "Please Enter Name";
}

// Close connection
mysql_close($connector);
?>