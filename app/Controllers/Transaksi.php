<?php

namespace App\Controllers;

use App\Models\BadgesModel;
use App\Models\JenisTransaksiModel;

class Transaksi extends BaseController
{
    protected $BadgesModel;
    protected $JenisTransaksiModel;

    public function __construct()
    {
        $this->BadgesModel = new BadgesModel();
        $this->JenisTransaksiModel = new JenisTransaksiModel();
    }

    public function badges()
    {

        $data = [
            'title' => 'Badges',
            'badges' => $this->BadgesModel->getBadges(),
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),

        ];
        return view('Badges/badges', $data);
    }

    public function save_badges()
    {
        if (!$this->validate([
            'nama' => 'required|is_unique[badges.nama]'
        ])) {
            session()->setFlashdata("gagal", "Data Sudah Ada !");
        }

        $id_badges = $this->request->getPost('id_badges');
        $nama = $this->request->getPost('nama');
        $detail = $this->request->getPost('detail');
        $keterangan = $this->request->getPost('keterangan');
        $badges = file_get_contents($_FILES['badges']['tmp_name']);

        $data = [
            'id_badges' => $id_badges,
            'nama' => $nama,
            'detail' => $detail,
            'keterangan' => $keterangan,
            'badges' => $badges
        ];
        $this->BadgesModel->save($data);

        session()->setFlashdata("sukses", "Data Berhasil Ditambah.");
        return redirect()->back();
    }

    public function update_badges($id_badges)
    {
        $nama = $this->request->getPost('nama');
        $detail = $this->request->getPost('detail');
        $keterangan = $this->request->getPost('keterangan');
        $newBadges = $this->request->getFile('badges');

        $data = [
            'nama' => $nama,
            'detail' => $detail,
            'keterangan' => $keterangan
        ];

        // Periksa apakah ada gambar baru yang diunggah
        if ($newBadges->isValid() && !$newBadges->hasMoved()) {
            // Jika ada gambar baru diunggah, simpan gambar baru
            $newBadges->move(ROOTPATH . 'path_to_your_images_folder');
            $data['badges'] = $newBadges->getName();
        }

        $this->BadgesModel->update($id_badges, $data);

        session()->setFlashdata("sukses", "Data Berhasil Di Update.");
        return redirect()->back();
    }

    //Menghapus data dari database berdasarkan ID
    public function hapus_badges($id_badges)
    {
        $this->BadgesModel->delete($id_badges);

        session()->setFlashdata("sukses", "Data Berhasil Dihapus.");

        return redirect()->back();
    }
}
