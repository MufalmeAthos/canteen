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
                <li class="list-group-item active"><a href="dashboard.php" style="color:white; text-decoration: none;">Dashboard</a></li>
                <li class="list-group-item"><a href="clients.php" style="color:black; text-decoration: none;">Clients</a></li>
                <li class="list-group-item"><a href="manager.php" style="color:black; text-decoration: none;">Manager</a></li>
                <li class="list-group-item"><a href="waiter.php" style="color:black; text-decoration: none;">Waiter</a></li>
                <li class="list-group-item"><a href="chief.php" style="color:black; text-decoration: none;">Chief</a></li>
                <li class="list-group-item"><a href="all_orders.php" style="color:black; text-decoration: none;">All Orders</a></li>
                <!--<li class="list-group-item"><a href="orders.php" style="color:black; text-decoration: none;">Bookings</a></li>-->
                <li class="list-group-item"><a href="logout.php" style="color:black; text-decoration: none;">Logout</a></li>
            </ul>
            </div>

        <div class="col-sm-9 card bg-light">
            <div class="row">
                <div class="col-sm-9"></div>
                <div class="col-sm-3">
                <button type="button" class="btn btn-primary btn-sm mt-3" data-toggle="modal" data-target="#myProduct">
                    Add New Product
                </button>
                </div>
            </div>
            <table class="table table-responsive-sm table-sm table-bordered mt-2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>P.Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>P.Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
                $sql = "SELECT * FROM products";
                $res = $conn->query($sql);
                $n=0;
                if ($res->num_rows > 0) {
                    while ($row = $res->fetch_assoc()) {
                        $n++; ?>
            <tbody>
                <tr>
                    <td><?= $n; ?></td>
                    <td><?= $row['pname']; ?></td>
                    <td><?= $row['category']; ?></td>
                    <td><?= $row['price']; ?></td>
                    <td><?= $row['comment']; ?></td>
                    <td><img src="product_images/<?= $row['photo']; ?>" class="imgs" style="width: 20px; height: 20px;"></td>
                    <td><a href="edit_product.php?edit=<?= $row['pid']; ?>" class="btn btn-outline-info btn-sm">Edit</a>&nbsp;
                    <a href="delete_product.php?delete=<?= $row['pid']; ?>" class="btn btn-outline-warning btn-sm">Delete</a></td>
                    <?php                         
                }
            }
            ?>
                </tr>
            </tbody>
            </table>
            <?php
           

            if (isset($_POST['submit'])) {
                $file = $_FILES['photo']['tmp_name'];
                $mimg = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
                $mph = addslashes($_FILES['photo']['name']);
                
                    move_uploaded_file($_FILES["photo"]["tmp_name"], "product_images/" . $_FILES["photo"]["name"]);
                    $loc = $_FILES["photo"]["name"];

                    $sql = "INSERT INTO products (category, pname, price, comment, photo) 
                                    VALUES ('$_POST[category]', '$_POST[pname]', 
                                    '$_POST[price]', '$_POST[comment]', '$loc')";

                    if ($conn->query($sql) === TRUE) {
                        echo "New Product created successfully";
                        echo'<META HTTP-EQUIV="Refresh" content="2; URL=dashboard.php">';
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                        echo'<META HTTP-EQUIV="Refresh" content="2; URL=dashboard.php">';
                    }
                
            }
            $conn->close();
            
            include 'product.php';
            ?>
        </div>

        </div>
    </div>
</body>
