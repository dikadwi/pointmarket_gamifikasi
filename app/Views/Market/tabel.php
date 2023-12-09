<table class="table table-bordered border-dark">
    <thead class="bg-info">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Detail</th>
            <th scope="col">Point</th>
            <th scope="col" colspan="2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($market as $m) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $m['nama']; ?></td>
                <td><?= $m['detail']; ?></td>
                <td><?= $m['point']; ?></td>
                <td>
                    <?php if (in_groups('admin')) : ?>
                        <a href="/Market/beli/<?= $m['id']; ?>" class="btn btn-success btn-beli">Beli</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>