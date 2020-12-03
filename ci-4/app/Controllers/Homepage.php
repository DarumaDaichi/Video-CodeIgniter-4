<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\menu_m;

class Homepage extends BaseController
{
	public function index()
	{
		return view('frontpage/frontview.php');
	}

	public function menu(){
		$model = new menu_m();
		$menu  = $model->findAll();
		$data  = [
			'menu' => $menu
		];	

		return view('frontpage/menu.php' , $data);
	}

	//--------------------------------------------------------------------

}
