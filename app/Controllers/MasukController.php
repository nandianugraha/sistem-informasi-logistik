<?php

namespace App\Controllers;

use App\Models\Masuk_model;
use CodeIgniter\Config\Config;
use CodeIgniter\Controller;

class MasukController extends BaseController
{

   public function __construct()
   {

      $db = db_connect();
   }
   public function index()
   {
      $std = new Masuk_model();
      $data['stok'] = $std->getStok();
      $data['masuk_barang'] = $std->getBarangMasuk();
      echo view('barangmasuk', $data);
   }

   public function addmasuk()
   {
      $masuk = new Masuk_model();
      $masuk->insert([
         "id_barang" => $this->request->getPost('id_barang'),
         "tanggal_in" => $this->request->getPost('tanggal_in'),
         "jumlah" => $this->request->getPost('jumlah'),
      ]);

      return redirect('barangmasuk');
   }
}
