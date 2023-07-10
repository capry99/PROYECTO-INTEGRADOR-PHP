<?php

namespace Controllers;
use Mfi\Router;
use Models\User;
require_once 'funciones.php';

class DashController
{
    public static function index(Router $router)
    {
      session_start();
      estaLogueado();
     $router->view('dashboard',
     ['nombre'=>$_SESSION['name'],
      'email' => $_SESSION['email']]);
    }
}
