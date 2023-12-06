<?php
//TODO                                      Conexion a la base de datos                                      
$host = "localhost";
$user = "root";
$password = "";
$dbname = "prud";

$conexion_delete = new mysqli($host, $user, $password, $dbname);
$conexion_update = new mysqli($host, $user, $password, $dbname);
$conexion_insert = new mysqli($host, $user, $password, $dbname);

if ($conexion_delete->connect_error || $conexion_update->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion_delete->connect_error);
}
if ($conexion_update->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion_update->connect_error);
}
if ($conexion_insert->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion_insert->connect_error);
}

//TODO                                SI es que se esta eliminando                                             
if (isset($_POST["BookEliminar"])) {

    //TODO                Obtenemos el codigo del registro a eliminar                    
    $BookCode = $_POST['BookEliminar'];

    //TODO                 Consulta delete              
    $deleteQuery = "DELETE FROM books WHERE BookCode = ?";

    $consulta_delete = $conexion_delete->prepare($deleteQuery);

    //TODO   Conecta aquellos campos no especificados de la consulta(= ?) con las variables     
    $consulta_delete->bind_param("s", $BookCode);

    if ($consulta_delete->execute()) {
        //TODO              Nos dirige de nuevo a la pagina con la tabla                 
        header("Location: LibrerosDocentes.php");
    }

    $consulta_delete->close();
}


//TODO                               SI es que se esta actualizando                                          
if (isset($_POST["BookUpdated"])) {

    //TODO                Obtenemos el codigo del registro a actualizar                    
    $BookCode = $_POST['BookUpdated'];

    //TODO             Consulta update             
    $updateQuery =  "UPDATE books
    SET Title = ?, Pages = ?, Editorial = ?, BookNumber = ?, TomeNumber = ?
    WHERE BookCode = ?";

    $consulta_update = $conexion_update->prepare($updateQuery);

    //TODO   Conecta aquellos campos no especificados de la consulta(= ?) con las variables     
    $consulta_update->bind_param("ssssss", $_POST['Title'], $_POST['Pages'], $_POST['Editorial'], $_POST['BookNumber'], $_POST['TomeNumber'], $BookCode);

    if ($consulta_update->execute()) {
        //TODO              Nos dirige de nuevo a la pagina con la tabla                 
        header("Location: LibrerosDocentes.php");
    }

    $consulta_update->close();
}


//TODO                                SI es que se esta registrando                                     
if (isset($_POST["send"])) {

    //TODO            Les damos valores a las variables              
    $Title = $_POST['Title'];
    $Pages = $_POST['Pages'];
    $Editorial = $_POST['Editorial'];
    $BookNumber = $_POST['BookNumber'];
    $TomeNumber = $_POST['TomeNumber'];


    //TODO             Consulta insert                    
    $insertQuery = "INSERT INTO books (`Title`,`Pages`,`Editorial`,`BookNumber`,`TomeNumber`)
    VALUES (?, ?, ?, ?, ?)";

    $consulta_insert = $conexion_insert->prepare($insertQuery);

    //TODO   Conecta aquellos campos no especificados de la consulta(= ?) con las variables     
    $consulta_insert->bind_param("sssss", $Title, $Pages, $Editorial, $BookNumber, $TomeNumber);

    if ($consulta_insert->execute()) {
        //TODO              Nos dirige de nuevo a la pagina con la tabla                 
        header("Location: LibrerosDocentes.php");
    }

    $consulta_insert->close();
}
?>
