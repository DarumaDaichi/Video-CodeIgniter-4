<?php

namespace App\Controllers;

use App\Models\pelanggan_m;

class Register extends BaseController
{
	public function index()
	{
		return view('frontpage/register');
    }
    
    public function insert(){
        if(isset($_POST['password']))
        {
            $data   = [
                'pelanggan'      => $_POST['pelanggan'],
                'alamat'      => $_POST['alamat'],
                'telpon'      => $_POST['telpon'],
                'email'     => $_POST['email'],
                'password'  =>$_POST['password'],
                'aktif'     => 1
            ];

            $model = new pelanggan_m();

            if ($model->insert($data) === FALSE) {
                $error = $model->errors();
                session()->setFlashdata('info', $error);
                return redirect()->to(base_url("register"));
            } else {
                return redirect()->to(base_url("login"));
            }
        }
    }

	//--------------------------------------------------------------------

}
