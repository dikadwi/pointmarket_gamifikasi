<style>
    .table,
    td {
        border-collapse: collapse;
        border: 1px solid;
        margin: auto;
    }

    th {
        border: 1px solid;
        background-color: slategrey;
    }

    h2,
    td {
        text-align: left;
        vertical-align: top;
    }

    .kanan {
        text-align: right;
    }
</style>


<div class="row">

    <h2>Data Kendaraan</h2>
    <hr><br>
    <table class="table ">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis</th>
                <th scope="col">No. Kendaraan</th>
                <th scope="col">Merk</th>
                <th scope="col">Tipe</th>
                <th scope="col">Kode QR</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($roda as $d) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $d['nama']; ?></td>
                    <td><?= $d['jenis']; ?></span></td>
                    <td><?= $d['no_kendaraan']; ?></td>
                    <td><?= $d['merk']; ?></td>
                    <td><?= $d['tipe']; ?></td>
                    <td>
                        <img src="<?= $d['qr_code']; ?>" style="width: 125px;" alt="">
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <hr>
    <p class="kanan"><i> <b>Dicetak : </b><?php date_default_timezone_set('Asia/Jakarta');
                                            echo date(' d F Y . H:i'); ?></i></p>


</div>