<?= $this->extend('Admin/template/dashboard'); ?>

<?= $this->section('content'); ?>


<div class="container">

    <h3>
        <center>Data Pengguna<center>
    </h3>

    <div class="center">
        <?= $this->include('Admin/Data_User/tabel'); ?>
    </div>
</div>




<?= $this->endsection(); ?>