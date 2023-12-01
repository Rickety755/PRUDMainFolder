<?php
include 'Verify.php';

$UsuarioActual = $_SESSION['name'];

    $DATABASE_HOST = "localhost";
    $DATABASE_USER = "root";
    $DATABASE_PASS = "";
    $DATABASE_NAME = "prud";

    $conexionuser = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

    if ($conexionuser->connect_error) {
        die("Connection failed: " . $conexionuser->connect_error);
    }

    $queryuser = "SELECT * FROM users WHERE User = $UsuarioActual ";

    $resultuser = $conexionuser->query($queryuser);

    if (!$resultuser) {
        die("Query failed: " . $conexionuser->error);
    }
?>