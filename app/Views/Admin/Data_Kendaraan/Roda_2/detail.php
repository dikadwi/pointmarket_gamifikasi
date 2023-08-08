<?= $this->extend('Admin/template/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper">
    <div class="container">
        <h3> Nama : <?= $data->nama; ?> </h3>
        <div class="col-lg-8">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-subtitle">Jenis : <?= $data->jenis; ?> </h5>
                            <h5 class="card-subtitle">Nomor Kendaraan : <?= $data->no_kendaraan; ?> </h5>
                            <h5 class="card-subtitle">Merk : <?= $data->merk; ?> </h5>
                            <h5 class="card-subtitle">Tipe : <?= $data->tipe; ?></h5>

                            <img src="<?= $data->qr_code; ?> " alt="">


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endsection(); ?>