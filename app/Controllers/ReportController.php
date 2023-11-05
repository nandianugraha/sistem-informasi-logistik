<?php

namespace App\Controllers;

use App\Models\Report_model;
use CodeIgniter\Config\Config;
use CodeIgniter\Controller;

class ReportController extends BaseController
{

   public function __construct()
   {

      $db = db_connect();
   }
   public function index()
   {
      $std = new Report_model();
      $data['report_barang'] = $std->getReport();
      echo view('laporan', $data);
   }

}
