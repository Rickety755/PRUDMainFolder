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





/* --------------------------------------------If se esta eliminando--------------------------------------- */

if (isset($_POST["UserEliminar"])) {
    // Obtener el código del producto a eliminar
    $UserCode = $_POST['UserEliminar'];

    // Consulta SQL para eliminar el registro de manera segura
    $deleteQuery = "DELETE FROM users WHERE UserCode = ?";

    // Preparar la consulta
    $consulta_delete = $conexion_delete->prepare($deleteQuery);

    // Vincular el valor del código del producto
    $consulta_delete->bind_param("s", $UserCode);

    // Ejecutar la consulta
    if ($consulta_delete->execute()) {
        // Registro eliminado con éxito, redirigir a la página deseada
        header("Location: Users.php");
    }

    // Cerrar la declaración
    $consulta_delete->close();
}







/* --------------------------------If se esta actualizando--------------------------------------------- */
//TODO boleano
if (isset($_POST["UserUpdated"])) {
    // Obtener el código del producto a actualizar
    $UserCode = $_POST['UserUpdated'];


    if ($_POST['Docente']=="Docente") {
        $Docente = 1;
    } else {
        $Docente = 0;
    }

    // Consulta SQL para actualizar el registro
    $updateQuery =  "UPDATE users
    SET Username  = ?, Userpassword = ?, Docente = ?, IngenieriaAplicada = ?
    WHERE UserCode = ?";

    // Preparar la consulta
    $consulta_update = $conexion_update->prepare($updateQuery);

    // Vincular los valores a los parámetros de la consulta
    $consulta_update->bind_param("sssss", $_POST['Username'], $_POST['Userpassword'], $_POST['Docente'], $_POST['IngenieriaAplicada'], $UserCode);

    // Ejecutar la consulta
    if ($consulta_update->execute()) {
        // Registro actualizado con éxito, redirigir a la página deseada
        header("Location: Users.php");
    }

    // Cerrar la declaración
    $consulta_update->close();
}




/* --------------------------------------If se esta registrando------------------------------------------- */

if (isset($_POST["send"])) {
    
    $Username = $_POST['Username'];
    $Userpassword = $_POST['Userpassword'];
    $IngenieriaAplicada = $_POST['IngenieriaAplicada'];

    $Docente = 1;


    // Consulta SQL para eliminar el registro de manera segura
    $insertQuery = "INSERT INTO users (`Username`,`Userpassword`,`Docente`,`IngenieriaAplicada`)
    VALUES (?, ?, ?, ?)";

    // Preparar la consulta
    $consulta_insert = $conexion_insert->prepare($insertQuery);

    // Vincular el valor del código del producto
    $consulta_insert->bind_param("ssss", $Username, $Userpassword, $Docente, $IngenieriaAplicada);
    
    // Ejecutar la consulta
    if ($consulta_insert->execute()) {
        // Registro eliminado con éxito, puedes redirigir a la página deseada
        header("Location: Users.php");
    }

    // Cerrar la declaración
    $consulta_insert->close();
}
?>
