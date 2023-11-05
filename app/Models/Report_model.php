<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\Database\ConnectionInterface;

class Report_model extends Model
{

    protected $DBGroup = 'default';
    protected $table = 'stok_barang';
    protected $primaryKey = 'id_report';
    protected $returnType = 'array';
    protected $allowedFields = ['id_report', 'type', 'id_barang', 'nama_barang', 'tanggal_in', 'jumlah', 'satuan'];



    public function getReport()
    {
        return $this->db->table('report')
            ->join('stok_barang', 'stok_barang.id_stok_barang=report.id_barang')
            ->get()->getResultArray();

            // $sql = "SELECT * FROM report JOIN stok_barang ON stok_barang.id_stok_barang=report.id_barang; WHEre";
            // $data = $this->db->query($sql);
            // return $data->getResultArray();  
    }

  
}