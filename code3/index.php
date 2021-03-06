<?php

    require "util/db.php";
    $db=connectDB();

    
    $consultaSQL = "SELECT * FROM users";
  

    $sentencia = $db->prepare($consultaSQL);
    $sentencia->execute();

    $users = $sentencia->fetchAll(PDO::FETCH_ASSOC);
  ?>

<!doctype html>
<html lang="en" class="h-100">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
   
    <title>Lista de usuarios</title>
   
  </head>
  <body class="d-flex flex-column h-100">
    
    <div class="container pt-4 pb-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
    
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarsExample09">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link"  href="create.php?id=<?= $fila['id']?>">Crear</a>
                    </li>
                    <li class="nav-item">
                    <a href="./excel.php"><button class="btn btn-success">Exportar a Excel</button></a><br><br>   
                    </li>
                </ul>
                <form class="form-inline my-2 my-md-0">
                <input class="form-control" type="text" placeholder="Search" aria-label="Buscar">
                </form>
            </div>
        </nav>
    </div>
        
    
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <h1>Lista de Usuarios</h1>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre Usuario</th>
                    <th scope="col">Nombre completo</th>
                    <th scope="col">Email</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  foreach ($users as $fila):
                ?>
                <tr>
                    <td><?=  $fila['id'] ?></td>
                    <td><?=  $fila['user_name'] ?></td>
                    <td><?=  $fila['full_name'] ?></td>
                    <td><?=  $fila['email'] ?></td>
                    <td>
                        <a href="view.php?id=<?= $fila['id']?>"><button class="btn btn-primary btn-sm">Ver</button></a>
                        <a href="edit.php?id=<?= $fila['id']?>"><button class="btn btn-outline-primary btn-sm">??????Editar</button></a>
                        <a href="borrar.php?id=<?= $fila['id']?>"><button class="btn btn-outline-primary btn-sm">???????Borrar</button></a>
                      
                    </td>
                    </tr>                   
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
      
    <footer class="footer mt-auto py-3">
        <div class="container pb-5">
            <hr>
            <span class="text-muted">
                    Copyright &copy; 2019 | <a href="https://pisyek.com">Pisyek.com</a>
            </span>
        </div>
    </footer>

    
    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>