<?php
 

include ('dbconfig.php');
$kelas = count($_POST["kelas"]);
$senin = count($_POST["senin"]);
$selasa = count($_POST["selasa"]);
$rabu = count($_POST["rabu"]);
$kamis = count($_POST["kamis"]);
$jumat = count($_POST["jumat"]);
$detail = count($_POST["detail"]);
if ($kelas > 0) {
    for ($i = 0; $i < $kelas; $i++) {
        if (trim($_POST["kelas"][$i] != '')) {
            $sql = "INSERT INTO form (kelas,senin,selasa,rabu,kamis,jumat,detail)VALUES ('" . mysql_real_escape_string($_POST["kelas"][$i]) . "','" . mysql_real_escape_string($_POST["senin"][$i]) . "','" . mysql_real_escape_string( $_POST["selasa"][$i]) . "','" . mysql_real_escape_string( $_POST["rabu"][$i]) . "','" . mysql_real_escape_string( $_POST["kamis"][$i]) . "','" . mysql_real_escape_string($_POST["jumat"][$i]) . "','" . mysql_real_escape_string( $_POST["detail"][$i]) . "')";
            mysql_query( $sql);
        }
    }
   
} else {
    echo "Please Enter Name";
}

// Close connection
mysql_close($connector);
header('http://localhost/ahmad/form/formresmi.php');
?>

<!--  $('#deleted').on('click', function () {
                    alert('a');
                    $('input[name="cek[]"]:checked').each(function () {
                        alert('This entry will be deleted: ' + this.value); // this will alert you the value what you get. After finisgin to get correct value you can delete this
                        $.ajax({
                            type: "GET",
                            url: "delete.php",
                            data: "id=" + this.value
                        });
                        location.reload();
                    });
                });
                $("#example").submit(function (e) {
                    alert('a');

                    $('input[name="cek[]"]:checked').each(function () {
                        alert('This entry will be deleted: ' + this.value); // this will alert you the value what you get. After finisgin to get correct value you can delete this
//                       
                        $.ajax({
                            type: "post",
                            url: "inserttable.php",
                            data: $('#example').serialize()
                        });


                        console.log(this);

                    });
                    e.preventDefault();
                });
                $('#updated').on('click', function () {
                    alert('a');
                 
                    $('input[name="cek[]"]:checked').each(function () {
                        alert('This entry will be update: ' + this.value); // this will alert you the value what you get. After finisgin to get correct value you can delete this

                         console.log($('#formtable').serialize())
                        $.ajax({
                            type: "post",
                            url: "update.php",
                            data: $('#formtable').serialize()
                        });

                    });
                });-->