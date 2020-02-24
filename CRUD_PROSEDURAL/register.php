<?php
require 'app/process.php';

if(isset($_POST['submit'])) :
    if(dataRegister($_POST) > 0) {
        echo '<script> alert("pendaftaran berhasil"); </script>';
        echo '<script> window.location.href ="index.php"; </script>';
    }
endif;

?>

<!--template header-->
<?php require_once 'template/header.php';?>

    <div class="container position-relative mx-auto mt-3">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4 class="card-title text-center">Form Pendaftaran</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php $_SERVER['REQUEST_METHOD'];?>" method="post">
                            <div class="form-group">
                                <div class="form-gp">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-gp">
                                    <label for="username">E-mail</label>
                                    <input type="email" class="form-control" name="email"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-gp">
                                    <label for="username">Password</label>
                                    <input type="password" class="form-control" name="pass"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-gp">
                                    <label for="username">Konfirmasi Password</label>
                                    <input type="password" class="form-control" name="cpass"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-gp">
                                    <input type="submit" class="form-control btn-primary" name="submit" value="Daftar"/>
                                </div>
                            </div>
<!--                            <div class="form-group">-->
<!--                                <div class="form-gp">-->
<!--                                    <a href="index.php" class="col-12 btn btn-primary text-decoration-none text-light">Masuk</a>-->
<!--                                </div>-->
<!--                            </div>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--template footer-->
<?php require_once 'template/footer.php';?>