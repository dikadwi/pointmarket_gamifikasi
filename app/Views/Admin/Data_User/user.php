<?= $this->extend('Admin/template/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper">

    <div class="content-header">

        <h3>
            <center>Data Pengguna<center>
        </h3>

    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-sm-12">
                    <?= $this->include('Admin/Data_User/tabel'); ?>
                </div>
            </div>

    </section>
</div>



<?= $this->endsection(); ?>