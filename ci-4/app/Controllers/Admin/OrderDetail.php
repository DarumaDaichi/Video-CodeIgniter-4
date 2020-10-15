<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\orderDetail_m;

class OrderDetail extends BaseController
{
	public function index()
	{
		$pager 		= \Config\Services::pager();
		$model 		= new orderDetail_m();

		$data = [
			'judul' 		=> 'DETAIL ORDER',
			'orderdetail'	=> $model->paginate(3, 'group1'),
			'pager'			=> $model->pager

		];


		return view("orderdetail/select", $data);
	}

	//--------------------------------------------------------------------

}
