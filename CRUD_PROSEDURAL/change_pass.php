<?php

require 'app/process.php';

error_reporting(0);

//get session email untuk id
$data = $_SESSION['e-mail'];

//redirect jika password benar
if(isset($_POST['submit'])) :
        if(changePassword($_POST) > 0) {
            echo '<script> alert("password berhasil diperbarui"); </script>';
            echo '<script> window.location.href = "index.php"; </script>';
        }
    endif;

?>

<?php require_once 'template/header.php';?>

    <div class="container position-relative mx-auto mt-3">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4 class="card-title text-center">Reset Password</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php $_SERVER['REQUEST_METHOD'];?>" method="post">
                            <input type="hidden" class="form-control" name="id" value="<?= $data;?>"/>
                            <div class="form-group">
                                <div class="form-gp">
                                    <label for="username">Ganti Password</label>
                                    <input type="password" class="form-control" name="pass"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-gp">
                                    <label for="username">K Ganti Password</label>
                                    <input type="password" class="form-control" name="cpass"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-gp">
                                    <input type="submit" class="form-control btn-primary" name="submit" value="Ganti Password"/>
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