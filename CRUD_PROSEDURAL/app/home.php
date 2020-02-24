<?php
require 'process.php';

//jika sessionnya ada cetak session
if(session_id()) $data = $_SESSION['nama'];

//fungsi pagination
$jumlah_data_perhalaman = 5;
$jumlah_data = count(tableData());
$jumlah_page_perhalaman = ceil($jumlah_data / $jumlah_data_perhalaman);
$halaman_aktif = (isset($_GET["halaman"])) ? $_GET["halaman"] :  1;
$awal_data = ($halaman_aktif - 1) * $jumlah_data_perhalaman;
$query = $conn->query("SELECT * FROM full_Data LIMIT $awal_data, $jumlah_data_perhalaman ");

//fungsi page selanjutnya dan sebelumnya
$prev = $halaman_aktif - 1;
$next = $halaman_aktif + 1;

//fungsi page awal dan akhir
$left_link = 1;
$right_link = $jumlah_page_perhalaman;

//limit pagination data
$showPerpage = ceil($jumlah_data / $jumlah_page_perhalaman) + $halaman_aktif;;

?>
<?php require_once '../template/header.php';?>
<div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <div class="text-center"><p>Selamat Datang: <strong><?= $data;?></strong></p></div>
</div>
<div class="container mt-3">
<div class="row">
    <div class="col-5 offset-1">
        <div class="form-group">
            <div class="form-gp">
                <button class="btn btn-primary">
                    <a href="insert.php" class="text-decoration-none text-light">Tambah Data</a>
                </button>
            </div>
        </div>
    </div>
    <div class="col-3 offset-2">
            <div class="form-group">
                <div class="form-gp">
                    <form action="search.php" method="get">
                        <div class="input-group">
                        <input type="text" name="cari" class="form-control" placeholder="Pencarian...?">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-3">
            <a href="logout.php" class="text-decoration-none text-white btn btn-danger">Logout</a>
        </div>
    </div>
<table class="table table-striped table-bordered mt-3">
    <h4 class="text-center position-relative mx-auto">Table Menampilkan Data</h4>
    <thead class="text-center bg-primary text-white">
    <tr>
        <th>id</th>
        <th>nama depan</th>
        <th>nama belakang</th>
        <th>nama wilayah</th>
        <th>gambar</th>
        <th>alat</th>
    </tr>
    </thead>
    <tbody class="text-center">
    <?php $id = 1; ?>
    <?php while ($rows = $query->fetch_array()) : ?>
        <tr>
            <td><?= $id++; ?></td>
            <td><?= $rows['first_name']; ?></td>
            <td><?= $rows['last_name']; ?></td>
            <td><?= $rows['country_name']; ?></td>
            <td><img src="../image/<?=$rows['gambar'];?>" alt="image" width="80px" height="50px"></td>
            <td>
            <button class="btn btn-danger"><a href="delete.php?del=<?= $rows['id']; ?>"><i class="fa fa-trash text-light"></i></a></button>
            <button class="btn btn-success"><a href="update.php?edit=<?= $rows['id']; ?>"><i class="fa fa-pencil text-light"></i></a></button>
            <button class="btn btn-info"><a href="../reports.php?cetak"><i class="fa fa-print text-light"></i></a></button>
            </td>
        </tr>
        <?php endwhile;?>
    </tbody>
</table>

<!--fungsi pagination page-->
<ul class="pagination position-relative mx-auto justify-content-center mt-3">

<!--pagination default awal halaman aktif-->
<?php if($halaman_aktif > 1) : ?>
    <?php if($halaman_aktif !== $left_link) : ?>
        <li class="page-item"><a href="?halaman=<?= $left_link; ?>" class="page-link">&lsaquo;</a></li>
    <?php endif; ?>
<?php endif; ?>

<!--pagination kembali-->
<?php if($halaman_aktif > 1) : ?>
    <?php if($halaman_aktif !== $prev) : ?>
        <li class="page-item"><a href="?halaman=<?= $prev; ?>" class="page-link">&laquo;</a></li>
    <?php endif; ?>
<?php endif; ?>

<!--tampilkan data pagenation-->
<?php for ($i = 1 ; $i <= $jumlah_page_perhalaman; $i++) : ?>

    <?php if($i < $showPerpage) :?>
    <!--  halaman aktif  -->
    <?php if($i == $halaman_aktif) { ?>
            <li class="active page-item">
                <a href="?halaman=<?= $i; ?>" class="page-link"><?= $i ?></a>
            </li>
    <?php } else {?>
            <!--  halaman non aktif  -->
            <?php if($i > $halaman_aktif) { ?>
                <li class="page-item">
                    <a href="?halaman=<?= $i; ?>" class="page-link"><?= $i ?></a>
                </li>
            <?php } ;?>
    <?php } ?>

<?php endif;?>
<?php endfor; ?>

<!--pagination selanjutnya-->
<?php if($halaman_aktif < $jumlah_page_perhalaman) : ?>
    <?php if($halaman_aktif !== $next) : ?>
        <li class="page-item">
            <a href="?halaman=<?= $next; ?>" class="page-link">&raquo;</a>
        </li>
    <?php endif; ?>
<?php endif; ?>

<!--pagination akhir dari jumlah page-->
<?php if($halaman_aktif < $jumlah_page_perhalaman) : ?>
    <?php if($right_link !== $next) : ?>
        <li class="page-item">
            <a href="?halaman=<?= $right_link; ?>" class="page-link">&rsaquo;</a>
        </li>
    <?php endif; ?>
<?php endif; ?>

</ul>
</div>
<?php require_once '../template/footer.php';?>