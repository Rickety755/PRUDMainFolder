<?php
//TODO                                      Conexion a la base de datos                                      
$host = "localhost";
$user = "root";
$password = "";
$dbname = "prud";

$conexion_register = new mysqli($host, $user, $password, $dbname);

if ($conexion_register->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion_register->connect_error);
}

//TODO                                 SI se esta registrando                  
if (isset($_POST["Confirmar"])) {

    //TODO            Les damos valores a las variables              
    $Username = $_POST['Username'];
    $Userpassword = $_POST['Userpassword'];
    $Docente = 0;
    $IngenieriaAplicada = $_POST['IngenieriaAplicada'];
    

    //TODO             Consulta insert                    
    $registerQuery = "INSERT INTO users (`Username`,`Userpassword`,`Docente`,`IngenieriaAplicada`)
    VALUES (?, ?, ?, ?)";

    $consulta_register = $conexion_register->prepare($registerQuery);

    //TODO       Conecta aquellos campos no especificados de la consulta(= ?) con las variables   
    $consulta_register->bind_param("ssss", $Username, $Userpassword, $Docente, $IngenieriaAplicada);

    if ($consulta_register->execute()) {
        //TODO              Nos dirige de nuevo a la pagina con la tabla                 
        header("Location: index.html");
    }

    $consulta_register->close();
}
?>