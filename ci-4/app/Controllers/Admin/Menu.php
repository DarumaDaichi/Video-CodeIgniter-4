<?php namespace App\Controllers;

class Menu extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

	public function select(){
		echo "<h1> untuk menampilkan data </h1>";
	}

	public function update($id = 2 , $nama = "Joni")
	{
		echo "Untuk Update data dengan id : $id $nama" ;
	}

	//--------------------------------------------------------------------

}
