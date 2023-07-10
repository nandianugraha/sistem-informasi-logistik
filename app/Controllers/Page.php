<?php namespace App\Controllers;

class Page extends BaseController
{
	public function barangmasuk()
	{
		return view('barangmasuk');
	}
    
    public function stokbarang()
	{
		return view('stokbarang');
	}
    
    public function barangkeluar()
	{
		return view('barangkeluar');
	}

}