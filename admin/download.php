<?php
require_once 'inc/fpdf/fpdf.php';
require_once 'inc/dbconfig.php';
$sql = "SELECT user_order.orderid,order_manager.names,order_manager.email,user_order.itm_name,user_order.qty,user_order.price,user_order.odate 
    FROM user_order INNER JOIN order_manager ON order_manager.orderid=user_order.orderid GROUP BY user_order.itm_name ORDER BY user_order.odate DESC";
     $data = mysqli_query($conn,$sql);
     
     if (isset($_POST['print'])) {
        $pdf = new FPDF('L','mm','a4');
        $pdf->SetFont('arial','b','14');
        $pdf->AddPage();
        $pdf->Cell('280','70','ORDER REPORTS','0','1','C');
        $pdf->Ln(-20);
        $pdf->Cell('25', '8', 'Order ID','1','0','C');
        $pdf->Cell('55', '8', 'Client Names','1','0','C');
        $pdf->Cell('40', '8', 'Phone Number','1','0','C');
        $pdf->Cell('60', '8', 'Product','1','0','C');
        $pdf->Cell('30', '8', 'Quantity','1','0','C');
        $pdf->Cell('30', '8', 'Amount','1','','C');
        $pdf->Cell('30', '8', 'Date','1','1','C');

        $pdf->SetFont('arial','','12');

        while($row = mysqli_fetch_assoc($data))
            {
                $pdf->cell('25', '8', $row['orderid'],'1','0','L');
                $pdf->cell('55', '8', $row['names'],'1','0','L');
                $pdf->cell('40', '8', $row['email'],'1','0','L');
                $pdf->cell('60', '8', $row['itm_name'],'1','0','L');
                $pdf->cell('30', '8', $row['qty'],'1','','L');
                $pdf->cell('30', '8', $row['price'],'1','','L');
                $pdf->cell('30', '8', $row['odate'],'1','1','L');
         }
    $pdf->Output();

     }
?>