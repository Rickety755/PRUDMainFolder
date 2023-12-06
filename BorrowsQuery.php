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
if (isset($_POST["BorrowEliminar"])) {

    //TODO                Obtenemos el codigo del registro a eliminar                    
    $BorrowCode = $_POST['BorrowEliminar'];

    //TODO                 Consulta delete              
    $deleteQuery = "DELETE FROM borrows WHERE BorrowCode = ?";

    $consulta_delete = $conexion_delete->prepare($deleteQuery);
    
    //TODO   Conecta aquellos campos no especificados de la consulta(= ?) con las variables     
    $consulta_delete->bind_param("s", $BorrowCode);

    if ($consulta_delete->execute()) {
        //TODO              Nos dirige de nuevo a la pagina con la tabla                 
        header("Location: Borrows.php");
    }

    $consulta_delete->close();
}


//TODO                               SI es que se esta actualizando                                          
if (isset($_POST["BorrowUpdated"])) {

    //TODO            Les damos valores a las variables              
    $BorrowCode = $_POST['BorrowUpdated'];
    if ($_POST['Deliver']=="Si") {
        $Delivered = 1;
    } else {
        $Delivered = 0;
    }

    //TODO             Consulta update             
    $updateQuery =  "UPDATE borrows
    SET BorrowDate = ?, BorrowTimeDays = ?, UserBorrowed = ?, BookBorrowed = ?, Delivered = ?
    WHERE BorrowCode = ?";

    $consulta_update = $conexion_update->prepare($updateQuery);

    //TODO       Conecta aquellos campos no especificados de la consulta(= ?) con las variables   
    $consulta_update->bind_param("ssssss", $_POST['BorrowDate'], $_POST['BorrowTimeDays'], $_POST['UserBorrowed'], $_POST['BookBorrowed'], $Delivered, $BorrowCode);

    if ($consulta_update->execute()) {
        //TODO              Nos dirige de nuevo a la pagina con la tabla                 
        header("Location: Borrows.php");
    }

    $consulta_update->close();
}


//TODO                                SI es que se esta registrando                                     
if (isset($_POST["send"])) {
    
    //TODO            Les damos valores a las variables              
    $BorrowDate = $_POST['BorrowDate'];
    $BorrowTimeDays = $_POST['BorrowTimeDays'];
    $UserBorrowed = $_POST['UserBorrowed'];
    $BookBorrowed = $_POST['BookBorrowed'];
    $Delivered = 0;
    


    //TODO             Consulta insert                    
    $insertQuery = "INSERT INTO borrows (`BorrowDate`,`BorrowTimeDays`,`UserBorrowed`,`BookBorrowed`,`Delivered`)
    VALUES (?, ?, ?, ?, ?)";

    $consulta_insert = $conexion_insert->prepare($insertQuery);

    //TODO       Conecta aquellos campos no especificados de la consulta(= ?) con las variables   
    $consulta_insert->bind_param("sssss", $BorrowDate, $BorrowTimeDays, $UserBorrowed, $BookBorrowed, $Delivered);
    
    if ($consulta_insert->execute()) {
        //TODO              Nos dirige de nuevo a la pagina con la tabla                 
        header("Location: Borrows.php");
    }

    $consulta_insert->close();
}
?>