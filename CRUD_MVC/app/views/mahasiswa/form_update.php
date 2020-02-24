<div class="container mt-3">
    <div class="row">
        <div class="col-10">
            <?php foreach($data["pilih"] as $rows) : ?>

                <form action="<?= URLROOT;?>/mahasiswa/perbarui" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" class="form-control" value="<?= $rows['id'];?>">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" value="<?= $rows['nama'];?>">
                    </div>
                    <div class="form-group">
                        <label for="npm">NPM</label>
                        <input type="number" name="npm" class="form-control" value="<?= $rows['npm'];?>">
                    </div>
                    <div class="form-group">
                        <label for="fakultas">Fakultas</label>
                        <select class="custome-select form-control" name="fakultas" data-value="<?= $rows['fakultas'];?>">
                            <option selected>Pilih Fakultas</option>

                            <?php if($rows['fakultas'] === 'FFIP') { ?>

                            <option selected value="<?= $rows['fakultas'];?>"><?= $rows['fakultas'];?></option>
                            <option>MIPA</option>

                            <?php } else {  ?>

                            <option selected value="<?= $rows['fakultas'];?>"><?= $rows['fakultas'];?></option>
                            <option>FFIP</option>

                            <?php } ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kejuruan">Kejuruan</label>
                        <select class="custome-select form-control" name="kejuruan">
                            <option selected>Pilih Kejuruan</option>

                            <?php if($rows['kejuruan'] === 'Tehnik Informatika') { ?>

                            <option selected value="<?= $rows['kejuruan'];?>"><?= $rows['kejuruan'];?></option>
                            <option>Design Komunikasi Visual</option>
                            <option>Tehnik Elektro</option>
                            <option>Sastra Inggris</option>

                            <?php } else if($rows['kejuruan'] === 'Design Komunikasi Visual') {  ?>

                            <option>Tehnik Informatika</option>
                            <option selected value="<?= $rows['kejuruan'];?>"><?= $rows['kejuruan'];?></option>
                            <option>Tehnik Elektro</option>
                            <option>Sastra Inggris</option>

                            <?php } else if($rows['kejuruan'] === 'Tehnik Elektro') {  ?>

                            <option>Tehnik Informatika</option>
                            <option>Design Komunikasi Visual</option>
                            <option selected value="<?= $rows['kejuruan'];?>"><?= $rows['kejuruan'];?></option>
                            <option>Sastra Inggris</option>

                            <?php } else {  ?>

                            <option>Tehnik Informatika</option>
                            <option>Design Komunikasi Visual</option>
                            <option>Tehnik Elektro</option>
                            <option selected value="<?= $rows['kejuruan'];?>"><?= $rows['kejuruan'];?></option>

                            <?php } ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class=" btn btn-dark col-12" value="Perbarui data">
                    </div>
                </form>

            <?php endforeach; ?>
        </div>
    </div>
</div>