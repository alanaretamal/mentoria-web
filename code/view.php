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

  


                <?php
                require "util/db.php";
                $db = connectDB();
            
                try {

                    //preparar consulta
                    $sql = "SELECT * FROM  users ";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    // set the resulting array to associative
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    foreach ($result = $stmt->fetchAll() as $data) {
                        
                    
                          $data['user_name'];
                          $data['id'] ;
                          $data['full_name'] ;
                          $data['email'] ;
                    }

                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                ?>
                  <main role="main" class="flex-shrink-0">

        <div class="container">
            <h1>Usuarios</h1>
            <form action="../../form-result.php" method="post" target="_blank">
                <div class="form-group">
                    <label for="name">Nombre de usuario
                    <input type="text" disabled="disabled" id="user_name" name="user_name" value=<?php echo $data['user_name']; ?>>
                    </label>
                    <br>
                    <label for="id">Id
                    <input type="text" disabled="disabled" id="id" name="id" value=<?php echo $data['id'] ; ?>>
                    </label>
                    <br>
                    <label for="full_name">Nombre completo
                    <input type="text" disabled="disabled" id="full_name" name="full_name" value=<?php echo  $data['full_name'] ; ?>>
                    </label>
                    <br>
                    <label for="email">Email
                     <input type="text" disabled="disabled" id="email" name="email" value=<?php echo   $data['email'] ; ?>>
                </div>
                <a class="btn btn-primary" href="index.php">Regresar al inicio</a>
            </form>
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
     
    