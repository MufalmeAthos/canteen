<?php
include 'inc/header.php';
session_start();
?>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-5 card">
                <?php
                if (isset($_POST['login'])) {
                    $uname =mysqli_real_escape_string($conn,$_POST['username']);
                    $pwd =mysqli_real_escape_string($conn, $_POST['password']);

                    $sql = mysqli_query($conn,"SELECT * FROM users WHERE username ='$uname' AND password = '$pwd'");
                    $fetch = mysqli_fetch_assoc($sql);
                    if (is_array($fetch) && !empty($fetch)) {
                        $validuser = $fetch['username'];
                        $_SESSION['valid'] = $validuser;
                        echo '<div class="alert alert-success" style="width:80%; margin-left:10%; margin-right:10%;margin-top:2%;">
                                <strong>SUCCESS!</strong>Login Successfully!
                            </div>';
                            header('location:dashboard.php');
                        //echo'<META HTTP-EQUIV="Refresh" content="2; URL=dashboard.php">';
                    }
                    else {
                        echo '<div class="alert alert-danger">
                        <strong>Error!</strong> Invalid Username or Password!
                    </div>';
                    echo'<META HTTP-EQUIV="Refresh" content="2; URL=">';
                    }
                }
                ?>
                <div class="card-header mt-4 text-center"><strong>Admin Login</strong></div>
                <form action="" method="post" class="mt-5">
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" required placeholder="Enter Username" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" required placeholder="Enter Password" class="form-control form-control-sm">
                    </div>
                    <button class="btn btn-sm btn-primary my-3" name="login">Login</button>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#manager">
                    Manager
                    </button>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#chef">
                    Chef
                    </button>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#waiter">
                    Waiter
                    </button>
                </form>
                
            </div>
        </div>
    </div>
</body>
<?php
include 'manager-login.php';
include 'waiter-login.php';
include 'chef-login.php';
?>
