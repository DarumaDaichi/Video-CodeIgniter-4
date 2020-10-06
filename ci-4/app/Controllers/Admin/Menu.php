<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\kategori_M;
use App\Models\menu_m;

class Menu extends BaseController
{
	public function index()
	{

		$pager 		= \Config\Services::pager();
		$model 		= new menu_m();

		$data = [
			'judul' 	=> 'MENU',
			'menu'	=> $model->paginate(3, 'group1'),
			'pager'		=> $model->pager

		];


		return view("menu/select", $data);
	}

	//--------------------------------------------------------------------

}
