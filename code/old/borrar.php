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


<?php require "templates/header.php"; ?>

<div class="container mt-2">
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-danger" role="alert">
        <?= $resultado['mensaje'] ?>
      </div>
    </div>
  </div>
</div>

<?php require "templates/footer.php"; ?>