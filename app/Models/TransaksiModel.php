<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{


    protected $table = 'transaksi';
    protected $allowedFields = ['id_jenis', 'nama', 'detail', 'keterangan', 'point'];
}
