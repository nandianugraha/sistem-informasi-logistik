<?php
namespace App\Controllers;

use App\Models\Masuk_model;
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

   public function addmasuk()
   {
      $validation =  \Config\Services::validation();
       $validation->setRules(['id_barang' => 'required']);
       $validation->setRules(['nama_barang' => 'required']);
       $validation->setRules(['tanggal_in' => 'required']);
       $validation->setRules(['jumlah' => 'required']);
       $validation->setRules(['satuan' => 'required']);
       $isDataValid = $validation->withRequest($this->request)->run();
      
       if($isDataValid){
         $news = new Masuk_model();
         $news->insert([
             "id_barang" => $this->request->getPost('id_barang'),
             "nama_barang" => $this->request->getPost('nama_barang'),
             "tanggal_in" => $this->request->getPost('tanggal_in'),
             "jumlah" => $this->request->getPost('jumlah'),
             "satuan" => $this->request->getPost('satuan'),
         ]);
         return redirect('barangmasuk');
     }
     echo view('addmasuk');
   }

   
}
