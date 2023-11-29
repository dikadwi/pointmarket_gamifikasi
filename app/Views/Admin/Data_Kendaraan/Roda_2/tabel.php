<?= $this->extend('Admin/template/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DataTable with minimal features &amp; hover style</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6"></div>
                    <div class="col-sm-12 col-md-6"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                                    <th tabindex="0" rowspan="1" colspan="1">No</th>
                                    <th tabindex="0" rowspan="1" colspan="1">Nama</th>
                                    <th tabindex="0" rowspan="1" colspan="1">Jenis(s)</th>
                                    <th tabindex="0" rowspan="1" colspan="1">No Kendaraan</th>
                                    <th tabindex="0" rowspan="1" colspan="1">Merk</th>
                                    <th tabindex="0" rowspan="1" colspan="1">Tipe</th>
                                    <th tabindex="0" rowspan="1" colspan="1">QR Code</th>
                                    <th tabindex="0" rowspan="1" colspan="3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($roda as $d) : ?>
                                    <tr class="odd">
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
                </div>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<?= $this->endsection(); ?>