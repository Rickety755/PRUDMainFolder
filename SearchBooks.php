<?php

    $DATABASE_HOST = "localhost";
    $DATABASE_USER = "root";
    $DATABASE_PASS = "";
    $DATABASE_NAME = "prud";

    $conexion = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (isset($_POST['search'])) {
    
    $searchTerm = mysqli_real_escape_string($conexion, $_POST['search']);

    $sql_select = "SELECT * FROM books WHERE Title LIKE '%$searchTerm%'";

} else {
    $sql_select = "SELECT * FROM books";
}

$seeing = mysqli_query($conexion, $sql_select);
?>