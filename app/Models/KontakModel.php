<?php

namespace App\Models;

use CodeIgniter\Model;

class KontakModel extends Model
{


    protected $table            = 'kontak';
    protected $allowedFields    = ['id_kontak', 'nama', 'ponsel', 'email', 'organisasi', 'qrcode'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
