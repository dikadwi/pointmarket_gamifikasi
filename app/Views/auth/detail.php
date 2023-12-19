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
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>





<?= $this->endsection(); ?>