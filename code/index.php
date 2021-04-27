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
      <a href="crear.php"  class="btn btn-primary mt-4">Crear Usuario</a>
      <hr>
      <form method="post" class="form-inline">
        <div class="form-group mr-3">
          <input type="text" id="full_name" name="full_name" placeholder="Buscar por nombre " class="form-control">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Ver resultados</button>
      </form>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-3"><?= $titulo ?></h2>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre Usuario</th>
            <th>Nombre completo</th>
            <th>Email</th>
            <th>Password</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($users && $sentencia->rowCount() > 0) {
            foreach ($users as $fila) {
              ?>
              <tr>
                <td><?php echo ($fila["id"]); ?></td>
                <td><?php echo ($fila["user_name"]); ?></td>
                <td><?php echo ($fila["full_name"]); ?></td>
                <td><?php echo ($fila["email"]); ?></td>
                <td><?php echo ($fila["password"]); ?></td>
                <td>
                  <a href="<?= 'borrar.php?id=' . ($fila["id"]) ?>">🗑️Borrar</a>
                  <a href="<?= 'editar.php?id=' . ($fila["id"]) ?>">✏️Editar</a>
                </td>
              </tr>
              <?php
            }
          }
          ?>
        <tbody>
      </table>
    </div>
  </div>
</div>

<?php include "templates/footer.php"; ?>