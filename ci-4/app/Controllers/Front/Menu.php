<?php

namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\kategori_M;
use App\Models\menu_m;

class Menu extends BaseController
{
	public function __construct()
	{
		$this->menu = new menu_m();
		helper('form');
		helper('number');
	}

	public function index()
	{
		$pager 		= \Config\Services::pager();
		$model		= new menu_m();
		$modelket 	= new kategori_M();
		$kategori	= $modelket->findAll();

		$data = [
			'judul' 	=> 'MENU',
			'menu'		=> $model->paginate(8, 'group1'),
			'kategori'	=> $kategori,
			'pager'		=> $model->pager


		];

		return view("frontpage/menu", $data);
	}

	public function read()
	{
		$pager	= \Config\Services::pager();

		if (isset($_GET['idkategori'])) {
			$id 	= $_GET['idkategori'];
			$model 	= new menu_m();
			$jumlah	= $model->where('idkategori', $id)->findAll();
			$count	= count($jumlah);

			$tampil = 8;
			$mulai	= 0;

			if (isset($_GET['page'])) {
				$page	= $_GET['page'];
				$mulai	= ($tampil * $page) - $tampil;
			}

			$menu	= $model->where('idkategori', $id)->findAll($tampil, $mulai);

			$data = [
				'judul' 	=> 'DATA PENCARIAN MENU',
				'menu'		=> $menu,
				'pager'		=> $pager,
				'tampil'	=> $tampil,
				'total'		=> $count

			];

			return view("frontpage/menu", $data);
		}
	}

	public function beli($id = NULL)
	{
		$cart = \Config\Services::cart();
		$model = new menu_m();
		$menu	= $model->find($id);

		$data = array(
			'id'		=> $menu['idmenu'],
			'qty'		=> 1,
			'price'		=> $menu['harga'],
			'name'		=> $menu['menu'],
			'gambar'	=> $menu['gambar']
		);

		$cart->insert($data);

		return redirect()->to(base_url('front/menu'));
	}

	public function tambah($qty, $id)
	{
		$cart = \Config\Services::cart();
		$jumlah = $qty + 1;

		$data = array(
			'rowid' => $id,
			'qty' 	=> $jumlah
		);

		$cart->update($data);
		return redirect()->to(base_url('front/menu/cart'));
	}

	public function kurang($qty, $id)
	{
		$cart = \Config\Services::cart();
		$jumlah = $qty - 1;

		$data = array(
			'rowid' => $id,
			'qty' 	=> $jumlah
		);

		if ($qty < 2) {
			return redirect()->to('front/menu/hapus/' . $id);
		} else {
			$cart->update($data);
			return redirect()->to(base_url('front/menu/cart'));
		}
	}

	public function hapus($id)
	{
		$cart = \Config\Services::cart();
		$rowid = $id;
		$cart->remove($rowid);
		return redirect()->to(base_url('front/menu/cart'));
	}

	public function cart()
	{
		//menampung data cart
		$cart = \Config\Services::cart();


		$data = [
			'cart' => $cart
		];
		return view('frontpage/cart', $data);
	}

	public function proses()
	{
		$cart = \Config\Services::cart();
		$db = \Config\Database::connect();
		
		date_default_timezone_set('Asia/Jakarta');
		$idpelanggan = session()->get('idpelanggan');
		$order = [
			'idpelanggan' => $idpelanggan,
			'tglorder' => date('Y-m-d'),
			'total' => $cart->total(),
			'bayar' => 0,
			'kembali' => 0,
			'status' => 0
		];

		$db->table('tblorder')->insert($order);

		$idorder = $db->insertID();
		foreach ($cart->contents() as $item) {
			$data = [
				'idorder' => $idorder,
				'idmenu' => $item['id'],
				'jumlah' => $item['qty'],
				'hargajual' => $item['price']
			];
			$db->table('tblorderdetail')->insert($data);
		}
		return redirect()->to(base_url('front/menu/selesai'));
	}

	public function selesai(){
		$cart = \Config\Services::cart();
		$data = [
			'cart' => $cart
		];
		$cart->destroy();
		return view('frontpage/berhasil', $data);
	}


	//--------------------------------------------------------------------

}
