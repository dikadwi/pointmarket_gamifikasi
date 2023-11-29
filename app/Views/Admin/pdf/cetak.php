<style>
    table,
    td {
        border-collapse: collapse;
        border: 1px solid;
        margin: auto;
    }

    th {
        border: 1px solid;
        background-color: slategray;
        text-align: left;
    }

    td {
        width: 10rem;
    }

    .qr,
    .head,
    h2 {
        text-align: center;
    }

    .kanan {
        text-align: right;
    }
</style>


<div class="row">

    <?php foreach ($roda as $d) : ?>
        <h2>Detail <?= $d['nama']; ?></h2>
        <hr><br>
        <table class="table ">
            <tr>
                <td class="head" colspan="2"><b>QR Code</b></td>

            </tr>
            <tr>
                <th scope="col">Nama</th>
                <td scope="col"> <?= $d['nama']; ?></td>
            </tr>
            <tr>
                <th scope="col">Jenis</th>
                <td scope="col"> <?= $d['jenis']; ?></td>
            </tr>
            <tr>
                <th scope="col">No. Kendaraan</th>
                <td scope="col"> <?= $d['no_kendaraan']; ?></td>
            </tr>
            <tr>
                <th scope="col">Merk</th>
                <td scope="col"><?= $d['merk']; ?></td>
            </tr>
            <tr>
                <th scope="col">Tipe</th>
                <td scope="col"><?= $d['tipe']; ?></td>
            </tr>
            <tr>
                <th scope="col">QR Code</th>
                <td scope="col">
                    <img src="<?= $d['qr_code']; ?>" style="width: 150px;" alt="">
                </td>
            </tr>

        </table>
        <!-- <br>
        <hr>
        <br>
        <table>
            <tr>
                <td class="head" colspan="3"><b>KARTU PARKIR</b> </td>
            </tr>
            <tr>
                <td class="qr" rowspan="5"><img src="<?= $d['qr_code']; ?>" style="width: 175px;" alt=""></td>
                <th>Nama </th>
                <td>: <?= $d['nama']; ?></td>
            </tr>
            <tr>
                <th>Jenis </th>
                <td>: <?= $d['jenis']; ?></td>
            </tr>
            <tr>
                <th>No. Kendaraan </th>
                <td>: <?= $d['no_kendaraan']; ?></td>
            </tr>
            <tr>
                <th>Merk </th>
                <td>: <?= $d['merk']; ?></td>
            </tr>
            <tr>
                <th>Tipe </th>
                <td>: <?= $d['tipe']; ?></td>
            </tr>

        </table> -->
    <?php endforeach; ?>
    <br>
    <hr>
    <p class="kanan"><?php date_default_timezone_set('Asia/Jakarta');
                        echo date(' d F Y . H:i'); ?></p>

</div>