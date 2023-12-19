<?php

namespace App\Controllers;

use App\Models\BadgesModel;
use App\Models\JenisTransaksiModel;
use App\Models\TransaksiModel;

class Transaksi extends BaseController
{
    protected $BadgesModel;
    protected $JenisTransaksiModel;
    protected $TransaksiModel;

    public function __construct()
    {
        $this->BadgesModel = new BadgesModel();
        $this->JenisTransaksiModel = new JenisTransaksiModel();
        $this->TransaksiModel = new TransaksiModel();
    }

    public function badges()
    {
        $session = session();

        $data = [
            'username' => $session->get('username'),
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
        $point = $this->request->getPost('point');
        $detail = $this->request->getPost('detail');
        $keterangan = $this->request->getPost('keterangan');
        $badges = file_get_contents($_FILES['badges']['tmp_name']);

        $data = [
            'id_badges' => $id_badges,
            'nama' => $nama,
            'point' => $point,
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
        $point = $this->request->getPost('point');
        $detail = $this->request->getPost('detail');
        $keterangan = $this->request->getPost('keterangan');
        $newBadges = $this->request->getFile('badges');

        $data = [
            'nama' => $nama,
            'point' => $point,
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

    public function reward()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('transaksi');
        $jenis = ['101'];
        $builder->whereIn('kode_jenis', $jenis);

        $session = session();

        $data = [
            'username' => $session->get('username'),
            'title' => 'Rewards',
            'transaksi' => $this->TransaksiModel->getJenis($jenis),
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),

        ];
        return view('Transaksi/transaksi', $data);
    }

    public function pembelian()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('transaksi');
        $jenis = ['102'];
        $builder->whereIn('kode_jenis', $jenis);

        $session = session();

        $data = [
            'username' => $session->get('username'),
            'title' => 'Pembelian',
            'transaksi' => $this->TransaksiModel->getJenis($jenis),
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),

        ];
        return view('Transaksi/transaksi', $data);
    }

    public function punishment()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('transaksi');
        $jenis = ['103'];
        $builder->whereIn('kode_jenis', $jenis);

        $session = session();

        $data = [
            'username' => $session->get('username'),
            'title' => 'Punishment',
            'transaksi' => $this->TransaksiModel->getJenis($jenis),
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),

        ];
        return view('Transaksi/transaksi', $data);
    }

    public function misi_tambah()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('transaksi');
        $jenis = ['105'];
        $builder->whereIn('kode_jenis', $jenis);

        $session = session();

        $data = [
            'username' => $session->get('username'),
            'title' => 'Misi Tambahan',
            'transaksi' => $this->TransaksiModel->getJenis($jenis),
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),

        ];
        return view('Transaksi/transaksi', $data);
    }

    //Menghapus data dari database berdasarkan ID
    public function delete($id_transaksi)
    {
        $this->TransaksiModel->delete($id_transaksi);

        session()->setFlashdata("sukses", "Data Berhasil Dihapus.");

        return redirect()->back();
    }
}
