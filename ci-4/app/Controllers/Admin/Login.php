<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\user_m;

class Login extends BaseController
{
	public function index()
	{
		if($this->request->getMethod() == 'post')
		{
			$email		= $this->request->getPost('email');
			$password	= $this->request->getPost('password');
			
			$model		= new user_m();
			$user		= $model->where(['email' => $email , 'password' => $password , 'aktif' => 1])->first();
			
			$this->setSession($user);
		}else
		{
			# code...
		}

		return view('template/admin');
	}

	public function setSession($user)
	{	
		$data 	= [
			'user'		=> $user['user'],
			'email'		=> $user['email'],
			'level'		=> $user['level'],
			'loggedIn'	=> true
		];

		session()->set($data);
	}

	//--------------------------------------------------------------------

}
