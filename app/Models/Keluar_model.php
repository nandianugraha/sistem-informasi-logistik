<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\Database\ConnectionInterface;

class Keluar_model extends Model
{

        protected $DBGroup = 'default';
        protected $table = 'barang_keluar';
        protected $primaryKey = 'id_keluar';
        protected $returnType = 'array';
        protected $allowedFields = ['id_keluar', 'id_barang', 'nama_barang', 'tanggal_out', 'jumlah', 'satuan'];


        public function getBarangKeluar()
        {
                return $this->db->table('barang_keluar')
                        ->join('stok_barang', 'stok_barang.id_stok_barang=barang_keluar.id_barang')
                        ->get()->getResultArray();
        }

        public function getStok()
        {
                return $this->db->table('stok_barang')
                        ->get()->getResultArray();
        }
}
