<?php

namespace App\Controllers;

use App\Models\BadgesModel;
use App\Models\JenisTransaksiModel;
use App\Models\MahasiswaModel;
use App\Models\DataTransaksiModel;
use App\Models\TransaksiModel;

class Role_User extends BaseController
{
    protected $MahasiswaModel;
    protected $BadgesModel;
    protected $JenisTransaksiModel;
    protected $DataTransaksiModel;
    protected $TransaksiModel;

    public function __construct()
    {
        $this->BadgesModel = new BadgesModel();
        $this->MahasiswaModel = new MahasiswaModel();
        $this->JenisTransaksiModel = new JenisTransaksiModel();
        $this->DataTransaksiModel = new DataTransaksiModel();
        $this->TransaksiModel = new TransaksiModel();
    }
    public function index()
    {
        $session = session();

        //Mengambil npm yg sedang login
        $npm = $session->get('npm');

        $data = [
            'title' => 'Point Market',
            'username' => $session->get('username'),
            'id' => $session->get('user_id'),
            'npm' => $session->get('npm'),
            'email' => $session->get('email'),
            'point' => $session->get('point'),
            'totalReward' => $this->DataTransaksiModel->Reward($npm),
            'totalPembelian' => $this->DataTransaksiModel->Pembelian($npm),
            'totalPunishment' => $this->DataTransaksiModel->Punishment($npm),
            'totalMisi' => $this->DataTransaksiModel->Misi($npm),
            'transactions' => $this->DataTransaksiModel->getTransactionsByCategory(),
            'totalBadges' => $this->BadgesModel->totalBadges(),
            'totaluser' => $this->MahasiswaModel->total(),
            'data_transaksi' => $this->DataTransaksiModel->getDataTransaksiUser($npm),
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),
            'badges' => $this->BadgesModel->getBadges(),
            'mahasiswa' => $this->MahasiswaModel->getMhs(),
        ];

        return view('User/index_user', $data);
    }

    public function detail()
    {
        $session = session();

        $data = array(
            'title' => 'Detail',
            'username' => $session->get('username'),
            'id' => $session->get('user_id'),
            'npm' => $session->get('npm'),
            'email' => $session->get('email'),
            'point' => $session->get('point'),
            'badges' => $this->BadgesModel->getBadges(),
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),
        );

        return view('User/detail_profile', $data);
    }

    public function save_email()
    {
        $id = $this->request->getPost('id');
        $email = $this->request->getPost('email');

        $data = [
            'email' => $email
        ];

        $this->MahasiswaModel->update($id, $data);

        $session = session();
        $session->set('email', $email);

        session()->setFlashdata("sukses", "Email Berhasil ditambahkan.");
        return redirect()->back();
    }

    public function Update_Profile()
    {
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $npm = $this->request->getPost('npm');
        $email = $this->request->getPost('email');

        $data = [
            'nama' => $nama,
            'npm' => $npm,
            'email' => $email
        ];

        $this->MahasiswaModel->update($id, $data);

        // Update session data dengan data yg diupdate
        $session = session();
        $session->set('username', $nama);
        $session->set('npm', $npm);
        $session->set('email', $email);

        session()->setFlashdata("sukses", "Data Berhasil di Update.");
        return redirect()->back();
    }

    public function data_transaksi()
    {
        $session = session();

        //Mengambil npm yg sedang login
        $npm = $session->get('npm');

        $data = [
            'title' => 'Transaksi',
            'username' => $session->get('username'),
            'data_transaksi' => $this->DataTransaksiModel->getDataTransaksiUser($npm),
            'transaksi' => $this->TransaksiModel->getTransaksi(),
            'npm' => $this->MahasiswaModel->getMhs(),
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),
            'jenis' => $this->JenisTransaksiModel->getJenis(),
        ];
        return view('User/transaksi/data_transaksi', $data);
    }

    public function reward()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('transaksi');
        $jenis = ['101'];
        $builder->whereIn('kode_jenis', $jenis);

        $session = session();

        $data = [
            'title' => 'Rewards',
            'username' => $session->get('username'),
            'transaksi' => $this->TransaksiModel->getJenis($jenis),
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),

        ];
        return view('User/transaksi/jenis_transaksi', $data);
    }

    public function pembelian()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('transaksi');
        $jenis = ['102'];
        $builder->whereIn('kode_jenis', $jenis);

        $session = session();

        $data = [
            'title' => 'Pembelian',
            'username' => $session->get('username'),
            'transaksi' => $this->TransaksiModel->getJenis($jenis),
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),

        ];
        return view('User/transaksi/jenis_transaksi', $data);
    }

    public function punishment()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('transaksi');
        $jenis = ['103'];
        $builder->whereIn('kode_jenis', $jenis);

        $session = session();

        $data = [
            'title' => 'Punishment',
            'username' => $session->get('username'),
            'transaksi' => $this->TransaksiModel->getJenis($jenis),
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),

        ];
        return view('User/transaksi/jenis_transaksi', $data);
    }

    public function misi()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('transaksi');
        $jenis = ['105'];
        $builder->whereIn('kode_jenis', $jenis);

        $session = session();

        $data = [
            'title' => 'Misi Tambahan',
            'username' => $session->get('username'),
            'transaksi' => $this->TransaksiModel->getJenis($jenis),
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),

        ];
        return view('User/transaksi/jenis_transaksi', $data);
    }

    public function transaksi_reward()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('data_transaksi');
        $jenis = ['101'];
        $builder->whereIn('jenis_transaksi', $jenis);

        $session = session();

        $data = [
            'username' => $session->get('username'),
            'title' => 'Transaksi Rewards',
            'data_transaksi' => $this->DataTransaksiModel->getJenis($jenis),
            'transaksi' => $this->TransaksiModel->getJenis(),
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),
            'npm' => $this->MahasiswaModel->getMhs(),

        ];
        return view('User/transaksi/data_transaksi', $data);
    }

    public function transaksi_pembelian()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('data_transaksi');
        $jenis = ['102'];
        $builder->whereIn('jenis_transaksi', $jenis);

        $session = session();

        $data = [
            'username' => $session->get('username'),
            'title' => 'Transaksi Pembelian',
            'data_transaksi' => $this->DataTransaksiModel->getJenis($jenis),
            'transaksi' => $this->TransaksiModel->getJenis(),
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),
            'npm' => $this->MahasiswaModel->getMhs(),

        ];
        return view('User/transaksi/data_transaksi', $data);
    }

    public function transaksi_punishment()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('data_transaksi');
        $jenis = ['103'];
        $builder->whereIn('jenis_transaksi', $jenis);

        $session = session();

        $data = [
            'username' => $session->get('username'),
            'title' => 'Transaksi Punishment',
            'data_transaksi' => $this->DataTransaksiModel->getJenis($jenis),
            'transaksi' => $this->TransaksiModel->getJenis(),
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),
            'npm' => $this->MahasiswaModel->getMhs(),

        ];
        return view('User/transaksi/data_transaksi', $data);
    }

    public function transaksi_misi_tambah()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('data_transaksi');
        $jenis = ['105'];
        $builder->whereIn('jenis_transaksi', $jenis);

        $session = session();

        $data = [
            'username' => $session->get('username'),
            'title' => 'Transaksi Misi Tambahan',
            'data_transaksi' => $this->DataTransaksiModel->getJenis($jenis),
            'transaksi' => $this->TransaksiModel->getJenis(),
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),
            'npm' => $this->MahasiswaModel->getMhs(),

        ];
        return view('User/transaksi/data_transaksi', $data);
    }

    public function badges()
    {
        $session = session();

        $data = [
            'title' => 'Badges',
            'username' => $session->get('username'),
            'badges' => $this->BadgesModel->getBadges(),
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),

        ];
        return view('User/Badges/badges', $data);
    }
}
