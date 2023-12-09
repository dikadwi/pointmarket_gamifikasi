<?= $this->extend('template/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper">

    <div class="content-header">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalInput">Input</button>
        <h3>
            <center>Data Gamifikasi Mahasiswa<center>
        </h3>
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-sm-12">
                    <?= $this->include('Gamifikasi/tabel'); ?>
                </div>
            </div>
    </section>
</div>

<!--Data Modal Box Tambah Data-->
<div class="modal fade" id="modalInput">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Baru </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#save_data" method="post" enctype="multipart/form-data">
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
                        <!-- Buat dropdown mengambil dari database -->
                        <label for="jenis" class="col-form-label">Jenis Kendaraan</label>
                        <div class="col-sm-10">
                            <select name="jenis" id="jenis" class="form-control" required oninvalid="this.setCustomValidity('Pilih Jenis Kendaraan')" oninput="setCustomValidity('')">
                                <option value="">--Pilih--</option>
                                <option value="Roda 2">Roda 2</option>
                                <option value="Roda 4">Roda 4</option>
                            </select>
                            </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="no_kendaraan" class="col-form-label">Nomor Kendaraan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_kendaraan" name="no_kendaraan" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="merk" class="col-form-label">Merk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="merk" name="merk" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="tipe" class="col-form-label">Tipe</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tipe" name="tipe" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                        </div>
                    </div>

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