<div class="container position-relative mx-auto mt-5">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center">Table Data Mahasiswa</h2>
            <table class="table table-striped table-bordered table-hover mt-4 text-center">
                <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Npm</th>
                    <th>Fakultas</th>
                    <th>Kejuruan</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php $id = 1; ?>
                <?php foreach ($data['table'] as $rows) :?>
                    <tr>
                        <td><?= $id++; ?></td>
                        <td><?= $rows['nama'];?></td>
                        <td><?= $rows['npm'];?></td>
                        <td><?= $rows['fakultas'];?></td>
                        <td><?= $rows['kejuruan'];?></td>
                        <td>
                        <a href="<?= URLROOT; ?>/mahasiswa/hapus/<?= $rows['id'];?>"
                        onclick="return confirm('yakin mau anda hapus ?')">Hapus Data |
                         <a href="<?= URLROOT; ?>/mahasiswa/pilih/<?= $rows['id'];?>">Pilih Data
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>

            <!-- start pagination fungsi-->
            <ul class="pagination">

                <!-- fungsi page default hal awal-->
<!--                --><?php //if($data['right'] !== $data['halAktif'] && $data['halAktif'] > 1) : ?>
<!--                    <li class="page-item">-->
<!--                        <a href="--><?//= $data['right'];?><!--" class="page-link">&lsaquo;</a>-->
<!--                    </li>-->
<!--                --><?php //endif;?>

                <!-- fungsi page sebelumnya-->
<!--                --><?php //if($data['prev'] !== $data['halAktif'] && $data['halAktif'] > 1) : ?>
<!--                    <li class="page-item">-->
<!--                        <a href="--><?//= $data['prev'];?><!--" class="page-link">&laquo;</a>-->
<!--                    </li>-->
<!--                --><?php //endif;?>

                <!-- fungsi menampikan pagination dan hal aktif-->
<!--                --><?php //for($i=1; $i <= $data['dataPage']; $i++) :?>
<!--                    --><?php //if($i < $data['limit']) : ?>
<!---->
<!--                        --><?php //if($i == $data['halAktif']) : ?>
<!--                            <li class="active page-item">-->
<!--                                <a href="--><?//= $i;?><!--/search/--><?//= $data['cari'];?><!--" class="page-link">--><?//= $i;?><!--</a>-->
<!--                            </li>-->
<!--                        --><?php //else : ?>
<!--                            --><?php //if($i > $data['halAktif']) : ?>
<!--                                <li class="page-item">-->
<!--                                    <a href="--><?//= $i;?><!--/search/--><?//= $data['cari'];?><!--" class="page-link">--><?//= $i;?><!--</a>-->
<!--                                </li>-->
<!--                            --><?php //endif;?>
<!--                        --><?php //endif;?>
<!---->
<!--                    --><?php //endif;?>
<!--                --><?php //endfor;?>

                <!-- fungsi page selanjutnya-->
<!--                --><?php //if($data['next'] !== $data['halAktif'] && $data['halAktif'] < $data['dataPage']): ?>
<!--                    <li class="page-item">-->
<!--                        <a href="--><?//= $data['next'];?><!--" class="page-link">&raquo;</a>-->
<!--                    </li>-->
<!--                --><?php //endif;?>

                <!-- fungsi page default hal akhir-->
<!--                --><?php //if($data['left'] !== $data['halAktif'] && $data['halAktif'] < $data['dataPage']) : ?>
<!--                    <li class="page-item">-->
<!--                        <a href="--><?//= $data['left'];?><!--" class="page-link">&rsaquo;</a>-->
<!--                    </li>-->
<!--                --><?php //endif;?>

            </ul>
            <!-- end pagination fungsi-->

        </div>
    </div>
</div>