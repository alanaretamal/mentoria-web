<?php
//PDO
require "util/db.php";
$db = connectDB();
$users=[
["id" => 1, "nombre" =>"juan","email" =>"juan@test.com"],
["id" => 2, "nombre" =>"juan2","email" =>"juan@test.com"],
["id" => 3, "nombre" =>"juan3","email" =>"juan@test.com"],
];
session_start();
if(isset($_SESSION["msg-delete"])){
    $mensaje=$_SESSION["msg-delete"];
    $_SESSION["msg-delete"]="";
}
$result->fetchAll();
$row = $result->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Document</title>
</head>
<body>
    <?php if(isset($mensaje)):?>
        <p><?= $mensaje?> </p>
        <?php endif?>
    <table> 
<tr>
    <th>#</th>
    <th>Nombre</th>
    <th>Email</th>
    <th>Operaciones</th>
</tr>
<?php foreach($users as $key => $user): ?>
    <tr>
        <td></td>
        <td><?= $key + 1?></td>
        <td><?=$user["nombre"]?></td>
        <td><?=$user["email"]?></td>
        <td>
        <a href="update.php?id=<?=$user["id"]?>">Actualizar</a>
        <a href="delete.php?id=<?=$user["id"]?>"class="button">Borrar</a>
        </td>
    </tr>
    <?php endforeach; ?>
    </table>
    <form action="create.php" method="post" enctype="multipart/form-data">
        <input type="file" name="imagen" id="">
        <input type="text" name="email" id="">        
        <input type="submit" value="Enviar">
        
</form>
</body>
</html>