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
            'level'     => ['Admin' , 'Koki' , 'Kasir']
        ];

        return view('user/insert' , $data);
    }

    public function insert()
    {

        if(isset($_POST['password']))
        {
            $data   = [
                'user'      => $_POST['user'],
                'password'  => password_hash($_POST['password'] , PASSWORD_DEFAULT),
                'email'     => $_POST['email'],
                'level'     => $_POST['level'],
                'aktif'     => 1
            ];

            $model = new user_m();

            if ($model->insert($data) === FALSE) {
                $error = $model->errors();
                session()->setFlashdata('info', $error);
                return redirect()->to(base_url("/admin/user/create"));
            } else {
                return redirect()->to(base_url("/admin/user"));
            }
        }
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

    public function find($id = NULL)
    {
        $model  = new user_m();
        $user   = $model->find($id);

        $data   =[
            'judul' => 'UPDATE DATA',
            'user'  => $user,
            'level'     => ['Admin' , 'Koki' , 'Kasir']
        ];

        return view('user/update' , $data);
    }

    public function change()
    {
        $id     = $_POST['iduser'];
        $model  = new user_m();

        $data   =[
            'email' => $_POST['email'],
            'level' => $_POST['level']
        ];

        $model->update($id , $data);

        return redirect()->to(base_url("/admin/user"));
    }

	//--------------------------------------------------------------------

}
