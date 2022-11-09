<?php
include 'inc/header.php';
include 'inc/session.php';
include 'inc/navbar.php';
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
                <li class="list-group-item active"><a href="clients.php" style="color:white; text-decoration: none;">Clients</a></li>
                <li class="list-group-item"><a href="manager.php" style="color:black; text-decoration: none;">Manager</a></li>
                <li class="list-group-item"><a href="waiter.php" style="color:black; text-decoration: none;">Waiter</a></li>
                <li class="list-group-item"><a href="chief.php" style="color:black; text-decoration: none;">Chief</a></li>
                <!--<li class="list-group-item"><a href="orders.php" style="color:black; text-decoration: none;">Orders</a></li>
               <li class="list-group-item"><a href="orders.php" style="color:black; text-decoration: none;">Bookings</a></li>-->
                <li class="list-group-item"><a href="logout.php" style="color:black; text-decoration: none;">Logout</a></li>
            </ul>
            </div>
            <div class="col-sm-9  bg-light">
                
                <table class="table table-responsive-sm table-sm table-bordered mt-5">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>C.Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Location</th>
                    </tr>
                </thead>
                <?php
                    $sql = "SELECT * FROM order_manager";
                    $res = $conn->query($sql);
                    $n=0;
                    if ($res->num_rows > 0) {
                        while ($row = $res->fetch_assoc()) {
                             ?>
                <tbody>
                    <tr>
                        <td><?= $row['orderid']; ?></td>
                        <td><?= $row['names']; ?></td>
                        <td><?= $row['phone']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['location']; ?></td>
                        <td><a href="v_order.php?id=<?= $row['orderid']; ?>" class=" btn btn-sm btn-outline-primary">view_orders</a></td>
                        <?php                         
                    }
                }
                else {
                    echo '
                    <div class="alert alert-info">
                        <strong>Info!&nbsp;</strong> No Data Found
                    </div>';
                }
                ?>
                    </tr>
                </tbody>
                </table>
                
            </div>
        </div>
    </div>
</body>