<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Kategori_M;

class Kategori extends BaseController
{
	public function index()
	{
		//return view('welcome_message');
		echo "Saya Tampan";
	}

	public function read()
	{

		$model 		= new kategori_M ();
		$kategori 	= $model -> findAll();

		$data = [
			'judul' 	=> 'SELECT DATA',
			'kategori' 	=> $kategori
		];

		
		return view ("kategori/select",$data);
		
	}

	// public function selectWhere($id = null)
	// {
	// 	echo "menampilkan data yang dipilih $id";
	// }

	public function create()
	{
		
		return view ("kategori/insert");
		
	}

	public function insert()
	{
		$model = new kategori_M();
		$model -> insert($_POST);

		return redirect()->to(base_url()."/admin/kategori");
	}

	public function find($id = null)
	{
		echo "<h1>Update data</h1>";
	}

	public function update()
	{
		echo "proses update data";
	}

	public function delete($id = null)
	{
		echo "proses delete data";
	}

	//--------------------------------------------------------------------

}
