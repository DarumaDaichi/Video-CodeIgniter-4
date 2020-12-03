<?php namespace App\Controllers\Front;

use App\Controllers\BaseController;

class Checkout extends BaseController
{
	public function index()
	{
		$cart = \Config\Services::cart();
		$data = [
			'cart' => $cart
		];
		return view('frontpage/checkout',$data);
	}

	public function proceed()
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
				'idordermenu' => $idorder,
				'idmenu' => $item['id'],
				'jumlah' => $item['qty'],
				'hargajual' => $item['price']
			];
			$db->table('tblorderdetail')->insert($data);
		}
		return redirect()->to(base_url('front/checkout/finish'));
	}

	public function finish()
	{
		$cart = \Config\Services::cart();
		$data = [
			'cart' => $cart
		];
		$cart->destroy();
		return view('frontpage/checkout_success', $data);
	}

	//--------------------------------------------------------------------

}
