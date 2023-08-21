<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\Database\ConnectionInterface;

class Masuk_model extends Model {

    
        protected $DBGroup = 'default';
     
        protected $table = 'barang_masuk';
        protected $primaryKey = 'id_masuk';
        protected $returnType = 'array';
        protected $allowedFields = ['id_masuk', 'id_barang', 'nama_barang', 'tanggal_in', 'jumlah', 'satuan'];
    
     
}