<?= $this->extend('Admin/template/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">

        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-warning" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('pesan1')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan1'); ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('pesan2')) : ?>
            <div class="alert alert-warning" role="alert">
                <?= session()->getFlashdata('pesan2'); ?>
            </div>
        <?php endif; ?>
    </div>

    <h3>
        <center>Data Kendaraan<center>
    </h3>

    <div class="center">
        <?= $this->include('Admin/Data_Kendaraan/tabel'); ?>
    </div>
</div>




<?= $this->endsection(); ?>