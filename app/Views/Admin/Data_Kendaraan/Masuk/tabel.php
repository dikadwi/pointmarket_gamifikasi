<div class="row">
    <table class="table table-bordered border-dark">
        <thead class="bg-info">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis</th>
                <th scope="col">No. Kendaraan</th>
                <th scope="col">Jam Masuk</th>
                <?php if (in_groups('admin')) : ?>
                    <th scope="col" colspan="2">Aksi</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Nama</td>
                <td>Jenis</td>
                <td>No kendaraan</td>
                <td>Jam</td>
                <?php if (in_groups('admin')) : ?>
                    <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalDetail">Detail</button>
                    <?php endif; ?>
            </tr>
        </tbody>
    </table>

</div>