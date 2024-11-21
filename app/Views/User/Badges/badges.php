<?= $this->extend('User/template/dashboard'); ?>

<?= $this->section('content_user'); ?>

<div class="content-wrapper">

    <div class="content-header">
        <h3>
            <center>Data Badges<center>
        </h3>

    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-sm-12">
                    <?= $this->include('User/Badges/tabel'); ?>
                </div>
            </div>

    </section>
</div>


<?= $this->endsection(); ?>