<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\Database\ConnectionInterface;

class Stok_model extends Model {

    
        protected $DBGroup = 'default';
     
        protected $table = 'stok_barang';
        protected $primaryKey = 'id_stok_barang';
        protected $returnType = 'array';
        protected $allowedFields = ['id_stok_barang', 'nama_barang', 'kadaluarsa', 'stok', 'satuan'];
    
        
     
}