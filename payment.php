
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include 'dbconfig.php';
$ipad = @$_SERVER['REMOTE_ADDR'];
?>
<tbody id="myTable">
                <?php
                $n=0;
                $sql = "SELECT * FROM `order_manager`";
                $res = $conn->query($sql);
                if ($res->num_rows > 0) {
                    while ($rows = $res->fetch_assoc()) {
                        $n++;
                        ?>
                        <tr>
                            <td><?= $n; ?></td>
                            <td><?= $rows['names']; ?></td>
                            <td><?= $rows['phone']; ?></td>
                            <td><?= $rows['email']; ?></td>
                            <td><?= $rows['location']; ?></td>
                            <td><?= $rows['address']; ?></td>
                        </tr>
                        <?php
                    }
                }
                else {?>
                    <div class="alert alert-danger"><strong>No data Found</strong></div>
                    <?php
                }
                ?>
            </tbody>
</body>
</html>