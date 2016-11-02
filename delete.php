<?php

include ('dbconfig.php');

$del = $_GET['id'];
echo $del;
for ($x = 0; $x < count($del); $x++) {
    $sql = "DELETE FROM form WHERE id='$del'";
    mysql_query($sql);
    mysql_close($connector);
    //---execuste the query
}
?>
