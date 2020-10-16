<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\user_m;

class User extends BaseController
{
    
    public function index ()
    {
        $pager 		= \Config\Services::pager();
		$model 		= new user_m();

		$data = [
			'judul' 	=> 'DATA USER',
			'user'	    => $model->paginate(3, 'group1'),
			'pager'		=> $model->pager

		];


		return view("user/select", $data);
    }

	//--------------------------------------------------------------------

}
