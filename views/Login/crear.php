<h1>REGISTRARSE</h1>
<br>
<p>Formulario de Registro</p>
<br>
<form action="/register" method="post">
  <label for="name">Nombre:</label>
  <input type="text" name="name" id="name" value="<?php echo s($usuario->name); ?>">
  <br>
  <br>
  <label for="email">E-mail:</label>
  <input type="email" name="email" id="email" value="<?php echo s($usuario->email); ?>">
  <br>
  <br>
  <label for="contraseña">Contraseña:</label>
  <input type="password" name="contraseña" id="contraseña">
  <br>
<br>
  <input type="submit" value="CrearCuenta">
</form>

<?php
foreach ($errores as $error):?>
<br>
<p><?php echo $error; ?></p>
<?php endforeach; ?>