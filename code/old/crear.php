<?php
try {
  $dsn = 'mysql:host=localhost;dbname=registro';
  $conexion = new PDO($dsn,'registro-user','admin123');

  if (isset($_POST['full_name'])) {
    $consultaSQL = "SELECT * FROM users WHERE full_name LIKE '%" . $_POST['full_name'] . "%'";
  } else {
    $consultaSQL = "SELECT * FROM users";
  }

  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();

  $users = $sentencia->fetchAll();

} catch(PDOException $error) {
  $error= $error->getMessage();
}

$titulo = isset($_POST['full_name']) ? 'Lista de usuarios (' . $_POST['full_name'] . ')' : 'Lista de usuarios';
?>

<?php include "templates/header.php"; ?>

<?php
if ($error) {
  ?>
  <div class="container mt-2">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
          <?= $error ?>
        </div>
      </div>
    </div>
  </div>
  <?php
}
?>


<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Crea un Usuario</h2>
      <hr>
      <form method="post">
        <div class="form-group">
          <label for="nombre">Nombre usuario</label>
          <input type="text" name="user_name" id="user_name" class="form-control">
        </div>
        <div class="form-group">
          <label for="apellido">Nombre completo</label>
          <input type="text" name="full_name" id="full_name" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="edad">Contrasena</label>
          <input type="text" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-primary" value="Enviar">
          <a class="btn btn-primary" href="index.php">Regresar al inicio</a>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include 'templates/footer.php'; ?>