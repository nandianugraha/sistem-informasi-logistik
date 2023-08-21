<?php
namespace App\Controllers;

use App\Models\Masuk_model;
use App\Models\Stok_model;
use CodeIgniter\Config\Config;
use CodeIgniter\Controller;
class MasukController extends BaseController {

public function __construct() {

   $db = db_connect();
   
}
public function index()
   {
      $session = \Config\Services::session();
      $message = $session->getFlashdata('message');
      $std = new Masuk_model();
      $data['masuk_barang'] = $std->findAll();
      $pager = \Config\Services::pager();
      $data['message'] = $message;
      echo view('barangmasuk', $data);

   }

   
}