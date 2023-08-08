<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisModel extends Model
{


    protected $table = 'jenis_kendaraan';
    protected $allowedFields = ['id', 'nama'];

    public function getJenis($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
