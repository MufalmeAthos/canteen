<?php
include 'inc/header.php';
$id = $_GET['id'];

if (isset($_POST['approve'])) {
  $sql = "UPDATE `user_order` SET `status2`='Approved' WHERE `orderid`='$id'";
  $res = mysqli_query($conn,$sql);
  if ($res === TRUE) {
    echo"<script>
      alert('Order Approved');
      window.location.href='';
      </script>";
  }
}
?>
<br>
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <a href="waiter_home.php" class="btn btn-outline btn-primary">Back</a>
            <table class="table table-striped table-sm mt-3">
                <thead>
                  <tr>
                    <th>Order_ID</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Manager</th>
                    <th>Chef</th>
                    <th></th>
                  </tr>
                </thead>
                <?php
                $sql = "SELECT * FROM user_order WHERE orderid = '$id' AND status='Approved' and stat='Approved'";
                $res = $conn->query($sql);
                    //$n=0;
                    if ($res->num_rows > 0) {
                        while ($row = $res->fetch_assoc()) {
                            $sql1 = mysqli_query($conn,"SELECT * FROM order_manager WHERE orderid = '$id' ");
                            $rows =mysqli_fetch_array($sql1);
                             ?>
                <tbody>
                  <tr>
                    <td><?= $row['orderid']; ?></td>
                    <td><?= $row['itm_name']; ?></td>
                    <td><?= $row['qty']; ?></td>
                    <td><?= $row['price']; ?></td>
                    <td><?= $row['status']; ?></td>
                    <td><?= $row['stat']; ?></td>
                    <td>
                      <?php
                      if ($row['stat'] == 'Approved') {?>
                      <form action="" method="post">
                        <button type="submit"  class="btn btn-sm btn-info" name="approve">Approve</button>
                      </form>
                        <?php
                      }
                      else {?>
                      <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $res['orderid'];?>">
                        <button type="submit" class="btn btn-sm btn-success" name="approve">Approve</button>
                      </form>
                      <?php
                      }
                      ?>
                    </td>
                    <td><a href="receipt.php?oid=<?= $row['orderid'];?>" class="btn btn-sm btn-outline-primary">Generate receipt</a></td>
                  </tr>
                </tbody>
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
              </table>
        </div>
    </div>
</div>
<?php
if (isset($_POST['approve'])) {
  $sql = mysqli_query($conn,"UPDATE `user_order` SET `status2`='Approved' WHERE `orderid`='$_POST[id]'");
  echo '<div class="alert alert-success alert-dismissible ">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!&nbsp;</strong> Order Approved.
    </div>';
  
}
?>
