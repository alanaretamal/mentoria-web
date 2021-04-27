  <?php

    require "util/db.php";
    $db=connectDB();

    
      $consultaSQL = "SELECT * FROM users";
  

    $sentencia = $db->prepare($consultaSQL);
    $sentencia->execute();

    $users = $sentencia->fetchAll(PDO::FETCH_ASSOC);
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
            foreach ($users as $fila) {
              ?>
              <tr>
                <td><?php  $fila["id"] ?></td>
                <td><?php  $fila["user_name"] ?></td>
                <td><?php  $fila["full_name"] ?></td>
                <td><?php  $fila["email"] ?></td>
                <td><?php  $fila["password"] ?></td>
                <td>
                  <a href="<?= 'borrar.php?id=' . $fila["id"] ?>">🗑️Borrar</a>
                  <a href="<?= 'editar.php?id=' . $fila["id"] ?>">✏️Editar</a>
                </td>
              </tr>
              <?php
            }
          ?>
        <tbody>
      </table>
    </div>
  </div>
</div>

<?php include "templates/footer.php"; ?>