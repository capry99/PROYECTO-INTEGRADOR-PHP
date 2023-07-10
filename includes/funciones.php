<?php
//escapa/sanitizar el HTML
function s($html) { 
  $s = htmlspecialchars($html);
  return $s;
}

function estaLogueado(): void {
  if (!isset($_SESSION['login'])) {
    header('Location: /login');
    exit();
  }
}
