<h1>LOGIN</h1>
<br>
<p>Completa con tus datos de usuario</p>
<br>
<form action="/login" method="post">
  <br>
  <br>
  <label for="email">E-mail</label>
  <input type="email" name="email" placeholder="Tu Email">
  <br>
  <br>
  <label for="contraseña">Contraseña</label>
  <input type="password" name="contraseña" id="contraseña" placeholder="Tu Contraseña">
  <br>
  <br>
  <input type="submit" value="Ingresar">
</form>

<?php if (!empty($errores)): ?>
  <?php foreach ($errores as $error): ?>
    <br>
    <p><?php echo $error; ?></p>
  <?php endforeach; ?>
<?php endif; ?>
