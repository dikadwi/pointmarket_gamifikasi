<?php

namespace App\Controllers;

use App\Models\JenisTransaksiModel;

class Market_Place extends BaseController
{

    protected $JenisTransaksiModel;

    public function __construct()
    {
        $this->JenisTransaksiModel = new JenisTransaksiModel();
    }

    public function market()
    {
        $data = array(
            'title' => 'Market Place',
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),
        );
        return view('Market_Place/market_place', $data);
    }
}
