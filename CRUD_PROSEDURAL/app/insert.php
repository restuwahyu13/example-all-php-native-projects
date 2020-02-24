<?php

require 'process.php';

    if(insertData($_POST) > 0) {

        echo '<script> alert("data berhasil ditambahkan") </script>';
        echo '<script> location.href = "home.php" </script>';
    }

?>
<?php require_once '../template/header.php';?>
<div class="container mx-auto position-relative mt-5">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <h4 class="card-header text-center">Form Tambah Data</h4>
                <div class="card-body">
                    <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-gp">
                                <label for="first name">Nama Depan</label>
                                <input class="form-control" name="fn" placeholder="Nama Depan">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-gp">
                                <label for="last name">Nama Belakang</label>
                                <input type="text" class="form-control" name="ln" placeholder="Nama Belakang">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-gp">
                                <label for="last name">Upload Gambar</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input form-control" name="gb">
                                    <label class="custom-file-label" for="custome file">Pilih Gambar</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-gp">
                                <label for="last name">Kota Asal</label>
                                <input type="text" class="form-control" name="cn" placeholder="Kota Asal">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-gp">
                                <input type="submit" class="btn btn-primary form-control" value="Tambah Data" name="submit">
                            </div>
                        </div>
                    </form>
                    <button class="btn btn-primary col-12">
                        <a href="home.php" class="text-decoration-none text-light">Menuju Table  <i class="fa fa-arrow-circle-right"></i> </a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once '../template/footer.php';?>