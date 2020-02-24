<?php

require 'app/process.php';

error_reporting(0);

if (isset($_POST['submit'])):
    $_SESSION['nama'];
    loginData($_POST);
endif;
?>

<!--template header-->
<?php require_once 'template/header.php';?>

<div class="container position-relative mx-auto mt-3">
   <div class="row justify-content-center">
      <div class="col-6">
         <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <div class="text-center">Anda telah keluar: <strong><?=$_SESSION['logout'];?></strong></div>
         </div>
         <div class="card mt-5">
            <div class="card-header">
               <h4 class="card-title text-center">Form Login</h4>
            </div>
            <div class="card-body">
               <form action="<?php $_SERVER['REQUEST_METHOD'];?>" method="post">
                  <div class="form-group">
                     <div class="form-gp">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" />
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="form-gp">
                        <label for="username">Password</label>
                        <input type="password" class="form-control" name="pass" />
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="form-gp">
                        <input type="submit" class="form-control btn-primary" name="submit" value="Masuk" />
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="form-gp">
                        <a href="forgot_pass.php" class="col-12 btn btn-success text-decoration-none text-light">Lupa Password</a>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="form-gp">
                        <a href="register.php" class="col-12 btn btn-primary text-decoration-none text-light">Daftar</a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<!--template footer-->
<?php require_once 'template/footer.php';?>