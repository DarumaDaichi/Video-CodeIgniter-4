<?php namespace App\Controllers\Front;

use App\Controllers\Basecontroller;
use App\Models\menu_m;

class Navbar extends BaseController
{
	public function index()
	{
		return view('frontpage/navbar.php');
	}
	//--------------------------------------------------------------------

}