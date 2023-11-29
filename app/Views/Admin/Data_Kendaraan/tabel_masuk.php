<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalScan">Scan</button>

<div class="row">
    <table class="table table-bordered table-hover">
        <thead class="bg-gradient-gray-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Text</th>
                <th scope="col">Waktu</th>
                <th scope="col" colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($scan as $d) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $d['text']; ?></td>
                    <td><?= $d['waktu']; ?></td>
                    <td><a href="" class="btn btn-warning ">Keluar</a></td>
                    <td><a href="" class="btn btn-danger ">Hapus</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="modalScan">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">SCAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <video id="preview" width="100%">Video</video>
                    </div>
                    <div class="col-md6">
                        <form action="/home/save" method="post" enctype="multipart/form-data">
                            <label>SCAN QR CODE</label>
                            <input type="text" name="text" id="text" readonly class="form-control" required>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>