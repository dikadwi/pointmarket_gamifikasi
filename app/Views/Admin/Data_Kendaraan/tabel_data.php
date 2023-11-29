<div class="row">
    <input type="button" class="btn btn-danger " value="Print PDF" onclick="window.open('<?php echo base_url('Admin/printpdf') ?>','blank')">
</div>
<div class="row">
    <table class="table table-bordered table-hover">
        <thead class="bg-gradient-gray-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis</th>
                <th scope="col">No. Kendaraan</th>
                <th scope="col">Merk</th>
                <th scope="col">Tipe</th>
                <th scope="col">Kode QR</th>
                <th scope="col" colspan="3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($roda as $d) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $d['nama']; ?></td>
                    <td><span class="badge badge-<?= ($d['jenis'] == 'Roda 2') ? 'dark' : 'secondary'; ?>"><?= $d['jenis']; ?></span></td>
                    <td><?= $d['no_kendaraan']; ?></td>
                    <td><?= $d['merk']; ?></td>
                    <td><?= $d['tipe']; ?></td>
                    <td>
                        <img src="<?= $d['qr_code']; ?>" style="width: 150px;" alt="">
                    </td>
                    <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalDetail<?php echo $d['id']; ?>">Detail</button>
                        <?php if (in_groups('admin')) : ?>
                    <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit<?php echo $d['id']; ?>">Edit</button>
                        <!-- <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus<?php echo $d['id']; ?>">Hapus</button></td> -->
                    <td><a href="/Admin/hapus_data/<?= $d['id']; ?>" class="btn btn-danger btn-hapus">Hapus</a></td>
                <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<!--Data Modal Box Detail Data-->
<?php foreach ($roda as $d) : ?>
    <div class="modal fade" id="modalDetail<?php echo $d['id']; ?>">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Detail Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <h5 class="card-title"><b>Nama :</b></h5>
                            <li class="list-group-item"><?= $d['nama']; ?></li>
                            <h5 class="card-title"><b>Jenis :</b></h5>
                            <li class="list-group-item"><span class="badge badge-<?= ($d['jenis'] == 'Roda 2') ? 'dark' : 'secondary'; ?>"><?= $d['jenis']; ?></li>
                            <h5 class="card-title"><b>No Kendaraan :</b></h5>
                            <li class="list-group-item"><?= $d['no_kendaraan']; ?></li>
                            <h5 class="card-title"><b>Merk :</b></h5>
                            <li class="list-group-item"><?= $d['merk']; ?></li>
                            <h5 class="card-title"><b>Tipe :</b></h5>
                            <li class="list-group-item"><?= $d['tipe']; ?></li>
                            <h5 class="card-title"><b>QR Code :</b></h5>
                            <li class="list-group-item">
                                <img src="<?= $d['qr_code']; ?>" alt="">
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <a target="_blank" href="/Admin/cetakpdf/<?= $d['id']; ?>" type="button" class="btn btn-secondary">Cetak</a>
                </div>
            </div>
            </form>
        </div>
    </div>
<?php endforeach ?>

<!--Data Modal Box Edit Data-->
<?php foreach ($roda as $d) : ?>
    <div class="modal fade" id="modalEdit<?php echo $d['id']; ?>">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="/Admin/update_data/<?= $d['id']; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group ">
                            <label for="id" class="col-form-label"></label>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $d['id'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="nama" class="col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $d['nama'] ?>" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="jenis" class="col-form-label">Jenis</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $d['jenis'] ?>" disabled>
                            </div>
                            <div class="col-sm-10">
                                <select name="jenis" id="jenis" class="form-control" required oninvalid="this.setCustomValidity('Pilih Jenis Kendaraan')">
                                    <option value="">-- Pilih --</option>
                                    <?php foreach ($jenis as $j) : ?>
                                        <option value="<?= $j['nama'] ?>"><?= $j['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                </select>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="no_kendaraan" class="col-form-label">No Kendaraan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_kendaraan" name="no_kendaraan" value="<?php echo $d['no_kendaraan'] ?>" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="merk" class="col-form-label">Merk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="merk" name="merk" value="<?php echo $d['merk'] ?>" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="tipe" class="col-form-label">Tipe</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="tipe" name="tipe" value="<?php echo $d['tipe'] ?>" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')">
                            </div>
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
            </form>
        </div>
    </div>
<?php endforeach ?>

<!-- Modal Box Hapus Data  -->
<!-- <?php foreach ($roda as $d) : ?>
    <div class="modal fade" id="modalHapus<?php echo $d['id']; ?>">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Hapus Data !!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center><img src="/img/alert.png" width="120" height="120">
                        <h5 class="modal-title" id="staticBackdropLabel">Apakah Anda Ingin Menghapus Data Ini ?</h5>
                    </center>
                </div>
                <div class="modal-footer">
                    <a href="/Admin/hapus_data/<?= $d['id']; ?>" class="btn btn-danger">Hapus</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>

            </div>
        </div>
    </div>
<?php endforeach; ?> -->