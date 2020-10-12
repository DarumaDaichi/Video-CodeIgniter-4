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
    
    public function delete ($id = NULL)
    {
        $model  = new pelanggan_m();
        $model -> delete($id);

        return redirect()->to(base_url("/admin/pelanggan"));
    }

    public function update($id = NULL , $status = 1 )
    {
        $model  = new pelanggan_m();

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
