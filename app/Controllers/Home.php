<?php

namespace App\Controllers;

use App\Models\Keluar_model;
use App\Models\Masuk_model;
use App\Models\Rusak_model;
use App\Models\Stok_model;

class Home extends BaseController
{

    public function __construct()
    {

        $db = db_connect();
    }

    public function index()
    {
        
            $masuk = new Masuk_model();
            $keluar = new Keluar_model();
            $stok = new Stok_model();
            $rusak = new Rusak_model();
            $data['count_masuk'] = $masuk->countAllResults();
            $data['count_keluar'] = $keluar->countAllResults();
            $data['count_stok'] = $stok->countAllResults();
            $data['count_rusak'] = $rusak->countAllResults();
            echo view('dashboard', $data);
        
    }

    
    public function login()
    {
        return view('login');
    }
    public function postLogin()
    {
        return view('dashboard');
    }

}
