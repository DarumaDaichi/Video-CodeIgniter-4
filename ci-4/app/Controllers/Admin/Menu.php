<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\kategori_M;

class Menu extends BaseController
{
	public function index()
	{
		return view('Menu/form');
	}

	public function insert()
	{
		$file = $this->request->getFile('gambar');

		$name =	$file->getName();

		$file->move('./upload');

		echo $name.'sudah di upload';

	}

	public function option()
	{
		$model = new kategori_m();
		$kategori = $model->findAll();
		$data = [
			'kategori'	=> $kategori
		];
		return view('template/option' , $data);
	}

	//--------------------------------------------------------------------

}
