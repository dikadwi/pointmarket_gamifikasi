<?php

namespace App\Controllers;

use App\Models\BadgesModel;
use App\Models\JenisTransaksiModel;
use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    protected $MahasiswaModel;
    protected $BadgesModel;
    protected $JenisTransaksiModel;

    public function __construct()
    {
        $this->BadgesModel = new BadgesModel();
        $this->MahasiswaModel = new MahasiswaModel();
        $this->JenisTransaksiModel = new JenisTransaksiModel();
    }

    public function Index()
    {
        $session = session();
        $data = array(
            'username' => $session->get('username'),
            'title' => 'Mahasiswa',
            'mahasiswa' => $this->MahasiswaModel->getMhs(),
            'badges' => $this->BadgesModel->getBadges(),
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),
        );
        return view('Mahasiswa/mahasiswa', $data);
    }

    public function save_Mhs()
    {
        if (!$this->validate([
            'nama' => 'required|is_unique[mahasiswa.nama]'
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
            'point' => 30,
            // 'badges' => $badges
        ];
        $this->MahasiswaModel->save($data);

        session()->setFlashdata("sukses", "Data Berhasil Ditambah.");
        return redirect()->back();
    }

    public function update_Mhs($id)
    {
        $nama = $this->request->getPost('nama');
        $npm = $this->request->getPost('npm');
        $point = $this->request->getPost('point');

        $data = [
            'nama' => $nama,
            'npm' => $npm,
            'point' => $point
        ];

        $this->MahasiswaModel->update($id, $data);

        session()->setFlashdata("sukses", "Data Berhasil Di Update.");
        return redirect()->back();
    }

    //Menghapus data dari database berdasarkan ID
    public function delete($id)
    {
        $this->MahasiswaModel->delete($id);

        session()->setFlashdata("sukses", "Data Berhasil Dihapus.");

        return redirect()->back();
    }
}
