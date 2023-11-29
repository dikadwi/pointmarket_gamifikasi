<?php

namespace App\Controllers;

use App\Models\KendaraanModel;
use App\Models\JenisModel;
use App\Models\ScanModel;

class Home extends BaseController
{

    protected $KendaraanModel;
    protected $JenisModel;
    protected $ScanModel;


    public function __construct()
    {
        $this->KendaraanModel = new KendaraanModel();
        $this->JenisModel = new JenisModel();
        $this->ScanModel = new ScanModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Data Kendaraan',
            'jenis' => $this->JenisModel->getJenis(),
            'roda' => $this->KendaraanModel->getRoda()
        ];
        return view('Admin/Data_Kendaraan/Roda_2/tabel', $data);
    }

    public function scan()
    {
        $data = [
            'scan' => $this->ScanModel->findAll()
        ];
        echo view('Admin/scan', $data);
    }

    public function save()
    {
        // $id = $this->request->getVar('id');
        // $text = $this->request->getVar('text');
        // $waktu = $this->request->getVar('waktu');

        // $data = [
        //     'id' => $id,
        //     'nama' => $text,
        //     'waktu' => $waktu
        // ];

        $this->ScanModel->save([
            'text' => $this->request->getVar('text'),
        ]);

        session()->setFlashdata('sukses', 'Data Berhasil ditambahkan.');

        return redirect()->back();
    }
}
