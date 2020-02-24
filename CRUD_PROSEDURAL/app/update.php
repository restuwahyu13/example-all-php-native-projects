<?php

require 'process.php';

//tampilkan data kedalam form update
$query = editData($_GET);

//update data ke dalam database
if(isset($_POST['submit'])) {

    if (updateData($_POST) > 0 ) {
        //alert pesan jika data berhasil diupdate
        echo '<script> alert("data berhasil diperbarui") </script>';
        echo '<script> location.href = "home.php" </script>';
    } else {
        //alert pesan jika data gagal diupdate
        echo '<script> alert("data gagal diperbarui") </script>';
        echo '<script> location.href = "home.php" </script>';
    }
}

?>
<?php require_once '../template/header.php';?>
<div class="container mx-auto position-relative mt-5">
<div class="row justify-content-center">
     <div class="col-6">
        <div class="card">
        <h4 class="card-header text-center">Form Perbarui Data</h4>
        <div class="card-body">
        <?php foreach ($query as $rows) : ?>
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <div class="form-gp">
                <input type="hidden" class="form-control" name="id" value="<?= $rows['id']; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="form-gp">
                <label for="first name"> Nama Depan </label>
                <input type="text" class="form-control" name="fnu" placeholder="First Name"
                 value="<?= $rows['first_name']; ?>">
             </div>
        </div>
        <div class=" form-group">
            <div class="form-gp">
            <label for="last name"> Nama Belakang </label>
            <input type="text" class="form-control" name="lnu" placeholder="Last Name"
             value="<?= $rows['last_name']; ?> ">
         </div>
        </div>
        <div class="form-group">
            <div class="form-gp">
                <label for="last name">Upload Gambar</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input form-control" name="gbu" value="<?= $rows['gambar'];?>">
                    <label class="custom-file-label" for="custome file"><?= $rows['gambar'];?></label>
                </div>
            </div>
        </div>
        <div class=" form-group">
            <div class="form-gp">
            <label for="last name"> Nama Wilayah</label>
            <input type="text" class="form-control" name="cnu" placeholder="Country Name"
             value="<?= $rows['country_name']; ?>">
          </div>
        </div>
        <div class=" form-group">
            <div class="form-gp">
            <input type="submit" class="btn btn-primary form-control" value="Update Data" name="submit">
          </div>
        </div>
        </form>
            </div>
                </div>
                    </div>
                        </div>
                            </div>
<?php endforeach; ?>
<?php require_once '../template/footer.php';?>