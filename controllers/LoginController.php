<?php

namespace Controllers;
use Mfi\Router;
use Models\User;

class LoginController{
  public static function crear(Router $router) {
    $usuario=new User;
    $errores=[];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $usuario->sincronizar($_POST);
      $usuario->contraseña = trim($usuario->contraseña);
      $usuario->validarNuevaCuenta();
      $errores=$usuario->getErrores();
      if (empty($errores)) {
        $usuario->hashContraseña();
      $usuario->guardar();
      header('Location: /login');
      }
      
        }
    $router->view('login/crear',
    [ 'errores'=>$errores,
     'usuario'=>$usuario
    ]);
  }
  public static function login(Router $router){
    $errores=[];
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $auth=new User($_POST);
        $auth->validarLogin();
        $errores=$auth->getErrores();
        if (empty($errores)) {  
         $usuario= User::where('email', $auth->email);

         if ($usuario) {
          //verificar contraseña
          if ($usuario->validarContraseña($auth->contraseña)) {
            //si esta logueado    
            session_start();//iniciar sesion
            $_SESSION['name']=$usuario->name;
            $_SESSION['email']=$usuario->email;
            $_SESSION['login']=true;
            //redireccionar a la pagina
            header('Location: /dashboard');
          }else {
            $errores= $usuario->getErrores();
          }
         } else {
          $errores[]='Usuario no encontrado';
         }
        }
      }
    $router->view('login/login');
  }
  public static function logout() {
    session_start();
    $_SESSION=[];
    header('Location: /login');
  }
}