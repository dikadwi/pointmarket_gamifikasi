<?= $this->extend('Admin/template/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="content-header">
    <h3>
        <center>Data Kendaraan Roda 2</center>
    </h3>
</div>

<section class="content">
    <div class="container-fluid">

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
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('pesan2'); ?>
            </div>
        <?php endif; ?>


        <div class="col">
            <?= $this->include('Admin/Data_Kendaraan/tabel'); ?>
        </div>
    </div>
</section>


<?= $this->endsection(); ?>