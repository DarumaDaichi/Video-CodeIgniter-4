<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Order extends BaseController
{
	public function index()
	{
        $pager  = \Config\Services::pager();
        $db     = \Config\Database::connect();

        $sql    = "SELECT * FROM vorder";
        $result = $db->query($sql);
        $row    = $result->getResult('array');

        $total  = count($row);
        $tampil = 5;

        if(isset($_GET['page']))
        {
            $page   = $_GET['page'];
            $mulai  = ($tampil * $page) - $tampil;
            $sql    = "SELECT * FROM vorder ORDER BY status ASC LIMIT $mulai , $tampil";
        }else
        {
            $sql    = "SELECT * FROM vorder ORDER BY status ASC LIMIT 0 , $tampil";
        }

        $result = $db->query($sql);
        $row    = $result->getResult('array');

        $data   = [
            'judul'     => '<h3>DATA ORDER</h3>', 
            'order'     => $row,
            'pager'     => $pager,
            'perpage'   => $tampil,
            'total'     => $total
        ];

        echo view('order/select' , $data);
	}

    public function find ($id = NULL)
    {
        $db     = \Config\Database::connect();

        $sql    = "SELECT * FROM vorder WHERE idorder = $id";
        $result = $db->query($sql);
        $row    = $result->getResult('array');

        $sql    = "SELECT * FROM vorderdetail WHERE idorder = $id";
        $result = $db->query($sql);
        $detail    = $result->getResult('array');

        
        $data = [
            'judul'     => 'PEMBAYARAN' ,
            'order'     => $row,
            'detail'    => $detail
        ];

        return view("order/update" , $data);
    }
	//--------------------------------------------------------------------

}
