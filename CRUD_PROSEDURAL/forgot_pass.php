<?php

require 'app/process.php';

//redirect jika password benar
if (isset($_POST['submit'])) :
    forgotPassword($_POST);
    $_SESSION['e-mail'];
endif;
?>

<?php require_once 'template/header.php'; ?>

<div class="container position-relative mx-auto mt-3">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="card-title text-center">Reset Password</h4>
                </div>
                <div class="card-body">
                    <form action="<?php $_SERVER['REQUEST_METHOD']; ?>" method="post">
                        <div class="form-group">
                            <div class="form-gp">
                                <label for="username">E-mail</label>
                                <input type="email" class="form-control" name="email" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-gp">
                                <input type="submit" class="form-control btn-primary" name="submit" value="Reset Password" />
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--template footer-->
<?php require_once 'template/footer.php'; ?>