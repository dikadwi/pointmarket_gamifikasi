<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{


    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'npm', 'point', 'badges'];

    // //Dates
    // protected $useTimestamps = true;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    public function getMhs()
    {
        return $this->findAll();
    }

    public function saveBadge($data)
    {
        return $this->insert($data);
    }


    // public function total()
    // {
    //     return $this->countAll();
    // }

    // public function getId($id_badges)
    // {
    //     return $this->where(['id_badges' => $id_badges])->find();
    // }
}
