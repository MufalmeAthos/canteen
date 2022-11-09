<div class="modal" id="manager">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Manager Login</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <?php
                if (isset($_POST['login'])) {
                    $uname =mysqli_real_escape_string($conn,$_POST['username']);
                    $pwd =mysqli_real_escape_string($conn, $_POST['password']);

                    $sql = mysqli_query($conn,"SELECT * FROM manager WHERE email ='$uname' AND password = '$pwd'");
                    $fetch = mysqli_fetch_assoc($sql);
                    if (is_array($fetch) && !empty($fetch)) {
                        $validuser = $fetch['email'];
                        $_SESSION['valid'] = $validuser;
                        echo '<div class="alert alert-success" style="width:80%; margin-left:10%; margin-right:10%;margin-top:2%;">
                                <strong>SUCCESS!</strong>Login Successfully!
                            </div>';
                            header('location:dashboard1.php');
                        //echo'<META HTTP-EQUIV="Refresh" content="2; URL=dashboard1.php">';
                    }
                    else {
                        echo '<div class="alert alert-danger">
                        <strong>Error!</strong> Invalid Username or Password!
                    </div>';
                    echo'<META HTTP-EQUIV="Refresh" content="2; URL=">';
                    }
                }
                ?>
      <!-- Modal body -->
      <div class="modal-body">
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
      </form>
      </div>
    </div>
  </div>
</div>