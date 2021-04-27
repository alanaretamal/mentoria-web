<?php
                require "util/db.php";
                $valido = 0;

            if(isset($_POST["sign-up-button"])){
                $id = $_GET['id'];
                $user_name = $_POST['user_name'];
                $full_name = $_POST['full_name'];
                $email = $_POST['email'];            
                $sql = "INSERT INTO users 
                            (user_name, full_name, email)
                        VALUES
                            (:user_name, :full_name, :email)";
            
                //statement
                $stmt = $db->prepare($sql);
            
                $stmt->bindParam(':id', $name);
                $stmt->bindParam(':user_name', $user_name);
                $stmt->bindParam(':full_name', $full_name);
                $stmt->bindParam(':email', $email);
            
                $stmt->execute();
            
                $message = "Registro realizado con éxito";
                $valido = 1;
            } 
            
            ?>               

<?php
if (isset($_POST['submit'])) {
  $resultado = [
    'error' => false,
    'mensaje' => 'El usuario ' . $_POST['user_name'] . ' ha sido agregado con éxito' 
  ];
  $config = include 'util/db.php';

  try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass']);

    $usuarios = array(
      "nombre usuario"   => $_POST['user_name'],
      "Id" => $_POST['id'],
      "Nombre completo"    => $_POST['full_name'],
      "Email"     => $_POST['email'],
    );
    $consultaSQL = "INSERT INTO users(user_name,id,full_name,email)";
    $consultaSQL .= "values (:" . implode(", :", array_keys($usuarios)) . ")";
    $sentencia = $conexion->prepare($consultaSQL);
    $sentencia->execute($usuarios);

  } catch(PDOException $error) {
    $resultado['error'] = true;
    $resultado['mensaje'] = $error->getMessage();
  }
}
?>

<?php include "templates/header.php"; ?>

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

    <title>Vista de Usuarios</title>

</head>

<body class="d-flex flex-column h-100">

    <div class="container pt-4 pb-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
            <a class="navbar-brand" href="#">HTML CRUD Template</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample09">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create.php">Create</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://pisyek.com/contact">Help</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-md-0">
                    <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                </form>
            </div>
        </nav>
    </div>
   <main role="main" class="flex-shrink-0">

   <div class="container">
        <div class="row">
        <h1>Usuarios</h1>
            <div class="col-md-12">
            <h2 class="mt-4">Crear Usuario</h2>
            <hr>
            <form method="post">
                <div class="form-group">
                <label for="nombre">Nombre de usuario</label>
                <input type="text" name="user_name" id="user_name" class="form-control">
                </div>
                <div class="form-group">
                <label for="nombre">Nombre Completo</label>
                <input type="text" name="full_name" id="full_name" class="form-control">
                </div>
                <div class="form-group">
                <label for="Id">Id</label>
                <input type="text" name="Id" id="Id" class="form-control">
                </div>
                <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="sign-up-button">
								Sign Up
							</button>

						</div>

						<a href="index.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Sign in
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
            </form>
            </div>
        </div>
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