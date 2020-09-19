<?php namespace App\Controllers;

class Kategori extends BaseController
{
	public function index()
	{
		//return view('welcome_message');
		echo "Saya Tampan";
	}

	public function select()
	{
		echo "menampilkan semua data";
	}

	public function selectWhere($id = null)
	{
		echo "menampilkan data yang dipilih";
	}

	public function formInsert()
	{
		echo "menampilkan form insert";
	}

	public function formUpdate()
	{
		echo "menampilkan form update";
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
