<?php

include 'funciones.php';

csrf();
if (isset($_POST['submit']) && !hash_equals($_SESSION['csrf'], $_POST['csrf'])) {
  die();
}

if (isset($_POST['submit'])) {
  $resultado = [
    'error' => false,
    'mensaje' => 'El usuario ' . escapar($_POST['name']) . ' ha sido agregado con éxito'
  ];

  $config = include 'config.php';

  try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['registro'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['password']);
 
    $users = [
      "id"        => $_GET['id'],
      "user_name"   => $_POST['user_name'],
      "full_name" => $_POST['full_name'],
      "email"    => $_POST['email'],
      "password"     => $_POST['password'],
    ];

    $consultaSQL = "INSERT INTO users (user_name, full_name, email, password)";
    $consultaSQL .= "values (:" . implode(", :", array_keys($users)) . ")";

    $sentencia = $conexion->prepare($consultaSQL);
    $sentencia->execute($users);

  } catch(PDOException $error) {
    $resultado['error'] = true;
    $resultado['mensaje'] = $error->getMessage();
  }
}
?>

<?php include 'templates/header.php'; ?>

<?php
if (isset($resultado)) {
  ?>
  <div class="container mt-3">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-<?= $resultado['error'] ? 'danger' : 'success' ?>" role="alert">
          <?= $resultado['mensaje'] ?>
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
          <input name="csrf" type="hidden" value="<?php echo escapar($_SESSION['csrf']); ?>">
          <input type="submit" name="submit" class="btn btn-primary" value="Enviar">
          <a class="btn btn-primary" href="index.php">Regresar al inicio</a>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include 'templates/footer.php'; ?>