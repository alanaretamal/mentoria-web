<?php

session_start();

if (!isset($_SESSION['nombre'])) {
    header("Location: index.php");
}

echo "Bienvenido, " . $_SESSION['nombre'];

require "util/db.php";
$db = connectDB();

//Preparar select
$sql = "SELECT id, full_name,user_name,email
from users";
//statement
$stmt = $db->prepare($sql);

$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
</head>
<body>
    <a href="logout.php">(Salir)</a>

    <h1>Lista de Usuarios Disponibles</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>NOMBRE COMPLETO</th>
            <th>USUARIO</th>
            <th>CORREO</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['ID']??'Sin ID' ?></td>
                <td><?= $user['full_name']?? 'Sin Nombre' ?></td>
                <td><?= $user['user_name']?? 'Sin Usuario' ?></td>
                <td><?= $user['email'] ?? 'Sin correo' ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>