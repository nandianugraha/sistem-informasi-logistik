<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\Database\ConnectionInterface;

class Masuk_model extends Model
{

        protected $DBGroup = 'default';
        protected $table = 'barang_masuk';
        protected $primaryKey = 'id_masuk';
        protected $returnType = 'array';
        protected $allowedFields = ['id_masuk', 'id_barang', 'nama_barang', 'tanggal_in', 'jumlah', 'satuan'];
    


        public function getBarangMasuk()
        {
                return $this->db->table('barang_masuk')
                        ->join('stok_barang', 'stok_barang.id_stok_barang=barang_masuk.id_barang')
                        ->get()->getResultArray();
        }

        public function getStok()
        {
                return $this->db->table('stok_barang')
                        ->get()->getResultArray();
        }
}
