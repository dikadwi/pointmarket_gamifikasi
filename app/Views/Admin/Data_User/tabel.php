<div class="row">
    <table class="table table-bordered border-dark">
        <thead class="bg-info">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Waktu Dibuat</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($users as $u) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $u->username; ?></td>
                    <td><?= $u->email; ?></td>
                    <td><?= $u->name; ?></td>
                    <td><?= $u->created_at; ?></td>
                    <td>
                        <a href="<?= base_url('Admin/detail/' . $u->userid); ?>" class="btn btn-info">Detail</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>