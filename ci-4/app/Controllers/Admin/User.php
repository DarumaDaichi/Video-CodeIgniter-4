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

    public function create(){
        $data   = [
            'level'     => ['Admin' , 'Koki' , 'Kasir'],
        ];

        return view('user/insert' , $data);
    }

    public function insert()
    {
        $model = new user_m();

        $model->insert($_POST);

        return redirect()->to(base_url("/admin/user"));
    }

    public function delete($id = NULL)
    {
        $model  = new user_m();
        $model->delete($id);
        return redirect()->to(base_url("/admin/user"));
    }

    public function update($id = NULL , $status = 1)
    {
        $model  = new user_m();

        if($status ==  0)
        {
            $status = 1;
        }else{
            $status = 0;
        }

        $data = [
            'aktif' => $status
        ];

        $model->update($id , $data);
        return redirect()->to(base_url("/admin/pelanggan"));
    }

	//--------------------------------------------------------------------

}
