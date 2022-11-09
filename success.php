<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Restaurantly</title>
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
<?php
include 'dbconfig.php';
$id = $_GET['tx_ref'];

$sql = mysqli_query($conn, "SELECT * FROM `order_manager` WHERE `orderid`='$id'");
$row = mysqli_fetch_array($sql);
//echo '25'.$row['email'];
$c = $row['names'];
$to = '25' . $row['email'];
$msg = " Dear, " . $c . " Your order have been paid successfully ";
$sql1 = mysqli_query($conn,"UPDATE `order_manager` SET `status`='Paid' WHERE `orderid`='$id'");
if ($sql1 === true) {

    function sendSMS($to, $msg)
    {
        $from= "CANTEEN";
        $user=14;
        $pwd="0722";
        $to=$to;
        $msg=$msg;
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://sms.nostress.vip/api.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('to' => $to,'from' => $from,'user' => $user,'pwd' => $pwd,'sms' => $msg),
        CURLOPT_HTTPHEADER => array(
        'x-api-key: T3VtZ3lBcmxOTFBDbW54a3ZDemE='),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        //echo $response;
        }

        $to= $to;
        $msg=$msg;
        sendSMS($to,$msg);


}

echo '<META HTTP-EQUIV="Refresh" content="2; URL=index.php">';
?>