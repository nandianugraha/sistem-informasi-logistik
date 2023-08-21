<?php
namespace App\Controllers;

use App\Models\Keluar_model;
use App\Models\Stok_model;
use CodeIgniter\Config\Config;
use CodeIgniter\Controller;
class KeluarController extends BaseController {

public function __construct() {

   $db = db_connect();
   
}
public function index()
   {
      $session = \Config\Services::session();
      $message = $session->getFlashdata('message');
      $std = new Keluar_model();
      $data['keluar_barang'] = $std->findAll();
      $pager = \Config\Services::pager();
      $data['message'] = $message;
      echo view('barangkeluar', $data);

   }
}