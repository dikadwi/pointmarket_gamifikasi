<?php

namespace App\Models;

use CodeIgniter\Model;

class ScanModel extends Model
{


    protected $table = 'scan';
    protected $allowedFields = ['id', 'text', 'waktu'];
}
