<?php 

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Provinsi;

class ClientController extends Controller {

	function index(){
		$data['list_produk'] = Produk::Paginate(5);
		$data['list_provinsi'] = Provinsi::all();

		return view ('home', $data);
	}

}

	