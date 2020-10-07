<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\kategori_M;
use App\Models\menu_m;

class Menu extends BaseController
{
	public function index()
	{

		$pager 		= \Config\Services::pager();
		$model 		= new menu_m();

		$data = [
			'judul' 	=> 'MENU',
			'menu'		=> $model->paginate(3, 'group1'),
			'pager'		=> $model->pager

		];


		return view("menu/select", $data);
	}

	public function option()
	{
		$model 		= new kategori_M();
		$kategori 	= $model->findAll();
		$data 		= [
			'kategori' 	=> $kategori
		];

		return view('template/option', $data);
	}

	public function read()
	{
		$pager	=\Config\Services::pager();

		if (isset($_GET['idkategori'])) {
			$id 	= $_GET['idkategori'];
			$model 	= new menu_m();
			$jumlah	= $model->where('idkategori', $id)->findAll();
			$count	= count($jumlah);

			$tampil = 3;
			$mulai	= 0;

			if(isset($_GET['page']))
			{
				$page	= $_GET['page'];
				$mulai	= ($tampil * $page) - $tampil;
			}

			$menu	= $model->where('idkategori', $id)->findAll($tampil , $mulai);

			$data = [
				'judul' 	=> 'DATA PENCARIAN MENU',
				'menu'		=> $menu,
				'pager'		=> $pager,
				'tampil'	=> $tampil,
				'total'		=> $count

			];

			return view("menu/cari", $data);
		}
		
	}

	public function insert()
	{
		$request	= \Config\Services::request();
		$file		= $request->getFile('gambar');
		$name		= $file->getName();

		$data		= [
			'idkategori'	=> $request->getPost('idkategori'),
			'menu'			=> $request->getPost('menu'),
			'gambar'		=> $name,
			'harga'			=> $request->getPost('harga')

		];

		$model 		= new menu_m();
		$model->insert($data);
		$file->move('./upload');

		return redirect()->to(base_url("/admin/menu"));

		// if ($model->insert($_POST) === false) {
		// 	$error = $model->errors();
		// 	session()->setFlashdata('info', $error['kategori']);
		// 	return redirect()->to(base_url("/admin/kategori/create"));
		// } else {
		// 	return redirect()->to(base_url("/admin/kategori"));
		// };
	}

	public function create()
	{
		$model		= new kategori_M();
		$kategori 	= $model->findAll();
		$data 		= [
			'kategori' 	=> $kategori
		];
		return view("menu/insert" , $data);
	}

	public function find($id = null)
	{
		$model 	= new menu_m();
		$menu 	= $model->find($id);

		$kategorimodel	= new kategori_M();
		$kategori		= $kategorimodel->findAll();

		$data = [
			'judul' 	=> 'UPDATE DATA',
			'menu' 		=> $menu,
			'kategori'	=> $kategori
		];

		return view("menu/update", $data);
	}

	public function update()
	{
		$id		= $this->request->getPost('idmenu');
		$file		= $this->request->getFile('gambar');
		$name		= $file->getName();

		if(empty($name)){
			$name	=	$this->request->getPost('gambar');
		}	
		else {
			$file -> move('./upload');
		}
		
		$data	= [
			'idkategori'	=> $this->request->getPost('idkategori'),
			'menu'			=> $this->request->getPost('menu'),
			'gambar'		=> $name,
			'harga'			=> $this->request->getPost('harga')
		];

		$model	= new menu_m();
		$model->update($id,$data);
		return redirect()->to (base_url("/admin/menu"));
	}

	public function delete($id = null)
	{

		$model = new menu_m();
		$model->delete($id);

		return redirect()->to(base_url("/admin/menu"));
	}
	//--------------------------------------------------------------------

}
