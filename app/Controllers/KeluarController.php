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
   public function addkeluar()
   {
      $validation =  \Config\Services::validation();
       $validation->setRules(['id_barang' => 'required']);
       $validation->setRules(['nama_barang' => 'required']);
       $validation->setRules(['tanggal_out' => 'required']);
       $validation->setRules(['jumlah' => 'required']);
       $validation->setRules(['satuan' => 'required']);
       $isDataValid = $validation->withRequest($this->request)->run();
      
       if($isDataValid){
         $news = new Keluar_model();
         $news->insert([
             "id_barang" => $this->request->getPost('id_barang'),
             "nama_barang" => $this->request->getPost('nama_barang'),
             "tanggal_out" => $this->request->getPost('tanggal_out'),
             "jumlah" => $this->request->getPost('jumlah'),
             "satuan" => $this->request->getPost('satuan'),
         ]);
         return redirect('barangkeluar');
     }
     echo view('addkeluar');
   }
}