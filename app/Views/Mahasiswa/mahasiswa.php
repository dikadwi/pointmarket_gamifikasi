<?= $this->extend('template/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper">

    <div class="content-header">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambahMahasiswa">Input</button>
        <h3>
            <center>Data Mahasiswa<center>
        </h3>
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-sm-12">
                    <?= $this->include('mahasiswa/tabel'); ?>
                </div>
            </div>
    </section>
</div>

<!--Data Modal Box Tambah Data-->
<div class="modal fade" id="modalTambahMahasiswa">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/Mahasiswa/save_Mhs" method="post" enctype="multipart/form-data">
                    <div class="form-group ">
                        <label for="id" class="col-form-label"></label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="id" name="id" required>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="nama" class="col-form-label">Nama Mahasiswa</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="npm" class="col-form-label">NPM</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="npm" name="npm" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <!-- <div class="form-group ">
                        <label for="point" class="col-form-label">Point</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="point" name="point" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="badges" class="col-form-label">Badges</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="badges" name="badges" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                        </div>
                    </div> -->

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
        </form>
    </div>
</div>




<?= $this->endsection(); ?>