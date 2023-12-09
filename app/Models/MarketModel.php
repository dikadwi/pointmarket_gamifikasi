<?php

namespace App\Models;

use CodeIgniter\Model;

class MarketModel extends Model
{


    protected $table = 'market';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'nama', 'detail', 'point'];


    public function getMarket()
    {
        return $this->findAll();
    }
}
