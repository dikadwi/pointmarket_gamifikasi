<?= $this->extend('Admin/template/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper">

    <div class="content-header">
        <h3>
            <center>Data Kendaraan Roda 2</center>
        </h3>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <?= $this->include('Admin/Data_Kendaraan/tabel_data'); ?>
                </div>
            </div>
    </section>
</div>


<?= $this->endsection(); ?>