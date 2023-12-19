<?php

namespace App\Models;

use CodeIgniter\Model;

class MarketModel extends Model
{


    protected $table = 'market';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'nama', 'detail', 'point_harga'];


    public function getMarket()
    {
        return $this->findAll();
    }

    public function getPoint()
    {
        return $this->select('point_harga')->first();
    }

    // public function updateBarang($id, $point_harga)
    // {
    //     // Mengambil data barang berdasarkan ID
    //     $barang = $this->db->where('id', $id)->get('barang')->row();

    //     if ($barang) {
    //         // Menghitung stok baru
    //         $stok_baru = $barang->stok - $point_harga; // Mengurangi stok sesuai dengan point_harga

    //         // Update stok barang
    //         $this->db->where('id', $id);
    //         $this->db->update('barang', ['stok' => $stok_baru]);

    //         return true; // Berhasil mengupdate stok
    //     }

    //     return false; // Gagal mengupdate stok (barang tidak ditemukan)
    // }
}
