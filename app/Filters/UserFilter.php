<?php 

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class UserFilter implements FilterInterface 
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session() -> get('log') != true) {
            return redirect() -> to(base_url('auth/login'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session() -> get('log') == true && session() -> get("level") == 3) {
            return redirect() -> to(base_url('/'));
        }
    }
}