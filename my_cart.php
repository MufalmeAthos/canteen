<?php
include 'assets/header.php';
//session_start();
//session_destroy();
?>
<br><br><br>

<div class="container-fluid mt-5" style="background-color:white; height:100%">
	<div class="container py-3">
        <br>
    <div class="row">
		<div class="col-sm-12 card-header bg-info"> <center>My Cart</center></div>
		<br>
        <div class="col-sm-7 mt-4">
            <table class="table table-bordered table-sm table-responsive-sm mt-4" style="color:black;">
                <thead class="text-center">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Item</th>
                    <th scope="col">price</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Sub.Total</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    $total = 0;
                    if (isset($_SESSION['cart'])) {
                        
                        foreach ($_SESSION['cart'] as $key => $value)
                        {
                            //print_r($value);
                            $sn = $key+1;
                            $total = $total+$value['price'];
                            echo "
                            <tr>
                                <td>$sn</td>
                                <td>$value[Pname]</td>
                                <td>$value[price]<input type='hidden' class='iprice' value='$value[price]'></td>
                                <td>
                                    <form action='addtocart.php' method='POST'>
                                        <input type='number' name='mod_qty' class='text-center iquantity' onchange='this.form.submit()' value='$value[quantity]' min='1' max='10'>
                                        <input type='hidden' name='Pname' value='$value[Pname]'>
                                    </form>
                                </td>
                                <td class='itotal'></td>
                                <td>
                                    <form action='addtocart.php' method='POST'>
                                        <button name='remove_to_cart' class='btn btn-outline-danger btn-sm'>REMOVE</button>
                                        <input type='hidden' name='Pname' value='$value[Pname]'>
                                    </form>
                                </td>
                            </tr>
                            ";
                        }
                    }
                    ?>
                </tbody>
            </table>
            <a href="index.php" class="btn btn-sm btn-warning mb-3" style="width:24%;">Continue Shopping</a>
            
        </div>
        <div class="col-sm-4 bg-light mt-4 ml-2 card" style="color:black;">
            <h3>Total:</h3>
            <h5 id="gtotal" style="font-weight:700; font-size:32px;"><?= number_format($total,2); ?></h5>

            <!-- checkout form -->
            <?php
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
               ?>
               <div class="card mb-2">
                   <div class="cart-title txt-center">
                      <center><strong><h5 style="text-decoration:underline;">Billing Details</h5></strong></center>
                   </div>
                   <div class="card-body">
                   <?php
                    $ip=@$_SERVER['REMOTE_ADDR'];
                   ?>
                       <form action="order_manager.php" method="post">
                           <div class="row">
                               <div class="col-sm-6">
                                   <div class="form-group">
                                       <label for="">Firstname</label>
                                       <input type="text" name="fname" class="form-control form-control-sm" required>
                                   </div>
                               </div>
                               <div class="col-sm-6">
                                   <div class="form-group">
                                       <label for="">Lastname</label>
                                       <input type="text" name="lname" class="form-control form-control-sm" required>
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col-sm-12">
                                   <div class="form-group">
                                       <label for="">Email</label>
                                       <input type="email" name="email" class="form-control form-control-sm" required>
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col-sm-12">
                                   <div class="form-group">
                                       <label for="">Phone</label>
                                       <input type="number" name="phone" class="form-control form-control-sm" required>
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col-sm-12">
                                   <div class="form-group">
                                       <label for="">Location</label>
                                       <input type="text" name="location" class="form-control form-control-sm" required>
                                   </div>
                               </div>
                           </div>
                           <?php 
                            $date = date("Y/m/d");
                            //echo $date;
                            ?>
                            <input type="hidden" name="odate" value="<?= $date; ?>">
                           <input type="hidden" name="status" value="unpaid">
                           <input type="hidden" name="ipad" value="<?= $ip; ?>">
                           <button type="submit" class="btn btn-sm btn-primary" name="place-order"> Place Order & Continue</button>
                       </form>
                   </div>
               </div>
               <?php } ?>
        </div>
	</div>
    </div>
</div>
<script>
        var gt=0;
        var iprice=document.getElementsByClassName('iprice');
        var iquantity=document.getElementsByClassName('iquantity');
        var itotal=document.getElementsByClassName('itotal');
        var gtotal=document.getElementById('gtotal');

        function subTotal() {
            gt=0;
            for ( i = 0; i < iprice.length; i++)
             {
                itotal[i].innerText=(iprice[i].value) * (iquantity[i].value);
                gt=gt+(iprice[i].value) * (iquantity[i].value);
            }
            gtotal.innerText=gt;
        }
        subTotal();
</script>