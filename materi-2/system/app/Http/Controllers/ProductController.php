<?php 

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Provinsi;
class ProductController extends Controller {
	function index(){
		$user = request()->user();
		$data['list_produk'] = Product::all();
		return view ('produk.index', $data);

	}

	function create(){
		return view ('product.create');

	}

	function store(){

		$produk = new product;
		$produk->id_user = request()->user()->id;
		$produk->nama = request('nama');
		$produk->harga = request('harga');
		$produk->berat = request('berat');
		$produk->stok = request('stok');
		$produk->deskripsi = request('deskripsi');
		$produk->save();

		$produk->handleUploadFoto();

		return redirect('admin/produk')->with('success', 'Data Berhasil Ditambahkan');

	}

	function show(Product $produk){
		$data['produk'] = $produk;
		return view('produk.show', $data);
	}

	function edit(Product $produk){
		$data['produk'] = $produk;
		return view('produk.edit', $data);
		
	}

	function update(Product $produk){
		$produk->nama = request('nama');
		$produk->harga = request('harga');
		$produk->berat = request('berat');
		$produk->stok = request('stok');
		$produk->deskripsi = request('deskripsi');
		$produk->save();

		$produk->handleUploadFoto();

		return redirect('admin/produk')->with('warning', 'Data Berhasil Diedit');
		
	}

	function destroy(Product $produk){
		$produk->handleDelete();
		$produk->delete();
		return redirect('admin/produk')->with('danger', 'Data Berhasil Dihapus');
	}

	function filter(){
		$nama = request('nama'); 
		$stok =  request('stok');
		$harga_min = request('harga_min'); 
		$harga_max = request('harga_max');
		$data['list_produk'] = Product::whereBetween('harga' , [$harga_min, $harga_max])->get();
		$data['nama'] =$nama;
		$data['stok'] = $stok;
		$data ['harga_min'] =$harga_min;		
		$data ['harga_max'] =$harga_max;		


 
	}
		public function testCollection()
{
		// $list_bike =['Honda', 'Yamaha', 'Kawasaki', 'Suzuki', 'Vespa', 'BMW', 'KTM'];
		// $list_bike = collect($list_bike);
		// $list_produk = produk::all();
		// Sorting
		// Sort By Harga Terendah
		// dd($list_produk->SortBy('harga'));
		// Sort By Harga Tertinggi
		// // dd($list_produk->SortByDesc('harga'));

		// Filter

		// $filtered = $list_produk->filter(function)($item){
		// return $item->harga < 200000;
		// });

		// dd(filtered);

		// $sum = $List_produk->sum('stok');
		// dd($sum);

		$data['list_produk'] = Produk::Paginate(5);
		return view('test-collection', $data);

		dd($list_bike, $list_produk);


}
	function testAjax(){
		$data['list_provinsi'] = Provinsi::all();
		return view('test-ajax', $data);
	}

 }
		// $data['list_produk'] = Produk::whereBetween('harga' , [$harga_min, $harga_max])->whereNot ('stok',  [150])->whereYear('created_at', '2020')-> get();


		// $data['list_produk'] = Produk::where('nama' , 'like' "%$nama%")->get();
		// $data['list_produk'] = Produk::whereIn('nama' , $stok)->get();
 		// $data['list_produk'] = Produk::where('stok' , '<>' "$")->get();
		// $data['list_produk'] = Produk::whereIn('nama' , $stok)->get();
		// $data['list_produk'] = Produk::whereNotBetween('harga' , [$harga_min, $harga_max])->get();
		// $data['list_produk'] = Produk::whereNull('stok')->get();
		// $data['list_produk'] = Produk::whereNotNull('stok')->get();
		// $data['list_produk'] = Produk::whereDate('created_at', '2020-11-23')->get();
		// $data['list_produk'] = Produk::whereYear('created_at', '2020')->get();
		// $data['list_produk'] = Produk::whereMonth('created_at', '11')->get();
		// $data['list_produk'] = Produk::whereMonth('created_at', '11')->whereYear('created_at', '2020')get();
		// $data['list_produk'] = Produk::whereDate('created_at', '2020-11-23')->get();
		// $data['list_produk'] = Produk::whereTime('created_at', '08:00:00')->get();


