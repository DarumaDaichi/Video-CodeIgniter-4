<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\pelanggan_m;

class Pelanggan extends BaseController
{
	public function index()
	{
        $pager  = \Config\Services::pager();
        $model  = new pelanggan_m();

        $data   = [
            'judul'     => 'Daftar Pelanggan',
            'pelanggan' => $model->paginate(3, 'group1'),
            'pager'     => $model->pager
        ];
		return view("pelanggan/select" , $data);
	}

	//--------------------------------------------------------------------

}
