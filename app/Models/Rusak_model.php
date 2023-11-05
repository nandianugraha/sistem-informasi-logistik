<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\Database\ConnectionInterface;

class Rusak_model extends Model
{

        protected $DBGroup = 'default';
        protected $table = 'barang_rusak';
        protected $primaryKey = 'id_rusak';
        protected $returnType = 'array';
        protected $allowedFields = ['id_rusak', 'id_barang', 'nama_barang', 'tanggal_rusak', 'jumlah', 'satuan'];


        public function getBarangRusak()
        {
                return $this->db->table('barang_rusak')
                        ->join('stok_barang', 'stok_barang.id_stok_barang=barang_rusak.id_barang')
                        ->get()->getResultArray();
        }

        public function getStok()
        {
                return $this->db->table('stok_barang')
                        ->get()->getResultArray();
        }
}
