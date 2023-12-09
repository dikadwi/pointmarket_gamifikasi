<?php

namespace App\Controllers;

use App\Models\MarketModel;
use App\Models\JenisTransaksiModel;
use App\Models\MahasiswaModel;
use App\Models\UserModel;

class Market extends BaseController
{
    protected $MarketModel;
    protected $JenisTransaksiModel;
    protected $MahasiswaModel;

    public function __construct()
    {
        $this->MarketModel = new MarketModel();
        $this->JenisTransaksiModel = new JenisTransaksiModel();
        $this->MahasiswaModel = new MahasiswaModel();
    }

    public function index()
    {

        $data = [
            'title' => 'Market',
            'market' => $this->MarketModel->getMarket(),
            'items' => $this->MarketModel->findAll(),
            'mahasiswa' => $this->MahasiswaModel->findAll(),
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),

        ];
        return view('Market/market', $data);
    }

    //     public function buyItem($itemId, $mahasiswaId)
    //     {
    //         $itemId = $this->request->getPost('item');
    //         $mahasiswaId = $this->request->getPost('mahasiswa');

    //         // Ambil informasi item yang akan dibeli dari model MahasiswaModel
    //         $mahasiswaModel = new MahasiswaModel();
    //         $item = $mahasiswaModel->find($itemId);

    //         // Lakukan validasi apakah mahasiswa memiliki cukup point untuk membeli item
    //         if ($item && $mahasiswaId) {
    //             // Ambil informasi mahasiswa dari model MahasiswaModel
    //             $mahasiswa = $mahasiswaModel->find($mahasiswaId);

    //             if ($mahasiswa['point'] >= $item['point']) {
    //                 // Kurangi point mahasiswa
    //                 $newPoint = $mahasiswa['point'] - $item['point'];
    //                 $mahasiswaModel->update($mahasiswaId, ['point' => $newPoint]);

    //                 // Lakukan tindakan lain, misalnya menambahkan item ke inventaris mahasiswa
    //                 // ...

    //                 return redirect()->to('/market')->with('success', 'Item berhasil dibeli.');
    //             } else {
    //                 return redirect()->to('/market')->with('error', 'Point tidak cukup untuk membeli item ini.');
    //             }
    //         } else {
    //             return redirect()->to('/market')->with('error', 'Item tidak ditemukan atau kesalahan pada akun mahasiswa.');
    //         }
    //     }
}
