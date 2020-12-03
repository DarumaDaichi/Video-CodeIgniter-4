<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\pelanggan_m;

class Login extends BaseController
{
	public function index()
	{
		$data	= [];
		if ($this->request->getMethod() == 'post') {
			$email		= $this->request->getPost('email');
			$password	= $this->request->getPost('password');

			$model			= new pelanggan_m();
			$pelanggan		= $model->where(['email' => $email, 'password' =>$password , 'aktif' => 1])->first();

			if (empty($pelanggan)) {
				$data['info'] = "Email Salah";
			} else {
				$this->setSession($pelanggan);
				return redirect()->to(base_url("homepage"));
				}
			}else {
			# code...
		}

		return view('frontpage/login' , $data);
	}

	public function setSession($pelanggan)
	{
		$data 	= [
			'idpelanggan'=>$pelanggan['idpelanggan'],
			'pelanggan'	=> $pelanggan['pelanggan'],
			'loggedIn'	=> true
		];

		session()->set($data);
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to(base_url('/login'));
	}

	//--------------------------------------------------------------------

}
