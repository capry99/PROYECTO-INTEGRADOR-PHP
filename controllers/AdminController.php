<?php

namespace Controllers;
use Mfi\Router;
use Models\User;

class AdminController
{
    public static function index(Router $router)
    {
      $Users = User::all();
       $router->view('admin/index',['users'=>$Users]);
    }
}
