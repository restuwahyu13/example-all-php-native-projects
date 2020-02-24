<div class="container position-relative mx-auto mt-5">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <button class="btn btn-dark" data-target="#tambah" data-toggle="modal">Tambah Data</button>
                </div>
                <div class="col-3 offset-3">
                    <form action="<?= URLROOT;?>/mahasiswa/search" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-gp">
                                <div class="input-group">
                                    <input type="search" class="form-control" name="cari">
                                    <button type="submit" class="btn btn-dark input-group-append">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
                <?php if($data['right'] !== $data['halAktif'] && $data['halAktif'] > 1) : ?>
                    <li class="page-item">
                        <a href="<?= $data['right'];?>" class="page-link">&lsaquo;</a>
                    </li>
                <?php endif;?>

            <!-- fungsi page sebelumnya-->
                <?php if($data['prev'] !== $data['halAktif'] && $data['halAktif'] > 1) : ?>
                    <li class="page-item">
                        <a href="<?= $data['prev'];?>" class="page-link">&laquo;</a>
                    </li>
                <?php endif;?>

            <!-- fungsi menampikan pagination dan hal aktif-->
                <?php for($i=1; $i <= $data['dataPage']; $i++) :?>
                    <?php if($i < $data['limit']) : ?>

                        <?php if($i == $data['halAktif']) : ?>
                            <li class="active page-item">
                                <a href="<?= $i;?>" class="page-link"><?= $i;?></a>
                            </li>
                        <?php else : ?>
                           <?php if($i > $data['halAktif']) : ?>
                                <li class="page-item">
                                    <a href="<?= $i;?>" class="page-link"><?= $i;?></a>
                                </li>
                            <?php endif;?>
                        <?php endif;?>

                    <?php endif;?>
                <?php endfor;?>

            <!-- fungsi page selanjutnya-->
                <?php if($data['next'] !== $data['halAktif'] && $data['halAktif'] < $data['dataPage']): ?>
                    <li class="page-item">
                        <a href="<?= $data['next'];?>" class="page-link">&raquo;</a>
                    </li>
                <?php endif;?>

            <!-- fungsi page default hal akhir-->
                <?php if($data['left'] !== $data['halAktif'] && $data['halAktif'] < $data['dataPage']) : ?>
                    <li class="page-item">
                        <a href="<?= $data['left'];?>" class="page-link">&rsaquo;</a>
                    </li>
                <?php endif;?>

            </ul>
        <!-- end pagination fungsi-->
        </div>
    </div>
</div>

<!--Form Tambah Data Modal Box-->
<div class="modal fade show" id="tambah" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= URLROOT;?>/mahasiswa/tambah" method="post">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama">NPM</label>
                        <input type="number" name="npm" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama">Fakultas</label>
                        <select class="custome-select form-control" name="fakultas">
                            <option selected>Pilih Fakultas</option>
                            <option>MIPA</option>
                            <option>FFIP</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Kejuruan</label>
                        <select class="custome-select form-control" name="kejuruan">
                            <option selected>Pilih Kejuruan</option>
                            <option>Tehnik Informatika</option>
                            <option>Design Komunikasi Visual</option>
                            <option>Tehnik Elektro</option>
                            <option>Sastra Inggris</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class=" btn btn-primary col-12" value="tambah data">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>