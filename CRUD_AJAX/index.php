<?php require_once 'assets/template/header.php';?>
<div class="container">
    <div class="row mt-5 no-gutters">
    <!-- start toggle tambah data  -->
        <div class="col-5 offset-1">
            <div class="form-group">
                <div class="form-gp">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#tambahData">Tambah Data</button>
                </div>
            </div>
        </div>
    <!-- end toggle tambah data  -->

    <!--  start search pencarian data-->
        <div class="col-3 offset-2">
            <div class="form-group">
                <div class="form-gp">
                <form action="javascript:void(0)" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Pencarian..." required id="cari" onkeyup="searcData()">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary"><i class="fa fa-search"></i> </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!--  end search pencarian data-->

<!-- start data table-->
    <div class="table-responsive mt-3" id="dataTable">

    </div>
<!-- end data table-->

    <!-- form modal tambah data -->
    <div class="modal fade show" data-toggle="modal" role="dialog" id="tambahData">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="title">Tambah Data Mahasiswa</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="<?php $_SERVER['REQUEST_METHOD'];?>" method="post" enctype="multipart/form-data" id="formData">
                        <div class="form-group">
                            <div class="form-gp">
                                <label for="first name">Nama Depan</label>
                                <input type="text" class="form-control" name="fn" placeholder="Nama Depan" required id="fnx">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-gp">
                                <label for="last name">Nama Belakang</label>
                                <input type="text" class="form-control" name="ln" placeholder="Nama Belakang" required id="lnx">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-gp">
                                <label for="last name">Photo</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="gb" id="gbx">
                                    <label class="custom-file-label">Pilih Gambar</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-gp">
                                <label for="last name">Kota Asal</label>
                                <input type="text" class="form-control" name="cn" placeholder="Kota Asal" required id="cnx">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-gp">
                                <input type="submit" class="btn btn-primary form-control" value="Tambah Data">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!--  end form modal tambah data-->

<!-- form modal tambah data -->
<div class="modal fade show" data-toggle="modal" role="dialog" id="updateData">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title">Perbarui Data Mahasiswa</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data" id="formUpdate">
                    <div class="form-group">
                        <div class="form-gp">
                            <input type="hidden" class="form-control" name="idu" placeholder="Nama Depan" required id="idu">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-gp">
                            <label for="first name">Nama Depan</label>
                            <input type="text" class="form-control" name="fnu" placeholder="Nama Depan" required id="fnu">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-gp">
                            <label for="last name">Nama Belakang</label>
                            <input type="text" class="form-control" name="lnu" placeholder="Nama Belakang" required id="lnu">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-gp">
                            <label for="last name">Photo</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="gbu" id="gbu">
                                <label class="custom-file-label">Pilih Gambar</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-gp">
                            <label for="last name">Kota Asal</label>
                            <input type="text" class="form-control" name="cnu" placeholder="Kota Asal" required id="cnu">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-gp">
                            <input type="submit" class="btn btn-success form-control" value="Update Data">
                        </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
<!--  end form modal tambah data-->
</div>
<?php require_once 'assets/template/footer.php';?>

