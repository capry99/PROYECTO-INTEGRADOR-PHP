<?php
function conectarDB(): mysqli {
  $db = new mysqli('localhost', 'root', '1234', 'mfi');
  if ($db->connect_errno) {
    echo 'Error: No se pudo conectar a la base de datos.';
    exit;
  }
  return $db;
}
