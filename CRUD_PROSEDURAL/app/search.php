<?php
//hunbungkan ke fungsi
require 'process.php';
//sembunyikan error
error_reporting(0);
//seach method
$searchId = $_GET['cari'];
//fungsi pagination
$jumlah_data_perhalaman = 5;
$jumlah_data = count(searchData($_GET['cari']));
$jumlah_page_perhalaman = ceil($jumlah_data / $jumlah_data_perhalaman);
$halaman_aktif = (isset($_GET["halaman"])) ? $_GET["halaman"] :  1;
$awal_data = ($halaman_aktif - 1) * $jumlah_data_perhalaman;
if(empty($searchId)) {
    //jika kolom search kosong tampilkan ini
    $query = searchData($_GET['cari']);
} else {
    //jika kolom search tidak kosong tampilkan ini
    $sqli = "SELECT * FROM full_data WHERE first_name LIKE '%".$searchId."%' || last_name LIKE '%".$searchId."%' 
    LIMIT $awal_data, $jumlah_data_perhalaman";
    $query = $conn->query($sqli);
}

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
    <div class="container">
        <div class="row mt-5 no-gutters">
            <div class="col-12">
                <div class="row">
                    <div class="col-3">
                        <button class="btn btn-primary">
                            <a href="home.php" class="text-decoration-none text-light">Kembali <i class="fa fa-arrow-circle-left"></i> </a>
                        </button>
                    </div>
                </div>
            <h4 class="text-center position-relative mx-auto">Table Menampilkan Data</h4>
            <table class="table table-striped table-bordered mt-4">
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
            <?php foreach ($query as $rows) : ?>
                <tr>
                    <td><?= $id++; ?></td>
                    <td><?= $rows['first_name']; ?></td>
                    <td><?= $rows['last_name']; ?></td>
                    <td><?= $rows['country_name']; ?></td>
                    <td><img src="image/<?=$rows['gambar'];?>" alt="image" width="80px" height="50px"></td>
                    <td>
                        <button class="btn btn-danger"><a href="delete.php?del=<?= $rows['id']; ?>"><i class="fa fa-trash text-light"></i></a></button>
                        <button class="btn btn-success"><a href="update.php?edit=<?= $rows['id']; ?>"><i class="fa fa-pencil text-light"></i></a></button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <!--fungsi pagination page-->
        <ul class="pagination position-relative mx-auto justify-content-center mt-3">

            <!--pagination default awal halaman aktif-->
            <?php if($halaman_aktif > 1) : ?>
                <?php if($halaman_aktif !== $left_link) : ?>
                    <li class="page-item"><a href="?halaman=<?= $left_link; ?>&cari=<?= $searchId;?>" class="page-link">&lsaquo;</a></li>
                <?php endif; ?>
            <?php endif; ?>

            <!--pagination kembali-->
            <?php if($halaman_aktif > 1) : ?>
                <?php if($halaman_aktif !== $prev) : ?>
                    <li class="page-item"><a href="?halaman=<?= $prev; ?>&cari=<?= $searchId;?>" class="page-link">&laquo;</a></li>
                <?php endif; ?>
            <?php endif; ?>

            <!--tampilkan data pagenation-->
            <?php for ($i = 1 ; $i <= $jumlah_page_perhalaman; $i++) : ?>

                <?php if($i < $showPerpage) :?>
                    <!--  halaman aktif  -->
                    <?php if($i == $halaman_aktif) { ?>
                        <li class="active page-item">
                            <a href="<?= $searchId;?>?halaman=<?= $i; ?>&cari=<?= $searchId;?>" class="page-link"><?= $i ?></a>
                        </li>
                    <?php } else {?>
                        <!--  halaman non aktif  -->
                        <?php if($i > $halaman_aktif) { ?>
                            <li class="page-item">
                                <a href="?halaman=<?= $i; ?>&cari=<?= $searchId;?>" class="page-link"><?= $i ?></a>
                            </li>
                        <?php } ;?>
                    <?php } ?>

                <?php endif;?>
            <?php endfor; ?>

            <!--pagination selanjutnya-->
            <?php if($halaman_aktif < $jumlah_page_perhalaman) : ?>
                <?php if($halaman_aktif !== $next) : ?>
                    <li class="page-item">
                        <a href="?halaman=<?= $next; ?>&cari=<?= $searchId;?>" class="page-link">&raquo;</a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>

            <!--pagination akhir dari jumlah page-->
            <?php if($halaman_aktif < $jumlah_page_perhalaman) : ?>
                <?php if($right_link !== $next) : ?>
                    <li class="page-item">
                        <a href="?halaman=<?= $right_link; ?>&cari=<?= $searchId;?>" class="page-link">&rsaquo;</a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>

        </ul>
    </div>
        </div>
    </div>
<?php require_once '../template/footer.php';?>