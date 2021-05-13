<?php
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Listado-Alumnos.xlsx"');

require "util/db.php";
$db = connectDB();
$sql = "SELECT * FROM users";
//statement
$stmt = $db->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<table>
<tr>
    <th scope="col">Id</th>
    <th scope="col">Full Namme</th>
    <th scope="col">Email</th>
    <th scope="col">User Name</th>
</tr>
<?php foreach ($users as $user) : ?>
 <tr>
    <td><?= $user['id'] ?></td>
    <td><?= $user['full_name'] ?></td>
    <td><?= $user['email'] ?></td>
    <td><?= $user['user_name'] ?? 'Sin correo' ?></td>
</tr>
<?php endforeach; ?>
</table>