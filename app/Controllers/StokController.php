<?php
namespace App\Controllers;
use App\Models\Stok_model;
use CodeIgniter\Config\Config;
use CodeIgniter\Controller;
class StokController extends BaseController {

public function __construct() {

   $db = db_connect();
   
}
public function index()
   {
      $session = \Config\Services::session();
      $message = $session->getFlashdata('message');
      $std = new Stok_model();
      $data['stok_barang'] = $std->findAll();
      $pager = \Config\Services::pager();
      $data['message'] = $message;
      echo view('stokbarang', $data);

   }

   public function addPage() {
      echo view('addbarang');
   }

   public function add()
   {
       $validation =  \Config\Services::validation();
       $validation->setRules(['nama_barang' => 'required']);
       $validation->setRules(['kadaluarsa' => 'required']);
       $validation->setRules(['stok' => 'required']);
       $validation->setRules(['satuan' => 'required']);
       $isDataValid = $validation->withRequest($this->request)->run();

       if($isDataValid){
           $news = new Stok_model();
           $news->insert([
               "nama_barang" => $this->request->getPost('nama_barang'),
               "kadaluarsa" => $this->request->getPost('kadaluarsa'),
               "stok" => $this->request->getPost('stok'),
               "satuan" => $this->request->getPost('satuan'),
           ]);
           return redirect('stokbarang');
       }
     
       echo view('addbarang');
     
   }
}