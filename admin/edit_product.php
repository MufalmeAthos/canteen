<?php
include 'inc/header.php';
session_start();

$id = $_GET['edit'];

$user = mysqli_query($conn,"SELECT * FROM `products` WHERE `pid` = '$id'");
$row =mysqli_fetch_array($user);

//echo $row['pname'];


    if (isset($_POST['submit'])) {
        $file = $_FILES['photo']['tmp_name'];
        $mimg = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
        $mph = addslashes($_FILES['photo']['name']);
        
            move_uploaded_file($_FILES["photo"]["tmp_name"], "product_images/" . $_FILES["photo"]["name"]);
            $loc = $_FILES["photo"]["name"];

            $sql = " UPDATE `products` SET `category`='$_POST[category]',`pname`='$_POST[pname]',
            `price`='$_POST[price]',`comment`='$_POST[comment]',`photo`='$loc' 
            WHERE `pid` ='$id' ";

            if ($conn->query($sql) === TRUE) {
                echo " Product Updated successfully";
                echo'<META HTTP-EQUIV="Refresh" content="2; URL=dashboard.php">';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                echo'<META HTTP-EQUIV="Refresh" content="2; URL=dashboard.php">';
            }
        
    }
    $conn->close();
?>

<div class="container mt-5">
    <a href="dashboard.php" class="btn btn-outline-primary btn-sm">Back</a>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-5 card">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" name="category" required>
                        <option value="$row['category']" selected><?= $row['category']; ?></option>
                        <option>Starters</option>
                        <option>Salads</option>
                        <option>Specialty</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="pname">Product Name:</label>
                    <input type="text" class="form-control form-control-sm" value="<?= $row['pname']; ?>" name="pname" required>
                </div>
                <div class="form-group">
                    <label for="pname">Price:</label>
                    <input type="number" class="form-control form-control-sm" value="<?= $row['price']; ?>" name="price" required>
                </div>
                <div class="form-group">
                    <label for="pname">Description:</label> 
                    <textarea class="form-control form-control-sm" name="comment" value="<?= $row['comment']; ?>" cols="10" rows="3" required></textarea>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="photo">Upload Image:</label> 
                            <input type="file" class="form-control form-control-sm" name="photo" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <img src="product_images/<?= $row['photo']; ?>" class="menu-img" alt="" width="50" height="50">
                    </div>
                </div>

                
                <button type="submit" class="btn btn-success mb-2" name="submit">Save changes</button>

            </form>
        </div>
    </div>
</div>