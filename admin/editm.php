<?php
include 'inc/header.php';
session_start();

$id = $_GET['edit'];

$user = mysqli_query($conn,"SELECT * FROM `manager` WHERE `mid` = '$id'");
$row =mysqli_fetch_array($user);

if (isset($_POST['update'])) {
    # code...
    $sql = mysqli_query($conn,"UPDATE `manager` SET `names`='$_POST[names]',`email`='$_POST[email]',`phone`='$_POST[phone]',`status`='$_POST[status]'
    WHERE `mid` = '$id'");

    if ($sql === TRUE) {
        echo "Records Updated successfully";
        echo'<META HTTP-EQUIV="Refresh" content="2; URL=manager.php">';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo'<META HTTP-EQUIV="Refresh" content="2; URL=manager.php">';
    }
}

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-5 d-absolute card">
            <div class="alert alert-info text-center"><strong>Edit <?= $row['names']; ?>'s Information</strong></div>
            <form action="" class="mt-3" method="post">
                
                <div class="form-group">
                    <label for="pwd">Names:</label>
                    <input type="text" class="form-control form-control-sm" name="names" value="<?= $row['names'];?>" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Email:</label>
                    <input type="email" class="form-control form-control-sm" name="email" value="<?= $row['email'];?>" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Phone &numero;:</label>
                    <input type="number" class="form-control form-control-sm" name="phone" value="<?= $row['phone'];?>" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Status:</label>
                    <input type="text" class="form-control form-control-sm" name="status" value="<?= $row['status'];?>" required>
                </div>
                <button type="submit" name="update" class="btn btn-primary btn-sm">Save Changes</button>

            </form>
        </div>
    </div>
</div>