

<!DOCTYPE html>
<html lang="en">
<?php
include 'dbconfig.php';
$ipad=@$_SERVER['REMOTE_ADDR'];

?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Restaurantly Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span>+250 784 636 301</span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Fri: 09AM - 23PM</span></i>
      </div>

      
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.php">Smart Canteen</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
          <li><a class="nav-link scrollto" href="#specials">Specials</a></li>
          <li><a class="nav-link scrollto" href="#events">Events</a></li>
          <li><a class="nav-link scrollto" href="#chefs">Chefs</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
          <!--
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="nav-link " href="my_cart.php" target="_blank"><img src="crt.png" height="20" width="20"><span style="color:rgb(226, 171, 0); margin-top: -15px;">
            <?php
            $count = 0;
            if (isset($_SESSION['cart'])) {
              $count = count($_SESSION['cart']);
            }
            echo $count;
            ?>
          </span></a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
     <!-- <a href="#book-a-table" class="book-a-table-btn scrollto d-none d-lg-flex">Book a table</a>-->

    </div>
  </header><!-- End Header -->
<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-sm-12">
           
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-4">
            <?php
            $sql = mysqli_query($conn,"SELECT * FROM `order_manager` WHERE `address`='$ipad' AND `status`='unpaid'");
            $rows = mysqli_fetch_array($sql);

            $tam=0;
            $sql2 = "SELECT * FROM `user_order` WHERE `orderid`='$rows[orderid]' AND `address`='$rows[address]'";
            $result = mysqli_query($conn,$sql2);
            while($row = mysqli_fetch_assoc($result)){
            $tam += ($row['price'] * $row['qty']);
            }
           
            ?>
<br><br>
            
                  </td>
                </tr>
                
              </tbody>
            </table>
            <form action="" method="post" class="my-3">
              <input type="hidden" id="amount" name="amount" value="<?= $tam; ?>"/>
              <input type="hidden" id="email" name="email" value="<?= $rows['phone']; ?>"/>
              <input type="hidden" id="firstname" name="firstname" value="<?= $rows['names']; ?>"/>
              <input type="hidden" id="phonenumber" name="phonenumber" value="<?= $rows['email']; ?>"/>
              <input type="hidden" id="ref" name="ref" value="<?= $rows['orderid']; ?>"/>
              <button type="button" id="start-payment-button"  class="btn btn-primary btn-sm " onclick="makePayment()">Pay Now and Continue</button>
            </form>
            <script src="https://checkout.flutterwave.com/v3.js"></script>

            <script>
              function makePayment() {
                FlutterwaveCheckout({
                  public_key: "FLWPUBK_TEST-21c0a273ce3288f7cd495fafdc5f5d06-X",
                  tx_ref: document.getElementById("ref").value,
                  amount: document.getElementById("amount").value,
                  currency: "RWF",
                  payment_options: "",
                  redirect_url: "http://localhost/canteen/success.php",
                  meta: {
                    consumer_id: 23,
                    consumer_mac: "92a3-912ba-1192a",
                  },
                  customer: {
                    email: document.getElementById("email").value,
                    phone_number: document.getElementById("phonenumber").value,
                    name: document.getElementById("firstname").value,
                  },
                  customizations: {
                    title: "Canteen",
                    description: "Payment for an awesome cruise",
                  },
                });
              }
            </script>
        </div>
    </div>
</div>
