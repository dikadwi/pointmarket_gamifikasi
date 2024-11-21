<?= $this->extend('template/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper">

    <div class="content-header">
        <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambahJenisTransaksi">Input</button> -->
        <h3>
            <center>Data <?= $title; ?> <center>
        </h3>
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-sm-12">
                    <?= $this->include('transaksi/tabel_jenis'); ?>
                </div>
            </div>
    </section>
</div>


<?= $this->endsection(); ?>