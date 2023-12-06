<?php
// Conexión a la base de datos
$host = "localhost";
$user = "root";
$password = "";
$dbname = "prud";

$conexion_delete = new mysqli($host, $user, $password, $dbname);
$conexion_update = new mysqli($host, $user, $password, $dbname);
$conexion_insert = new mysqli($host, $user, $password, $dbname);

// Verificar la conexión a la base de datos
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
if (isset($_POST["UserEliminar"])) {

    //TODO                Obtenemos el codigo del registro a eliminar                    
    $UserCode = $_POST['UserEliminar'];

    //TODO                 Consulta delete              
    $deleteQuery = "DELETE FROM users WHERE UserCode = ?";

    $consulta_delete = $conexion_delete->prepare($deleteQuery);

    //TODO   Conecta aquellos campos no especificados de la consulta(= ?) con las variables     
    $consulta_delete->bind_param("s", $UserCode);

    if ($consulta_delete->execute()) {
        //TODO              Nos dirige de nuevo a la pagina con la tabla                 
        header("Location: Users.php");
    }

    $consulta_delete->close();
}


//TODO                               SI es que se esta actualizando                                          
if (isset($_POST["UserUpdated"])) {

    //TODO                Obtenemos el codigo del registro a actualizar                    
    $UserCode = $_POST['UserUpdated'];

    //TODO                SI se seleciono docente el boleano sera 1                        
    if ($_POST['Docente']==="Docente") {
        $Docente = 1;
    } else {
        $Docente = 0;
    }

    //TODO             Consulta update             
    $updateQuery =  "UPDATE users
    SET Username  = ?, Userpassword = ?, Docente = ?, IngenieriaAplicada = ?
    WHERE UserCode = ?";

    $consulta_update = $conexion_update->prepare($updateQuery);

    //TODO       Conecta aquellos campos no especificados de la consulta(= ?) con las variables   
    $consulta_update->bind_param("sssss", $_POST['Username'], $_POST['Userpassword'], $Docente, $_POST['IngenieriaAplicada'], $UserCode);

    if ($consulta_update->execute()) {
        //TODO              Nos dirige de nuevo a la pagina con la tabla                 
        header("Location: Users.php");
    }

    $consulta_update->close();
}



//TODO                                SI es que se esta registrando                                     
if (isset($_POST["send"])) {
    
    //TODO            Les damos valores a las variables              
    $Username = $_POST['Username'];
    $Userpassword = $_POST['Userpassword'];
    $IngenieriaAplicada = $_POST['IngenieriaAplicada'];

    $Docente = 1;


    //TODO             Consulta insert                    
    $insertQuery = "INSERT INTO users (`Username`,`Userpassword`,`Docente`,`IngenieriaAplicada`)
    VALUES (?, ?, ?, ?)";

    $consulta_insert = $conexion_insert->prepare($insertQuery);

    //TODO       Conecta aquellos campos no especificados de la consulta(= ?) con las variables   
    $consulta_insert->bind_param("ssss", $Username, $Userpassword, $Docente, $IngenieriaAplicada);
    
    if ($consulta_insert->execute()) {
        //TODO              Nos dirige de nuevo a la pagina con la tabla                 
        header("Location: Users.php");
    }

    $consulta_insert->close();
}
?>
