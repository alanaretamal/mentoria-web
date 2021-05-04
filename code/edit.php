<?php
/* session_start();
if(!isset($_SESSION['nombre'])){
    header("location:index.php");
} */
require "util/db.php";
$valido = 0;
if (isset($_GET['id'])) {
    $idregistro = $_GET['id'];
    $db = connectDB();

    $sql = "SELECT id,full_name,user_name,email,password
    FROM users where id=$idregistro";

$stmt = $db->prepare($sql); 
$stmt->execute(); 
$users = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['send-button'])) {

    $db = connectDB();

    $idregistro = $_POST["id"];
    $name = $_POST["full_name"];
    $email = $_POST["email"];
    $username = $_POST["user_name"];
    $password = $_POST["password"];
    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = " UPDATE users set 
    full_name = :full_name,
    user_name = :user_name,
    email = :email,
    password = :password
    where id =$idregistro";

    //statement
    //echo 'sql: ' . $sql;
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':full_name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':user_name', $username);
    $stmt->bindParam(':password', $password);

    $stmt->execute();

    $message = "Registro actualizado con éxito";
    $valido = 1;

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

    <title>List of User</title>

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
                    <li class="nav-item">
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
            <h1>Editar Usuario</h1>
            <?php if ($valido == 1): ?>
						<!-- <p class="msg-form"><?= $message; ?></p> -->
                        <font color="red"><?= $message; ?></font>
					<?php endif; ?>
            <form action="edit.php" method="POST">
           
           
                <div class="form-group">
                    <!-- <label for="name">ID</label> -->
                    <input type="hidden" class="form-control" name="id" id="id" value=<?= $users['id'] ?? '0' ?>>
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="full_name" id="full_name" value="<?= $users['full_name'] ?? 'Sin nombre' ?>" placeholder="Enter name">
                </div>

                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" class="form-control" name="user_name" id="User-name" value="<?= $users['user_name'] ?? 'ingrese usuario' ?>" placeholder="Enter User">
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value="<?= $users['email'] ?? 'Sin email' ?>" placeholder="Enter mail">
                </div>
                <div class="form-group">
                    <label for="name">Password</label>
                    <input type="password" placeholder="*****"class="form-control" name="password" id="pass" value=<?= $users['password'] ?? 'ingrese password' ?> placeholder="Enter pass">
                    <!-- <small class="form-text text-muted">Help message here.</small> -->
                </div>
                <button type="submit" class="btn btn-primary" name="send-button">Submit</button>
            </form>
        </div>
    </main>

    <footer class="footer mt-auto py-3">
        <div class="container pb-5">
            <hr>
            <span class="text-muted">
                Copyright &copy; 2021 | <a href="https://pisyek.com">Pisyek.com</a>
            </span>
        </div>
    </footer>


    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>