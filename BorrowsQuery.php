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
if (isset($_POST["BorrowEliminar"])) {
    // Obtener el código del producto a eliminar
    $BorrowCode = $_POST['BorrowEliminar'];

    // Consulta SQL para eliminar el registro de manera segura
    $deleteQuery = "DELETE FROM borrows WHERE BorrowCode = ?";

    // Preparar la consulta
    $consulta_delete = $conexion_delete->prepare($deleteQuery);

    // Vincular el valor del código del producto
    $consulta_delete->bind_param("s", $BorrowCode);

    // Ejecutar la consulta
    if ($consulta_delete->execute()) {
        // Registro eliminado con éxito, redirigir a la página deseada
        header("Location: LibrerosDocentes.php");
    }

    // Cerrar la declaración
    $consulta_delete->close();
}

// Verificar si se ha enviado el formulario para actualizar
if (isset($_POST["BorrowUpdate"])) {
    $CodeUpdating = $_POST['BorrowUpdate'];

    // Redirigir a la página de actualización con el código
    header("Location: BorrowsUpdateUpdate.php?BorrowUpdate=$CodeUpdating");
}







// Verificar si se ha enviado el formulario para actualizar con los datos modificados
if (isset($_POST["BorrowUpdated"])) {
    // Obtener el código del producto a actualizar
    $BorrowCode = $_POST['BorrowUpdated'];
    if ($_POST['Deliver']=="Si") {
        $Delivered = 1;
    } else {
        $Delivered = 0;
    }

    // Consulta SQL para actualizar el registro
    $updateQuery =  "UPDATE borrows
    SET BorrowDate = ?, BorrowTimeDays = ?, UserBorrowed = ?, BookBorrowed = ?, Delivered = ?
    WHERE BorrowCode = ?";

    // Preparar la consulta
    $consulta_update = $conexion_update->prepare($updateQuery);

    // Vincular los valores a los parámetros de la consulta
    $consulta_update->bind_param("ssssss", $_POST['BorrowDate'], $_POST['BorrowTimeDays'], $_POST['UserBorrowed'], $_POST['BookBorrowed'], $Delivered, $BorrowCode);

    // Ejecutar la consulta
    if ($consulta_update->execute()) {
        // Registro actualizado con éxito, redirigir a la página deseada
        header("Location: Borrows.php");
    }

    // Cerrar la declaración
    $consulta_update->close();
}






// Verificar si se ha enviado el formulario
if (isset($_POST["send"])) {
    
    $BorrowDate = $_POST['BorrowDate'];
    $BorrowTimeDays = $_POST['BorrowTimeDays'];
    $UserBorrowed = $_POST['UserBorrowed'];
    $BookBorrowed = $_POST['BookBorrowed'];
    $Delivered = 0;
    


    // Consulta SQL para eliminar el registro de manera segura
    $insertQuery = "INSERT INTO borrows (`BorrowDate`,`BorrowTimeDays`,`UserBorrowed`,`BookBorrowed`,`Delivered`)
    VALUES (?, ?, ?, ?, ?)";

    // Preparar la consulta
    $consulta_insert = $conexion_insert->prepare($insertQuery);

    // Vincular el valor del código del producto
    $consulta_insert->bind_param("sssss", $BorrowDate, $BorrowTimeDays, $UserBorrowed, $BookBorrowed, $Delivered);
    
    // Ejecutar la consulta
    if ($consulta_insert->execute()) {
        // Registro eliminado con éxito, puedes redirigir a la página deseada
        header("Location: Library.php");
    }

    // Cerrar la declaración
    $consulta_insert->close();
}
?>
