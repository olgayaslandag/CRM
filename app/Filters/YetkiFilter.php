<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class YetkiFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $router = service('router'); 
        $controller  = $router->controllerName();

        if($controller == "\App\Controllers\Yetki\YetkiController"){
            
            if(session()->get("login")){
                if($router->methodName() != "cikis"){
                    return redirect()->route('dashboard'); exit;
                }
            }

        } else {

            if(!session()->get("login")){
                return redirect()->route('loginView'); exit;
            }

        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}