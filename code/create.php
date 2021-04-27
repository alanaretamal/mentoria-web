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
    <style>
		.msg-form {
			margin: 1em;
			color: #66bb6a;
		}
	</style>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form class="login100-form validate-form" method="POST" action="create.php">
					<input type="hidden" name="super-secreto" value="valor super secreto">
					<span class="login100-form-title p-b-59">
						Sign Up
					</span>

					<?php if ($valido == 1): ?>
						<p class="msg-form"><?= $message; ?></p>
					<?php endif; ?>

					<div class="wrap-input100 validate-input" data-validate="Nombre completo requerido">
						<span class="label-input100">Nombre completo</span>
						<input class="input100" type="text" name="full_name" placeholder="Nombre completo...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Validar email, ejemplo: ex@abc.xyz">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Email...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Nombre de usuario requerido">
						<span class="label-input100">Nombre de usuario</span>
						<input class="input100" type="text" name="user_name" placeholder="Nombre de usuario...">
						<span class="focus-input100"></span>
					</div>

				
					<div class="wrap-input100 validate-input" data-validate = "Id requerido">
						<span class="label-input100">Id</span>
						<input class="input100" type="number" name="Id" placeholder="">
						<span class="focus-input100"></span>
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
    
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>