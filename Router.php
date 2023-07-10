<?php
namespace Mfi;

class Router {
    public array $getRoutes = [];
    public array $postRoutes = [];

    public function get($url, $fn) {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn) {
        $this->postRoutes[$url] = $fn;
    }

    public function comprobarRutas() {
        $currentUrl = $_SERVER["PATH_INFO"] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method == "GET") {
            $fn = $this->getRoutes[$currentUrl] ?? null;
        } else {
            $fn = $this->postRoutes[$currentUrl] ?? null;
        }

        if ($fn) {
            call_user_func($fn,$this);
        } else {
            echo 'Página no encontrada';
        }
    }
    public function view($view,$datos =[]){
      //leer lo que pasamos a la vista
      foreach ($datos as $key => $value) {
       $$key=$value;
      }
      ob_start();
      //incluimos las vistas
      include_once __DIR__ . "/views/$view.php";
      $contenido=ob_get_clean();
      include_once __DIR__ . "/views/Layout/layout.php";
    }
}
