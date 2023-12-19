<?= $this->extend('template/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper">

    <div class="content-header">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambahMahasiswa">Input</button>
        <h3>
            <center>Point Market<center>
        </h3>
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <!-- <div class="col-sm-12">
                    <$this->include('market/tabel'); ?>
                </div> -->
                <?php foreach ($market as $item) : ?>
                    <div class="col-lg-3 col-6 ">
                        <div class="card">
                            <h5 class="card-header"> <?= $item['nama']; ?></h5>
                            <img src="..." class="card-img-top" alt="Gambar">
                            <div class="card-body">
                                <h5 class="card-title">Detail :</h5>
                                <p class="card-text"><?= $item['detail']; ?></p>
                                <p class="list-group-item"> <?= $item['point_harga']; ?> Point</p>
                                <button href="/Market/buyItem/<?= $item['id']; ?>" class="btn btn-primary btn-beli">Beli</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
    </section>
</div>



<?= $this->endsection(); ?>