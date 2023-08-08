<?php

namespace App\Controllers;

use App\Models\KendaraanModel;
use App\Models\JenisModel;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\ValidationException;

class Admin extends BaseController
{
    protected $KendaraanModel;
    protected $JenisModel;


    public function __construct()
    {
        $this->KendaraanModel = new KendaraanModel();
        $this->JenisModel = new JenisModel();
    }


    //Menampilkan halaman utama
    public function index()
    {
        $data['title'] = 'Sistem Informasi Parkir';

        return view('Admin/index', $data);
    }

    public function user()
    {
        $data['title'] = 'Data Pengguna';
        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();

        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id as userid, username, email, created_at, name');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $builder->get();

        $data['users'] = $query->getResult();

        return view('Admin/Data_User/user', $data);
    }


    public function detail($id)
    {
        $data['title'] = 'Profile';

        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id as userid, username, email, name');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('users.id', $id);
        $query = $builder->get();

        $data['user'] = $query->getRow();

        return view('Admin/Data_User/detail', $data);
    }

    public function detail_data($id)
    {
        $data['title'] = 'Detail Data';
        $db      = \Config\Database::connect();
        $builder = $db->table('data_kendaraan');
        $builder->where('id', $id);
        $query = $builder->get();
        $data['data'] = $query->getRow();

        return view('Admin/Data_Kendaraan/Roda_2/detail', $data);
    }

    //Menampilkan Semua Data
    public function data()
    {
        $data = [
            'title' => 'Data Kendaraan',
            'jenis' => $this->JenisModel->getJenis(),
            'roda' => $this->KendaraanModel->getRoda()
        ];

        return view('Admin/Data_Kendaraan/data_semua', $data);
    }

    //Menampilkan data dengan jenis terpilih (Roda2)
    public function roda2()
    {

        $db      = \Config\Database::connect();
        $builder = $db->table('data_kendaraan');
        $jenis = ['Roda 2'];
        $builder->whereIn('jenis_kendaraan', $jenis);

        $data = [
            'title' => 'Data Kendaraan Roda 2',
            'jenis' => $this->JenisModel->getJenis(),
            'roda' => $this->KendaraanModel->getRoda($jenis)
        ];

        return view('Admin/Data_Kendaraan/Roda_2/Roda2', $data);
    }

    //Menampilkan data dengan jenis terpilih (Roda4)
    public function roda4()
    {

        $db      = \Config\Database::connect();
        $builder = $db->table('data_kendaraan');
        $jenis = ['Roda 4'];
        $builder->whereIn('jenis_kendaraan', $jenis);

        $data = [
            'title' => 'Data Kendaraan Roda 4',
            'jenis' => $this->JenisModel->getJenis(),
            'roda' => $this->KendaraanModel->getRoda($jenis)
        ];

        return view('Admin/Data_Kendaraan/Roda_4/Roda4', $data);
    }

    public function masuk()
    {
        $data = [
            'title' => 'Data Kendaraan',
            'jenis' => $this->JenisModel->getJenis(),
            'roda' => $this->KendaraanModel->getRoda()
        ];

        return view('Admin/Data_Kendaraan/Masuk/kendaraan_masuk', $data);
    }

    //Menyimpan Data Baru ke database
    public function save_data()
    {

        $id = $this->request->getVar('id');;
        $nama = $this->request->getVar('nama');
        $jenis = $this->request->getVar('jenis');
        $no_kendaraan = $this->request->getVar('no_kendaraan');
        $merk = $this->request->getVar('merk');
        $tipe = $this->request->getVar('tipe');

        $writer = new PngWriter();
        //Create QRCode
        $qrCode = QrCode::create('Nama :' . $nama . '_No-Kend :' . $no_kendaraan . '_Jenis :' . $jenis . '_Merk :' . $merk . '_Tipe :' . $tipe)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        // Create generic logo
        $logo = null;

        // Create generic label
        $label = Label::create($nama)
            ->setTextColor(new Color(255, 0, 0));

        $result = $writer->write($qrCode, $logo, $label);

        // Save it to a file
        $result->saveToFile('img/qrcode/ ' . $nama . '.png');

        // $result = file_get_contents($file);
        // $result = str_replace('img\qrcode', 'qrcode' . APP_NAMESPACE, $result);
        // file_put_contents($file, $result);

        $qr = $result->getDataUri();

        $data = [
            'id' => $id,
            'nama' => $nama,
            'jenis' => $jenis,
            'no_kendaraan' => $no_kendaraan,
            'merk' => $merk,
            'tipe' => $tipe,
            'qr_code' => $qr
        ];

        $this->KendaraanModel->save($data);
        return redirect()->back();
    }


    //Mengupdate data dan disimpan ke database
    public function update_data($id)
    {

        $id = $this->request->getVar('id');;
        $nama = $this->request->getVar('nama');
        $jenis = $this->request->getVar('jenis');
        $no_kendaraan = $this->request->getVar('no_kendaraan');
        $merk = $this->request->getVar('merk');
        $tipe = $this->request->getVar('tipe');

        $writer = new PngWriter();
        //Create QRCode
        $qrCode = QrCode::create('Nama :' . $nama . '_No-Kend :' . $no_kendaraan . '_Jenis :' . $jenis . '_Merk :' . $merk . '_Tipe :' . $tipe)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        // Create generic logo
        $logo = null;

        // Create generic label
        $label = Label::create($nama)
            ->setTextColor(new Color(255, 0, 0));

        $result = $writer->write($qrCode, $logo, $label);

        $qr = $result->getDataUri();

        // Save it to a file
        $result->saveToFile('img/qrcode/ ' . $nama . '.png');

        $data = [
            'id' => $id,
            'nama' => $nama,
            'jenis' => $jenis,
            'no_kendaraan' => $no_kendaraan,
            'merk' => $merk,
            'tipe' => $tipe,
            'qr_code' => $qr
        ];

        $this->KendaraanModel->save($data);
        return redirect()->back();

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');
    }

    //Menghapus data dari database berdasarkan ID
    public function hapus_data($id)
    {
        $this->KendaraanModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil dihapus.');

        return redirect()->back();
    }
}
