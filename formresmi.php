<?php
include 'dbconfig.php';
?>
<html>
    <head>
        <title>Schedule</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" type = "text/css" href = "main/js/lib/datatable/jquery.dataTables.min.css">
        <script type="text/javascript" src="main/js/lib/jquery/jquery-1.12.4.min.js"></script>
        <script type="text/javascript" src="main/js/lib/datatable/jquery.dataTables.min.js"></script> 
        <script type="text/javascript" src="main/js/lib/datatable/bootstrap.min.js"></script> 
        <link rel="stylesheet" href="main/css/lib/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="main/css/lib/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="main/css/formresmi.css">
        <link rel="stylesheet" href="main/css/table.css">
        <script src="main/js/formresmi.js" ></script>

        <style>
            .content22{
                margin-left: 0px;
                margin-right: 30px;
            }
            .headerCoba{
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <div class="content22">
            <div class="headerCoba">
                <?php
                $sql_query = "SELECT * FROM infocust";
                $result_set = mysql_query($sql_query);
                $row = mysql_fetch_array($result_set);
                ?>
                <ul>
                    <li><label>Transaction Code</label>&nbsp;
                        <input style = "margin-left:15px;border:none; border-bottom: solid black; border-width: 0.1px;" value="<?php echo $row['codetransaction']; ?>"/></li>
                    <li><label>Transaction Name</label>&nbsp;
                        <input style = "margin-left:12px;;border:none; border-bottom: solid black; border-width: 0.1px;" value="<?php echo $row['transactionname']; ?>"/></li>
                    <li style = "margin-top:5px;"><label>Customer Name</label>&nbsp;
                        <input style = "margin-left:25px; border:none; border-bottom: solid black; border-width: 0.1px;" value="<?php echo $row['customername']; ?>"/></li>
                    <li style = "margin-top:5px;"><label>Transaction Date</label>&nbsp;
                        <input style = "margin-left:20px;border:none; border-bottom: solid black; border-width: 0.1px;" value="<?php echo $row['datetransaction']; ?>"/></li>
                    <li style = "margin-top:5px;"><label>Address</label>&nbsp;
                        <input style = "margin-left:77px;border:none; border-bottom: solid black; border-width: 0.1px; width: 400px;" value="<?php echo $row['address']; ?>"/></li>
                </ul>
                <ul style="margin-left:-30px;">

                    <li style = "margin-left: 0px; margin-right: 20px; margin-bottom: 20px; border-bottom: solid black"></li>
                </ul>
            </div>
            <form action="inserttable.php" method="post" id="formtable">
                <table style="margin-left: 20px;margin-right: 20px;" class="table table-hover table-bordered" id="example" class="display" cellspacing="0" width="100%" >
                    <thead>
                        <tr>
                            <th style="color:black; background-color: white;text-align:center">&nbsp;</th>
<!--                            <th style="color:black; background-color: white;text-align:center">No</th>-->
                            <th style="color:black; background-color: white;text-align:center">Kelas</th>
                            <th style="color:black; background-color: white;text-align:center">Senin</th>
                            <th style="color:black; background-color: white;text-align:center">Selasa</th>
                            <th style="color:black; background-color: white;text-align:center">Rabu</th>
                            <th style="color:black; background-color: white;text-align:center">kamis</th>
                            <th style="color:black; background-color: white;text-align:center">jumat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = mysql_query("SELECT * FROM form ");
                        $indexinsert = 0;

                        $dServer = array();
                        $rows = array();
                        while ($row = mysql_fetch_assoc($result)) {
                            $rows[] = $row;
                        }
                        ?>   
                    <script type='text/javascript'>
                        var nomor = 1;
                        var rows = <?php echo json_encode($rows); ?>;
                        var rows_arr = rows.toString().split(',');
                        for (var i = 0; i < rows_arr.length; i++) {
                            document.write("<tr><td><input type='checkbox' class='cekas' name='cek[] id='cek[]'  value='" + rows[i]['id'] + "'  /></th>",
                                    "<td><input type='text' value='" + rows[i]['kelas'] + "' style='width:60px;' name='kelasas[]'></th>",
                                    "<td><input type='text' value='" + rows[i]['senin'] + "'style='width:260px;'  name='seninas[]'><ul><li><input type='text' value='" + rows[i]['detail'] + "'style='width:100%;' name='detailas[]'></li></ul></td>",
                                    "<td><input type='text' value='" + rows[i]['selasa'] + "'style='width:100%;' name='selasaas[]'></td>",
                                    "<td><input type='text' value='" + rows[i]['rabu'] + "'style='width:100%;' name='rabuas[]'></td>",
                                    "<td><input type='text' value='" + rows[i]['kamis'] + "'style='width:100%;' name='kamisas[]'></td>",
                                    "<td><input type='text' value='" + rows[i]['jumat'] + "'style='width:100%;' name='jumatas[]'></td></tr>");
                        }
                    </script>
                    </tbody>
                </table>
                <div style="margin-left:10px;" class="btn-group">
                    <button type="button" class="btn btn-link" id="addRow"><img src="main/img/icon/add.png" style="height:25px; width: 25px" /><br/>Create</button>
                    <button type="button" class="btn btn-link"id="deleted"><img src="main/img/icon/delete.png" style="height:25px;width: 25px" /><br/>Delete</button>
                    <button type="button" class="btn btn-link" id="updated"><img src="main/img/icon/save.png" style="height:25px;width: 25px" /><br/>Save</button>
                    <button type="button" class="btn btn-link" onclick="aprint();"><img src="main/img/icon/preview.png" style="height:25px;width: 25px" /><br/>Preview</button>
                </div>
            </form>
            <?php
            $sql_query = "SELECT * FROM infocust";
            $result_set = mysql_query($sql_query);
            $row = mysql_fetch_array($result_set);
            ?>
            <ul style="margin-left:-15px; margin-top: 20px; margin-bottom: 40px;">
                <li style="margin-top:10px">
                    <label>Aprroved By</label>&nbsp;<input style = "text-align: center;width:150px;border:none; border-bottom: solid black; border-width: 0.1px;" value="<?php echo $row['approvera']; ?>" />&nbsp;<input style = "border:none; border-bottom: solid black; border-width: 0.1px; text-align: center;width:100px" value="<?php echo $row['approverdatea']; ?>" />
                    <label id="labelApp" style="margin-left:600px">Approved By</label>&nbsp;<input style = "text-align: center;width:150px;border:none; border-bottom: solid black; border-width: 0.1px;" value="<?php echo $row['approverb']; ?>" />&nbsp;<input style = "text-align: center;border:none; border-bottom: solid black; border-width: 0.1px; width:100px" value="<?php echo $row['approverdateb']; ?>" />             
                </li>
            </ul>
        </div>
        <?php mysql_close($connector); ?>  
    </body>
</html>
