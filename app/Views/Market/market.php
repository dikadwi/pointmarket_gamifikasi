<?= $this->extend('template/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper">

    <div class="content-header">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambahMahasiswa">Input</button>
        <h3>
            <center>Point Market<center>
        </h3>
    </div>

    <!-- <form action="/Market/buyItem" method="post">
        <label for="mahasiswa">Pilih Mahasiswa:</label>
        <select name="mahasiswa" id="mahasiswa">
            <?php foreach ($mahasiswa as $mhs) : ?>
                <option value="<?= $mhs['id'] ?>"><?= $mhs['nama'] ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <label for="item">Pilih Item:</label>
        <select name="item" id="item">
            <?php foreach ($items as $item) : ?>
                <option value="<?= $item['id'] ?>"><?= $item['nama'] ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <button type="submit">Beli Item</button>
    </form> -->

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-sm-12">
                    <?= $this->include('market/tabel'); ?>
                </div>
            </div>
    </section>
</div>



<?= $this->endsection(); ?>