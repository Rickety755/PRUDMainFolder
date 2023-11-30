<?php
// Código eliminación del registro

// Conexión a la base de datos
$host = "localhost";
$user = "root";
$password = "";
$dbname = "prud";

$conexion_register = new mysqli($host, $user, $password, $dbname);

// Verificar la conexión a la base de datos
if ($conexion_register->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion_register->connect_error);
}

// Verificar si se ha enviado el formulario
if (isset($_POST["Register"])) {

    $usuario = $_POST['User'];
    $password = $_POST['Password'];
    $mail = 0;

    // Consulta SQL para eliminar el registro de manera segura
    $registerQuery = "INSERT INTO accounts (`usuario`,`password`,`email`)
    VALUES (?, ?, ?)";

    // Preparar la consulta
    $consulta_register = $conexion_register->prepare($registerQuery);

    // Vincular el valor del código del producto
    $consulta_register->bind_param("sss", $usuario, $password, $mail);

    // Ejecutar la consulta
    if ($consulta_register->execute()) {
        // Registro eliminado con éxito, puedes redirigir a la página deseada
        header("Location: index.html");
    } else {
        // Mostrar un mensaje de error si la consulta no se ejecuta correctamente
        echo "Error: " . $consulta_register->error;
    }

    // Cerrar la declaración
    $consulta_register->close();
}
?>