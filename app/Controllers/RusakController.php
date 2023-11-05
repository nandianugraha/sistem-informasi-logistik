<?php

namespace App\Controllers;

use App\Models\Rusak_model;
use CodeIgniter\Config\Config;
use CodeIgniter\Controller;

class RusakController extends BaseController
{

    public function __construct()
    {

        $db = db_connect();
    }

    public function index()
    {
        $std = new Rusak_model();
        $data['stok'] = $std->getStok();
        $data['rusak_barang'] = $std->getBarangRusak();
        echo view('barangrusak', $data);
    }

    public function addrusak()
   {

      $news = new Rusak_model();
      $news->insert([
         "id_barang" => $this->request->getPost('id_barang'),
         "tanggal_rusak" => $this->request->getPost('tanggal_rusak'),
         "jumlah" => $this->request->getPost('jumlah'),
      ]);
      return redirect('barangrusak');
   }
}
