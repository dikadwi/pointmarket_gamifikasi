<?php

namespace App\Controllers;

use App\Models\KendaraanModel;
use App\Models\JenisModel;
use App\Models\JenisTransaksiModel;
use App\Models\TransaksiModel;
use App\Models\ScanModel;
use App\Models\UserModel;
use Dompdf\Dompdf;
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
    protected $UserModel;
    protected $ScanModel;
    protected $JenisTransaksiModel;
    protected $TransaksiModel;


    public function __construct()
    {
        $this->KendaraanModel = new KendaraanModel();
        $this->JenisModel = new JenisModel();
        $this->UserModel = new UserModel();
        $this->ScanModel = new ScanModel();
        $this->JenisTransaksiModel = new JenisTransaksiModel();
        $this->TransaksiModel = new TransaksiModel();
    }


    //Menampilkan halaman utama
    public function index()
    {
        $data = array(
            'title' => 'Point Market',
            'totaldata' => $this->KendaraanModel->total(),
            'totaluser' => $this->UserModel->total(),
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),
        );

        return view('index', $data);
    }

    // Menampilkan semua data user
    public function user()
    {
        $data = array(
            'title' => 'Data Pengguna',
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),
        );
        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();

        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id as userid, username, email, created_at, name');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $builder->get();

        $data['users'] = $query->getResult();

        return view('Data_User/user', $data);
    }

    //Menampilkan detail user sesuai id
    public function detail($id)
    {

        $data = array(
            'title' => 'Detail',
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),
        );
        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();

        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id as userid, username, email, created_at, name');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('users.id', $id);
        $query = $builder->get();

        $data['user'] = $query->getRow();

        return view('Data_User/detail', $data);
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

        return view('Admin/Data_Kendaraan/Roda2', $data);
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

        return view('Admin/Data_Kendaraan/Roda4', $data);
    }

    //Menampilkan data kendaraan masuk
    public function masuk()
    {

        $data = [
            'title' => 'Data Kendaraan',
            // 'jenis' => $this->JenisModel->getJenis(),
            // 'roda' => $this->KendaraanModel->getRoda(),
            'scan' => $this->ScanModel->findAll(),
        ];

        return view('Admin/Data_Kendaraan/kendaraan_masuk', $data);
    }

    //Melakukan convert pdf
    public function printpdf()
    {
        $data = [
            'roda' => $this->KendaraanModel->findAll(),
        ];
        // return view('Admin/pdf', $data);

        $dompdf = new Dompdf();

        $html = view('Admin/pdf/pdf', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('data_kendaraan.pdf', array("Attachment" => false));
    }

    //Melakukan convert pdf sesuai id
    public function cetakpdf($id)
    {
        $data = [
            'roda' => $this->KendaraanModel->getId($id),
        ];
        // return view('Admin/pdf/cetak', $data);

        $dompdf = new Dompdf();

        $html = view('Admin/pdf/cetak', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('detail.pdf', array("Attachment" => false));
    }

    //Menyimpan Data Baru ke database dan Generate QRCode
    public function save_data()
    {
        if (!$this->validate([
            'nama' => 'required|is_unique[data_kendaraan.nama]'
        ])) {
            session()->setFlashdata("gagal", "Data Sudah Ada !");
        }

        $id = $this->request->getVar('id');
        $nama = $this->request->getVar('nama');
        $jenis = $this->request->getVar('jenis');
        $no_kendaraan = $this->request->getVar('no_kendaraan');
        $merk = $this->request->getVar('merk');
        $tipe = $this->request->getVar('tipe');

        $writer = new PngWriter();
        //Create QRCode
        // $qrCode = QrCode::create('Nama :' . $nama . '_No-Kend :' . $no_kendaraan . '_Jenis :' . $jenis . '_Merk :' . $merk . '_Tipe :' . $tipe)
        $qrCode = QrCode::create($nama)
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

        session()->setFlashdata("sukses", "Data Berhasil Ditambah.");

        $this->KendaraanModel->save($data);
        return redirect()->back();
    }

    public function save_transaksi()
    {
        if (!$this->validate([
            'nama' => 'required|is_unique[data_kendaraan.nama]'
        ])) {
            session()->setFlashdata("gagal", "Data Sudah Ada !");
        }

        $id_jenis = $this->request->getVar('id_jenis');
        $nama = $this->request->getVar('nama');
        $detail = $this->request->getVar('detail');
        $keterangan = $this->request->getVar('keterangan');
        $point = $this->request->getVar('point');

        $data = [
            'id_jenis' => $id_jenis,
            'nama' => $nama,
            'detail' => $detail,
            'keterangan' => $keterangan,
            'point' => $point
        ];

        session()->setFlashdata("sukses", "Data Berhasil Ditambah.");

        $this->TransaksiModel->save($data);
        return redirect()->back();
    }

    //Mengupdate data dan disimpan ke database dan Generate ulang QRCode
    public function update_data($id)
    {

        $id = $this->request->getVar('id');
        $nama = $this->request->getVar('nama');
        $jenis = $this->request->getVar('jenis');
        $no_kendaraan = $this->request->getVar('no_kendaraan');
        $merk = $this->request->getVar('merk');
        $tipe = $this->request->getVar('tipe');

        $writer = new PngWriter();
        //Create QRCode
        // $qrCode = QrCode::create($nama . '_' . $no_kendaraan . '_' . $jenis . '_' . $merk . '_' . $tipe)
        $qrCode = QrCode::create($nama)
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

        session()->setFlashdata("sukses", "Data Berhasil Diupdate.");

        $this->KendaraanModel->save($data);
        return redirect()->back();
    }

    //Menghapus data dari database berdasarkan ID
    public function hapus_data($id)
    {
        $this->KendaraanModel->delete($id);

        session()->setFlashdata("sukses", "Data Berhasil Dihapus.");

        return redirect()->back();
    }



    // public function detail_data($id)
    // {
    //     $data['title'] = 'Detail Data';
    //     $db      = \Config\Database::connect();
    //     $builder = $db->table('data_kendaraan');
    //     $builder->where('id', $id);
    //     $query = $builder->get();
    //     $data['data'] = $query->getRow();

    //     return view('Admin/Data_Kendaraan/Roda_2/detail', $data);
    // }
}
