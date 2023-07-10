<?php
namespace Models;
use Models\ActiveRecord;


class User extends ActiveRecord{
    //base DE  DATOS
    protected static $tabla = 'Users';
    protected static $columnasDB = ['id','email','name','contraseña'];

    public $id;
    public $name;
    public $email;
    public $contraseña;

    public function __construct($args=[])
    {
      $this->id = $args['id']?? null;
      $this->name = $args['name']?? null;
      $this->email = $args['email']?? null;
      $this->contraseña = $args['contraseña']?? null;
    }
    public function ValidarNuevaCuenta() {
      if (!$this->name) {
        self::$errores[]='El Nombre es Requerido';
      }
       if (!$this->email) {
        self::$errores[]='El Email es Requerido';
      }
       if (!$this->contraseña) {
        self::$errores[]='La Contraseña es Requerida';
      }
      if (strlen($this->contraseña) < 6) {
        self::$errores[]='La Contraseña debe tener al menos 6 caracteres';
      }
    }
    public function validarLogin() {
       if (!$this->email) {
        self::$errores[]='El Email es Requerido';
      }
       if (!$this->contraseña) {
        self::$errores[]='La Contraseña es Requerida';
      }
      $this->contraseña = trim($this->contraseña);
    }
    public function validarContraseña(string $contraseña) {
      $resultado=password_verify($contraseña,$this->contraseña);
      if ($resultado) {
        return true;
      } else {
        static::$errores[]='Credenciales Incorrectas';
      }      
    }
    public function hashContraseña() {
      $this->contraseña = password_hash($this->contraseña, PASSWORD_BCRYPT);
    }
    

}


