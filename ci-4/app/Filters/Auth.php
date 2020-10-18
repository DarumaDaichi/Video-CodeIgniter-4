<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        if(!session()->get('loggedIn'))
        {
            return redirect()->to(base_url('/login'));
        }
    }

    //-------------------------------

    public function after(RequestInterface $request , ResponseInterface $response)
    {

    }
}
