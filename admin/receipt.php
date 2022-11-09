<?php
include 'inc/header.php';

                             
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script language="javascript">
        function printpage()
            {
                window.print();
            }
        </script>
</head>
<body onload="window.print()">
    <div class="continer mt-5">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-5 card">
                <p><strong>Date:&nbsp;<?= date("Y/m/d");?></strong></p>
                <p><strong>SMART CANTEEN</strong></p>
            <div class="table-responsive mt-2">
                <table class="table table-bordered">
                <thead>
                    <tr>
                    <th colspan="4"><center>Client Reciept</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                $id = $_GET['oid'];

                $sql = "SELECT * FROM user_order WHERE orderid = '$id' AND status='Approved' and stat='Approved' LIMIT 1 ";
                $res = $conn->query($sql);
                    //$n=0;
                    if ($res->num_rows > 0) {
                        while ($row = $res->fetch_assoc()) {
                            $sql1 = mysqli_query($conn,"SELECT * FROM order_manager WHERE orderid = '$id' ");
                            $rows =mysqli_fetch_array($sql1);
                            ?>
                    <tr>
                    <td><b> Names:</b></td>
                    <td><?= $rows['names']; ?></td>
                    </tr>
                    <tr>
                    <td><b> Phone:</b></td>
                    <td><?= $rows['email']; ?></td>
                    </tr>
                    <tr>
                    <td><b> Product:</b></td>
                    <td><?= $row['itm_name']; ?></td>
                    </tr>
                    <tr>
                    <td><b> Quantity:</b></td>
                    <td><?= $row['qty']; ?></td>
                    </tr>
                    <tr>
                    <td><b> Amount:</b></td>
                    <td><?= $row['price']; ?></td>
                    </tr>
                </tbody>
                </table>
                <p><strong>Thank you for working with us.</strong></p>
                <?php
            }
        }
        ?>
  </div>
            </div>
        </div>
    </div>
    
</body>
</html>