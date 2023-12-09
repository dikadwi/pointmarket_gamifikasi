<?php

namespace App\Controllers;

use App\Models\BadgesModel;
use App\Models\JenisTransaksiModel;
use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    protected $MahasiswaModel;
    protected $JenisTransaksiModel;

    public function __construct()
    {
        $this->MahasiswaModel = new MahasiswaModel();
        $this->JenisTransaksiModel = new JenisTransaksiModel();
    }

    public function Index()
    {
        $data = array(
            'title' => 'Mahasiswa',
            'mahasiswa' => $this->MahasiswaModel->getMhs(),
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),
        );
        return view('Mahasiswa/mahasiswa', $data);
    }

    public function save_Mhs()
    {
        if (!$this->validate([
            'nama' => 'required|is_unique[badges.nama]'
        ])) {
            session()->setFlashdata("gagal", "Data Sudah Ada !");
        }

        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $npm = $this->request->getPost('npm');
        // $point = $this->request->getPost('point');
        // $badges = file_get_contents($_FILES['badges']['tmp_name']);

        $data = [
            'id' => $id,
            'nama' => $nama,
            'npm' => $npm,
            'point' => 10,
            // 'badges' => $badges
        ];
        $this->MahasiswaModel->save($data);

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

        $this->MahasiswaModel->update($id_badges, $data);

        session()->setFlashdata("sukses", "Data Berhasil Di Update.");
        return redirect()->back();
    }

    //Menghapus data dari database berdasarkan ID
    public function hapus_Mhs($id)
    {
        $this->MahasiswaModel->delete($id);

        session()->setFlashdata("sukses", "Data Berhasil Dihapus.");

        return redirect()->back();
    }
}
