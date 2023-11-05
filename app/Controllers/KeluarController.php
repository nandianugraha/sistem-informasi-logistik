<?php

namespace App\Controllers;

use App\Models\Keluar_model;
use App\Models\Stok_model;
use CodeIgniter\Config\Config;
use CodeIgniter\Controller;

class KeluarController extends BaseController
{

   public function __construct()
   {

      $db = db_connect();
   }
   public function index()
   {
      $std = new Keluar_model();
      $data['stok'] = $std->getStok();
      $data['keluar_barang'] = $std->getBarangKeluar();
      echo view('barangkeluar', $data);
   }
   public function addkeluar()
   {

      $news = new Keluar_model();
      $news->insert([
         "id_barang" => $this->request->getPost('id_barang'),
         "tanggal_out" => $this->request->getPost('tanggal_out'),
         "jumlah" => $this->request->getPost('jumlah'),
      ]);
      return redirect('barangkeluar');
   }
}
