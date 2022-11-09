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
                <li class="list-group-item "><a href="clients.php" style="color:black; text-decoration: none;">Clients</a></li>
                <li class="list-group-item" ><a href="manager.php" style="color:black; text-decoration: none;">Manager</a></li>
                <li class="list-group-item active"><a href="waiter.php" style="color:white; text-decoration: none;">Waiter</a></li>
                <li class="list-group-item"><a href="chief.php" style="color:black; text-decoration: none;">Chief</a></li>
                <!--<li class="list-group-item"><a href="orders.php" style="color:black; text-decoration: none;">Orders</a></li>
                <li class="list-group-item"><a href="orders.php" style="color:black; text-decoration: none;">Bookings</a></li>-->
                <li class="list-group-item"><a href="logout.php" style="color:black; text-decoration: none;">Logout</a></li>
            </ul>
            </div>
            <div class="col-sm-7  bg-light">
                
                <table class="table table-responsive-sm table-sm table-bordered mt-5">
                <thead>
                    <tr>
                        <th>W.Names</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php
                    $sql = "SELECT * FROM waiter";
                    $res = $conn->query($sql);
                    $n=0;
                    if ($res->num_rows > 0) {
                        while ($row = $res->fetch_assoc()) {
                             ?>
                <tbody>
                    <tr>
                        <td><?= $row['names']; ?></td>
                        <td><?= $row['phone']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['status']; ?></td>
                        <td>
                            <form action="" method="post">
                            <button type="submit" name="edit" class="btn btn-sm btn-info">Edit</button>
                            </form>
                        </td>
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
            <div class="col-sm-3 d-absolute">
                <div class="alert alert-info text-center"><strong>Add New Waiter</strong></div>
                <form action="" class="mt-3" method="post">
                    <?php
                    $ps = "976350140133435206295808503";
                    $pc = substr(str_shuffle($ps),0,6);
                    ?>
                    <input type="hidden" name="password" value="<?= $pc; ?>">
                    <input type="hidden" name="status" value="Active">
                    <div class="form-group">
                        <label for="pwd">Names:</label>
                        <input type="text" class="form-control form-control-sm" name="names" required>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Email:</label>
                        <input type="email" class="form-control form-control-sm" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Phone &numero;:</label>
                        <input type="number" class="form-control form-control-sm" name="phone" required>
                    </div>
                    <button type="submit" name="add" class="btn btn-primary btn-sm">Save Records</button>
                </form>
            </div>
        </div>
        <?php
        use PHPMailer\PHPMailer\PHPMailer;

        require_once '../assets/phpmailer/Exception.php';
        require_once '../assets/phpmailer/PHPMailer.php';
        require_once '../assets/phpmailer/SMTP.php';
        $mail = new PHPMailer(true);
        if (isset($_POST['add'])) {
        $names = $_POST['names'];
        $em = $_POST['email'];
        $pass = $_POST['password'];
        $sql = "INSERT INTO `waiter`( `names`, `email`, `phone`, `password`, `status`)
         VALUES ('$_POST[names]','$_POST[email]','$_POST[phone]','$_POST[password]','$_POST[status]')";
         $res = mysqli_query($conn,$sql);
         if ($res === TRUE) {
            $msg = "DEAR ,".$names."Your Login Credetials on SMART CANTEEN are \n (".$em.") as username and \n".$pass." \n as Password";
            //SEND EMAIL TO CLIENT
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'muhirejojo1@gmail.com'; // Gmail address which you want to use as SMTP server
                $mail->Password = '07802890'; // Gmail address Password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = '587';
                $mail->FromName = 'SMART CANTEEN';


                $mail->setFrom('muhirejojo1@gmail.com', 'SMART CANTEEN'); // Gmail address which you used as SMTP server
                $mail->addAddress($em); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

                $mail->isHTML(true);
                $mail->Subject = ' SMART CANTEEN Account Credentials';
                $mail->Body = $msg;

                $mail->send();
                $alert = '<div class="alert-success">
                                <span>Message Sent! Thank you for contacting us.</span>
                                </div>';
            } catch (Exception $ex) {
                $alert = '<div class="alert-error">
                                <span>' . $ex->getMessage() . '</span>
                            </div>';
            } 
            echo '
            <div class="alert alert-success">
                <strong>Success!&nbsp;</strong> Record Saved
            </div>';
            echo '<META HTTP-EQUIV="Refresh" content="2; URL=">';
         }
         else {
            echo '
            <div class="alert alert-danger">
                <strong>Error!&nbsp;</strong> Data not Saved
            </div>';
         }
        }
        ?>
    </div>
</body>