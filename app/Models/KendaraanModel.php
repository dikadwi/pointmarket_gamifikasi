<?php

namespace App\Models;

use CodeIgniter\Model;

class KendaraanModel extends Model
{


    protected $table = 'data_kendaraan';
    protected $allowedFields = ['id', 'nama', 'jenis', 'no_kendaraan', 'merk', 'tipe', 'qr_code'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getRoda($jenis = false)
    {
        return $this->where(['jenis' => $jenis])->find();
    }

    public function total()
    {
        return $this->countAll();
    }

    public function getId($id)
    {
        return $this->where(['id' => $id])->find();
    }
}
