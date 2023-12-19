<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisTransaksiModel extends Model
{


    protected $table = 'jenis_transaksi';
    protected $primaryKey = 'kode_jenis';
    protected $allowedFields = ['nama_transaksi'];

    public function getJenis()
    {
        return $this->findAll();
    }
}