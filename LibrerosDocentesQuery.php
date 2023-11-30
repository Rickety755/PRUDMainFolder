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

// Verificar si se ha enviado el formulario para eliminar
if (isset($_POST["BookEliminar"])) {
    // Obtener el código del producto a eliminar
    $BookCode = $_POST['BookEliminar'];

    // Consulta SQL para eliminar el registro de manera segura
    $deleteQuery = "DELETE FROM books WHERE BookCode = ?";

    // Preparar la consulta
    $consulta_delete = $conexion_delete->prepare($deleteQuery);

    // Vincular el valor del código del producto
    $consulta_delete->bind_param("s", $BookCode);

    // Ejecutar la consulta
    if ($consulta_delete->execute()) {
        // Registro eliminado con éxito, redirigir a la página deseada
        header("Location: LibrerosDocentes.php");
    }

    // Cerrar la declaración
    $consulta_delete->close();
}

// Verificar si se ha enviado el formulario para actualizar
if (isset($_POST["BookUpdate"])) {
    $CodeUpdating = $_POST['BookUpdate'];

    // Redirigir a la página de actualización con el código
    header("Location: LibrerosDocentesUpdate.php?BookUpdate=$CodeUpdating");
}

// Verificar si se ha enviado el formulario para actualizar con los datos modificados
if (isset($_POST["BookUpdated"])) {
    // Obtener el código del producto a actualizar
    $BookCode = $_POST['BookUpdated'];

    // Consulta SQL para actualizar el registro
    $updateQuery =  "UPDATE books
    SET Title = ?, Pages = ?, Editorial = ?, BookNumber = ?, TomeNumber = ?
    WHERE BookCode = ?";

    // Preparar la consulta
    $consulta_update = $conexion_update->prepare($updateQuery);

    // Vincular los valores a los parámetros de la consulta
    $consulta_update->bind_param("ssssss", $_POST['Title'], $_POST['Pages'], $_POST['Editorial'], $_POST['BookNumber'], $_POST['TomeNumber'], $BookCode);

    // Ejecutar la consulta
    if ($consulta_update->execute()) {
        // Registro actualizado con éxito, redirigir a la página deseada
        header("Location: LibrerosDocentes.php");
    }

    // Cerrar la declaración
    $consulta_update->close();
}

// Verificar si se ha enviado el formulario
if (isset($_POST["send"])) {

    $Title = $_POST['Title'];
    $Pages = $_POST['Pages'];
    $Editorial = $_POST['Editorial'];
    $BookNumber = $_POST['BookNumber'];
    $TomeNumber = $_POST['TomeNumber'];


    // Consulta SQL para eliminar el registro de manera segura
    $insertQuery = "INSERT INTO books (`Title`,`Pages`,`Editorial`,`BookNumber`,`TomeNumber`)
    VALUES (?, ?, ?, ?, ?)";

    // Preparar la consulta
    $consulta_insert = $conexion_insert->prepare($insertQuery);

    // Vincular el valor del código del producto
    $consulta_insert->bind_param("sssss", $Title, $Pages, $Editorial, $BookNumber, $TomeNumber);

    // Ejecutar la consulta
    if ($consulta_insert->execute()) {
        // Registro eliminado con éxito, puedes redirigir a la página deseada
        header("Location: LibrerosDocentes.php");
    }

    // Cerrar la declaración
    $consulta_insert->close();
}
?>
