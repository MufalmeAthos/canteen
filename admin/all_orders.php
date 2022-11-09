<?php
include 'inc/header.php';
include 'inc/session.php';
include 'inc/navbar.php';
//require_once 'inc/fpdf/fpdf.php';
?>
<style type="text/css">
    .imgs:hover {
        -ms-transform: scale(8.5); /* IE 9 */
        -webkit-transform: scale(8.5); /* Safari 3-8 */
        transform: scale(8.5);
        border-radius: 5px;
        }
</style>
<br>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
            <ul class="list-group" >
                <li class="list-group-item "><a href="dashboard.php" style="color:black; text-decoration: none;">Dashboard</a></li>
                <li class="list-group-item"><a href="clients.php" style="color:black; text-decoration: none;">Clients</a></li>
                <li class="list-group-item"><a href="manager.php" style="color:black; text-decoration: none;">Manager</a></li>
                <li class="list-group-item"><a href="waiter.php" style="color:black; text-decoration: none;">Waiter</a></li>
                <li class="list-group-item"><a href="chief.php" style="color:black; text-decoration: none;">Chief</a></li>
                <li class="list-group-item active"><a href="all_orders.php" style="color:white; text-decoration: none;">All Orders</a></li>
                <!--<li class="list-group-item"><a href="orders.php" style="color:black; text-decoration: none;">Bookings</a></li>-->
                <li class="list-group-item"><a href="logout.php" style="color:black; text-decoration: none;">Logout</a></li>
            </ul>
            </div>

        <div class="col-sm-9 card bg-light">
            <div class="row">
                <div class="col-sm-9"></div>
                <div class="col-sm-3">
                <form action="download.php" method="post">
                    <button type="submit" name="print" class="btn btn-sm btn-success mt-2">Download Report</button>
                </form>
                </div>
            </div>
            <table class="table table-responsive-sm table-sm table-bordered mt-2">
            <thead>
                <tr>
                    <th>Order_ID</th>
                    <th>Client Name</th>
                    <th>Phone &numero;</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <?php
                $sql = "SELECT user_order.orderid,order_manager.names,order_manager.email,user_order.itm_name,user_order.qty,user_order.price,user_order.odate 
                FROM user_order INNER JOIN order_manager ON order_manager.orderid=user_order.orderid GROUP BY user_order.itm_name ORDER BY user_order.odate DESC";
                $res = $conn->query($sql);
                $n=0;
                if ($res->num_rows > 0) {
                    while ($row = $res->fetch_assoc()) {
                        $n++; ?>
            <tbody>
                <tr>
                    <td><?= $row['orderid']; ?></td>
                    <td><?= $row['names']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['itm_name']; ?></td>
                    <td><?= $row['qty']; ?></td>
                    <td><?= $row['price']; ?></td>
                    <td><?= $row['odate']; ?></td>
                    <?php                         
                }
            }
            ?>
                </tr>
            </tbody>
            </table>
            
        </div>

        </div>
    </div>
</body>
