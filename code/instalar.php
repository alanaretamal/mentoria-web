<?php

$config = include 'config.php';

try {
  $conexion = new PDO('mysql:host=' . $config['db']['host'], $config['db']['registro'], $config['db']['password']);
  $sql = file_get_contents(".sql");
  
  $conexion->exec($sql);

  echo "La base de datos y la tabla de usuarios se han creado con éxito.";
} catch(PDOException $error) {
  echo $error->getMessage();
}