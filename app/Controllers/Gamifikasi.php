<?php

namespace App\Controllers;

use App\Models\JenisTransaksiModel;

class Gamifikasi extends BaseController
{

    protected $JenisTransaksiModel;

    public function __construct()
    {
        $this->JenisTransaksiModel = new JenisTransaksiModel();
    }

    public function index()
    {
        $data = array(
            'title' => 'Gamifikasi',
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),
        );
        return view('Gamifikasi/gamifikasi', $data);
    }

    public function mahasiswa()
    {
        $data = array(
            'title' => 'Mahasiswa',
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),
        );
        return view('Mahasiswa/mahasiswa', $data);
    }
}
