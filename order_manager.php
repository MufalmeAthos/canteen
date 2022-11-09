<?php
include 'dbconfig.php';
             session_start();
            use PHPMailer\PHPMailer\PHPMailer;

            require_once 'assets/phpmailer/Exception.php';
            require_once 'assets/phpmailer/PHPMailer.php';
            require_once 'assets/phpmailer/SMTP.php';
            $mail = new PHPMailer(true); 

            if ($_SERVER['REQUEST_METHOD']=="POST") {
                if (isset($_POST['place-order'])) {
                    $ps = "976350140133435206295808503";
                    $pc = substr(str_shuffle($ps),0,6);
                    $date = date('Y-m-d');
                    $names = $_POST['fname'].' '.$_POST['lname'];
                    $em = $_POST['email'];
                    $sql1 = "INSERT INTO `order_manager`(`orderid`, `names`, `phone`, `email`, `location`, `address`,`status`)
                     VALUES
                      ('$pc','$names','$_POST[email]','$_POST[phone]','$_POST[location]',
                      '$_POST[ipad]','$_POST[status]')";
                      if (mysqli_query($conn,$sql1)) {
                          $orderid = $pc;
                          $sql2 = "INSERT INTO `user_order`(`orderid`, `itm_name`, `price`, `qty`, `address`, `odate`, `status`, `stat`, `status2`)
                          VALUES
                           (?,?,?,?,'$_POST[ipad]','$date','pending','pending','pending')";
                            $stmt = mysqli_prepare($conn,$sql2);

                            if ($stmt) {
                                mysqli_stmt_bind_param($stmt,"isii",$orderid,$itm_name,$price,$qty);
                                foreach ($_SESSION['cart'] as $key => $value) {
                                    $itm_name=$value['Pname'];
                                    $price = $value['price'];
                                    $qty = $value['quantity'];
                                    mysqli_stmt_execute($stmt);
                                }
                                unset($_SESSION['cart']);
                                $msg = "DEAR ,".$names."Your Order of \n (".$qty.")".$itm_name." \n Is Placed Successfully";
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


                                    $mail->setFrom('muhirejojo1@gmail.com', 'ST Card'); // Gmail address which you used as SMTP server
                                    $mail->addAddress($em); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

                                    $mail->isHTML(true);
                                    $mail->Subject = ' SMART CANTEEN Order Receipt';
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
                                echo"<script>
                                alert('Order Placed');
                                window.location.href='pay.php';
                                </script>";

                                
                            }
                            else {
                                echo"<script>
                                alert('Order not Placed');
                                window.location.href='pay.php';
                                </script>";
                            }
                      }
                      else {
                        echo"<script>
		                alert('Order not Placed');
		                window.location.href='';
		                </script>";
                    }
                }
            }
            ?>