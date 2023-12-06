<!--TODO                                    Conexion a base de datos                                      -->
<?php

    $DATABASE_HOST = "localhost";
    $DATABASE_USER = "root";
    $DATABASE_PASS = "";
    $DATABASE_NAME = "prud";

    $conexion = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

//TODO                                     SI se esta buscando                                       
if (isset($_POST['search'])) {
    
    //TODO         Obtiene el texto a buscar             
    $searchTerm = mysqli_real_escape_string($conexion, $_POST['search']);

    //TODO         Secuencia LIKE                         
    $sql_select = "SELECT * FROM books WHERE Title LIKE '%$searchTerm%'";

} else {
    //TODO      Si no hay nada muestra todos              
    $sql_select = "SELECT * FROM books";
}

//TODO                  Obtiene los resultados de la secuencia                     
$seeing = mysqli_query($conexion, $sql_select);
?>