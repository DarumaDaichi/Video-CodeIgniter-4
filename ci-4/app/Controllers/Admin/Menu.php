<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;

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

	//--------------------------------------------------------------------

}
