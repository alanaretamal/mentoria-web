<?php

session_start();

if (!isset($_SESSION['valido'])){
    header("location: index.php");
}
echo "Informacion Secreta";
