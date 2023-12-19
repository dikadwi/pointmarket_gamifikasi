<?php

namespace App\Controllers;

use App\Models\MarketModel;
use App\Models\JenisTransaksiModel;
use App\Models\MahasiswaModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;

class Market extends BaseController
{
    protected $MarketModel;
    protected $JenisTransaksiModel;
    protected $MahasiswaModel;
    protected $TransaksiModel;

    public function __construct()
    {
        $this->MarketModel = new MarketModel();
        $this->TransaksiModel = new TransaksiModel();
        $this->JenisTransaksiModel = new JenisTransaksiModel();
        $this->MahasiswaModel = new MahasiswaModel();
    }

    public function index()
    {

        $session = session();

        $data = [
            'username' => $session->get('username'),
            'title' => 'Market',
            'market' => $this->MarketModel->getMarket(),
            'mahasiswa' => $this->MahasiswaModel->findAll(),
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),

        ];
        return view('Market/market', $data);
    }

    public function buyItem()
    {
        $session = session();
        // Pastikan pengguna sudah login dan memiliki poin
        if ($session->get('isLoggedIn')) {
            $id = $session->get('id');

            // Inisialisasi model
            $mahasiswaModel = new MahasiswaModel();
            $marketModel = new MarketModel();

            $mahasiswa = $this->MahasiswaModel->find($id);

            // Dapatkan biaya transaksi dari tabel transaksi
            $market = $marketModel->getPoint();

            if ($mahasiswa && isset($mahasiswa['point']) && $market && isset($market['point_harga']) && $mahasiswa['point'] >= $market['point_harga']) {
                // Kurangi poin mahasiswa sesuai biaya transaksi
                $updatedPoint = $mahasiswa['point'] - $market['point_harga'];
                $mahasiswaModel->update($id, ['point' => $updatedPoint]);

                // Simpan transaksi ke dalam tabel transaksi
                $transactionData = [
                    'id' => $id,
                    'point_harga' => $market['point_harga'],
                    // ... // Informasi transaksi lainnya
                ];
                $marketModel->insert($transactionData);

                $this->MarketModel->updateBarang($id, $market['point_harga']);

                return redirect()->to('/success')->with('success', 'Transaction successful.');
            } else {
                return redirect()->back()->with('error', 'Insufficient points.');
            }
        }

        return redirect()->back();
    }
}
