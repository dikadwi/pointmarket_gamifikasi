<?php

namespace App\Controllers;

use App\Models\BadgesModel;
use App\Models\JenisTransaksiModel;
use App\Models\TransaksiModel;
use App\Models\DataTransaksiModel;
use App\Models\MahasiswaModel;
use CodeIgniter\HTTP\Request;



class Transaksi extends BaseController
{
    protected $BadgesModel;
    protected $JenisTransaksiModel;
    protected $TransaksiModel;
    protected $DataTransaksiModel;
    protected $MahasiswaModel;

    public function __construct()
    {
        $this->BadgesModel = new BadgesModel();
        $this->JenisTransaksiModel = new JenisTransaksiModel();
        $this->TransaksiModel = new TransaksiModel();
        $this->DataTransaksiModel = new DataTransaksiModel();
        $this->MahasiswaModel = new MahasiswaModel();
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
        return view('Transaksi/jenis_transaksi', $data);
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
        return view('Transaksi/jenis_transaksi', $data);
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
        return view('Transaksi/jenis_transaksi', $data);
    }

    public function misi_tambah()
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
        return view('Transaksi/jenis_transaksi', $data);
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
        return view('Transaksi/data_transaksi', $data);
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
        return view('Transaksi/data_transaksi', $data);
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
        return view('Transaksi/data_transaksi', $data);
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
        return view('Transaksi/data_transaksi', $data);
    }

    public function validasi()
    {
        $session = session();

        $data = [
            'username' => $session->get('username'),
            'title' => 'Validasi',
            'data_transaksi' => $this->DataTransaksiModel->getDataTransaksi(),
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),
            'transaksi' => $this->TransaksiModel->getTransaksi(),
            'npm' => $this->MahasiswaModel->getMhs(),

        ];
        return view('Transaksi/validasi', $data);
    }

    public function data_transaksi()
    {
        $session = session();

        $data = [
            'title' => 'Transaksi',
            'username' => $session->get('username'),
            'data_transaksi' => $this->DataTransaksiModel->getDataTransaksi(),
            'transaksi' => $this->TransaksiModel->getTransaksi(),
            'npm' => $this->MahasiswaModel->getMhs(),
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),
            'jenis' => $this->JenisTransaksiModel->getJenis(),
        ];
        return view('Transaksi/data_transaksi', $data);
    }

    public function data_misitambah()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('data_transaksi');
        $jenis = ['105'];
        $builder->whereIn('jenis_transaksi', $jenis);

        $session = session();

        $data = [
            'title' => 'Transaksi Misi Tambahan',
            'username' => $session->get('username'),
            'data_transaksi' => $this->DataTransaksiModel->getJenis($jenis),
            'transaksi' => $this->TransaksiModel->getTransaksi(),
            'npm' => $this->MahasiswaModel->getMhs(),
            'jenis_transaksi' => $this->JenisTransaksiModel->getJenis(),
            'jenis' => $this->JenisTransaksiModel->getJenis(),
        ];
        return view('Transaksi/data_misitambah', $data);
    }

    //Save data jenis_transaksi
    public function save_transaksi()
    {
        if (!$this->validate([
            'nama_transaksi' => 'required|is_unique[transaksi.nama_transaksi]'
        ])) {
            return redirect()->back()->withInput()->with("gagal", "Data Sudah Ada !");
        }

        $kode_jenis = $this->request->getVar('kode_jenis');
        $nama = $this->request->getVar('nama_transaksi');
        $detail = $this->request->getVar('detail');
        $keterangan = $this->request->getVar('keterangan');
        $point = $this->request->getVar('poin_digunakan');

        $data = [
            'kode_jenis' => $kode_jenis,
            'nama_transaksi' => $nama,
            'detail' => $detail,
            'keterangan' => $keterangan,
            'poin_digunakan' => $point
        ];
        $this->TransaksiModel->save($data);

        session()->setFlashdata("sukses", "Data $nama Berhasil Ditambah.");
        return redirect()->back();
    }

    // Save data transaksi
    public function save_dataTransaksi()
    {
        $npm = $this->request->getVar('npm');
        $poin_digunakan = $this->request->getVar('poin_digunakan');

        // Periksa apakah nilai `$npm` kosong
        if (empty($npm)) {
            session()->setFlashdata("gagal", "NPM tidak boleh kosong.");
            return redirect()->back();
        }

        // Periksa apakah nilai `$poin_digunakan` kosong
        if (empty($poin_digunakan)) {
            session()->setFlashdata("gagal", "Poin yang digunakan tidak boleh kosong.");
            return redirect()->back();
        }

        // Ambil informasi poin mahasiswa berdasarkan NPM dari tabel mahasiswa
        $mahasiswaData = $this->MahasiswaModel->where('npm', $npm)->first();

        if ($mahasiswaData) {
            $totalPoinMahasiswa = $mahasiswaData['point']; // Sesuaikan dengan nama kolom yang menyimpan total poin mahasiswa

            // Pastikan poin yang akan digunakan tidak melebihi total poin yang dimiliki oleh mahasiswa
            if ($poin_digunakan <> $totalPoinMahasiswa) {

                // Siapkan data untuk disimpan ke dalam tabel transaksi
                $data_transaksi = [
                    'id_transaksi' => $this->request->getVar('id_transaksi'),
                    'jenis_transaksi' => $this->request->getVar('jenis_transaksi'),
                    'nama_transaksi' => $this->request->getVar('nama_transaksi'),
                    'npm' => $mahasiswaData['npm'],
                    'poin_digunakan' => $poin_digunakan,
                    'tanggal_transaksi' => date('Y-m-d H:i:s'), // Sesuaikan dengan format tanggal
                    'validation' => 'Belum'
                ];

                // Simpan data transaksi ke dalam tabel transaksi
                $this->DataTransaksiModel->insert($data_transaksi);

                // Periksa apakah kode_jenis transaksi adalah '101'
                if ($this->request->getVar('jenis_transaksi') == '101') {
                    // Tambahkan poin mahasiswa dengan jumlah poin yang digunakan
                    $sisaPoin = $totalPoinMahasiswa + $poin_digunakan;
                    // $this->MahasiswaModel->update($mahasiswaData['id'], ['point' => $sisaPoin]);
                } else {
                    // Kurangi total poin mahasiswa dengan poin yang digunakan
                    $sisaPoin = $totalPoinMahasiswa - $poin_digunakan;
                    // $this->MahasiswaModel->update($mahasiswaData['id'], ['point' => $sisaPoin]);
                }

                $this->MahasiswaModel->update($mahasiswaData['id'], ['point' => $sisaPoin]);

                session()->setFlashdata("sukses", "Transaksi berhasil. Sisa poin: " . $sisaPoin);
                return redirect()->back();
            } else {
                session()->setFlashdata("gagal", "Poin tidak cukup.");
                return redirect()->back();
            }
        } else {
            session()->setFlashdata("gagal", "Mahasiswa dengan NPM tersebut tidak ditemukan.");
            return redirect()->back();
        }
    }

    // Update data jenis transaksi
    public function update_transaksi($id_transaksi)
    {
        $nama = $this->request->getPost('nama');
        $detail = $this->request->getPost('detail');
        $keterangan = $this->request->getPost('keterangan');
        $poin_digunakan = $this->request->getPost('poin_digunakan');

        $data = [
            'nama' => $nama,
            'detail' => $detail,
            'keterangan' => $keterangan,
            'poin_digunakan' => $poin_digunakan
        ];
        $this->TransaksiModel->update($id_transaksi, $data);

        session()->setFlashdata("sukses", "Data $nama Berhasil di Update.");
        return redirect()->back();
    }

    // Update data transaksi
    public function update_data_transaksi($id)
    {
        $npm = $this->request->getPost('npm');
        $validation = $this->request->getPost('validation');

        $data = [
            'npm' => $npm,
            'validation' => $validation
        ];

        $this->DataTransaksiModel->update($id, $data);

        session()->setFlashdata("sukses", "Data Berhasil di Update.");
        return redirect()->back();
    }

    //Menghapus data jenis transaksi dari database berdasarkan ID
    public function delete($id_transaksi)
    {
        $this->TransaksiModel->delete($id_transaksi);

        session()->setFlashdata("sukses", "Data Berhasil Dihapus.");

        return redirect()->back();
    }

    //Menghapus data transaksi dari database berdasarkan ID
    public function delete_data($kode_transaksi)
    {
        $this->DataTransaksiModel->delete($kode_transaksi);

        session()->setFlashdata("sukses", "Data Berhasil Dihapus.");

        return redirect()->back();
    }
}
