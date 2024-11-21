<?= $this->extend('template/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper">
    <div class="container">
        <h3> Profile </h3>

        <div class="col-lg-8">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">

                    <div class="col-md-4">
                        <img src="/img/admin.jpg" class="img-fluid rounded-start">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <h5 class="card-title"><b>Nama :</b></h5>
                                <li class="list-group-item">
                                    <h4><?= $username; ?></h4>
                                </li>
                                <h5 class="card-title"><b>NPM :</b></h5>
                                <li class="list-group-item">
                                    <h4><?= $npm; ?></h4>
                                </li>
                                <h5 class="card-title"><b>Email :</b></h5>
                                <li class="list-group-item">
                                    <h4><?= $email; ?></h4>
                                </li>
                                <h5 class="card-title"><b>Point :</b></h5>
                                <li class="list-group-item">
                                    <h4><?= $point; ?></h4>
                                </li>
                                <button type=" button" class="btn btn-info" data-toggle="modal" data-target="#modalEdit<?= $npm; ?>">Edit Profil</button>
                            </ul>
                        </div>
                    </div>s
                </div>
            </div>
        </div>
    </div>
</div>

<!--Data Modal Box Edit Data-->
<div class="modal fade" id="modalEdit<?= $npm; ?>">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit <?= $title; ?> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-group ">
                        <label for="npm" class="col-form-label">NPM</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="npm" name="npm" value="<?= $npm; ?>" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="username" class="col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" name="username" value="<?= $username; ?>" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="npm" class="col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="npm" name="npm" value="<?= $email; ?>" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
        </form>
    </div>
</div>



<?= $this->endsection(); ?>