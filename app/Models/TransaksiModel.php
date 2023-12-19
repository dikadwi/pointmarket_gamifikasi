<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{


    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['kode_jenis', 'nama', 'detail', 'keterangan', 'point'];

    public function getTransaksi()
    {
        return $this->findAll();
    }

    public function totalReward()
    {
        return $this->where('kode_jenis', 101)->countAllResults();
    }

    public function totalChallanges()
    {
        return $this->where('kode_jenis', 102)->countAllResults();
    }

    public function getJenis($jenis = false)
    {
        return $this->where(['kode_jenis' => $jenis])->find();
    }

    public function getPoint()
    {
        return $this->where(['point' => 'point']);
    }

    public function getJ()
    {
        return $this->db->table('transaksi')
            ->select('transaksi.*, jenis_transaksi.nama_transaksi')
            ->join('jenis_transaksi', 'jenis_transaksi.id_jenis = transaksi.id_jenis')
            ->get()
            ->getResultArray();
    }
}
