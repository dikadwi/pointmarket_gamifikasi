<?php

namespace App\Controllers;

use App\Models\PoinModel;
use App\Models\TransaksiMhsModel;
use App\Models\JenisTransaksiMhsModel;

class TransaksiController extends BaseController
{
    public function index()
    {
        // Load model JenisTransaksiModel
        $jenisTransaksiModel = new JenisTransaksiMhsModel();

        // Ambil daftar jenis transaksi
        $data['jenis_transaksi_list'] = $jenisTransaksiModel->findAll();

        // Load model PoinModel
        $poinModel = new PoinModel();

        // Ambil data untuk dropdown NPM
        $data['npm_list'] = $poinModel->distinct()->findColumn('npm');

        return view('Tes/transaksi_form', $data);
    }

    public function beliPoin()
    {
        $transaksiModel = new TransaksiMhsModel();
        $poinModel = new PoinModel();
        $jenisTransaksiModel = new JenisTransaksiMhsModel();

        // Ambil data dari form
        $npm = $this->request->getPost('npm');
        $jenisTransaksi = $this->request->getPost('jenis_transaksi');

        // Mengambil poin yang tersedia dari npm yang dipilih
        $poinData = $poinModel->getPoinByNPM($npm);

        if ($poinData) {
            // Mengambil poin yang dibutuhkan berdasarkan jenis transaksi
            $poinDigunakan = $jenisTransaksiModel->getPoinDigunakanByJenisTransaksi($jenisTransaksi);

            if ($poinDigunakan !== null && $poinDigunakan <= $poinData['poin'] && $poinDigunakan > 0) {
                // Simpan transaksi ke dalam tabel transaksi
                $transaksiModel->beliPoin($npm, $jenisTransaksi);

                // Kurangi poin dari npm yang dipilih
                $poinModel->update($poinData['id'], ['poin' => $poinData['poin'] - $poinDigunakan]);

                return redirect()->to('/transaksi_berhasil');
            } else {
                // Poin yang dimasukkan tidak valid, kembali ke halaman sebelumnya dengan pesan kesalahan
                return redirect()->back()->with('error', 'Poin yang dimasukkan tidak valid atau melebihi poin yang tersedia.');
            }
        } else {
            // NPM tidak ditemukan, kembali ke halaman sebelumnya dengan pesan kesalahan
            return redirect()->back()->with('error', 'NPM tidak ditemukan.');
        }
    }
}
