<?php

    $DATABASE_HOST = "localhost";
    $DATABASE_USER = "root";
    $DATABASE_PASS = "";
    $DATABASE_NAME = "prud";

    $conexion = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

    

if (isset($_POST['SearchId'])) {
    
    $searchTerm = mysqli_real_escape_string($conexion, $_POST['SearchId']);
    $searchTable = mysqli_real_escape_string($conexion, $_POST['Table']);
    $searchId = mysqli_real_escape_string($conexion, $_POST['SearchIdCampo']);

    $sql_select = "SELECT * FROM $searchTable WHERE $searchId LIKE '%$searchTerm%'";

} else {
    
    // Si no hay un formulario de búsqueda, selecciona todos los registros de la tabla 'library'
    
    $sql_select = "SELECT * FROM library";
}

$seeing = mysqli_query($conexion, $sql_select);
?>