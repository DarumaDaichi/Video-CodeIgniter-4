<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Kategori extends BaseController
{
	public function index()
	{
		//return view('welcome_message');
		echo "Saya Tampan";
	}

	public function select()
	{
		echo view ("template/header");
		echo view ("kategori/select");
		echo view ("template/footer");
	}

	public function selectWhere($id = null)
	{
		echo "menampilkan data yang dipilih $id";
	}

	public function formInsert()
	{
		echo view ("template/header");
		echo view ("kategori/forminsert");
		echo view ("template/footer");
	}

	public function formUpdate($id = null)
	{
		echo view ("template/header");
		echo view ("kategori/update");
		echo view ("template/footer");
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
