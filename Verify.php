<?php
session_start();
$DATABASE_HOST = "localhost";
$DATABASE_USER = "root";
$DATABASE_PASS = "";
$DATABASE_NAME = "prud";

$conexion=mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);
if(mysqli_connect_error()){

    exit('ERROR EN LA CONEXION CON LA BD EN MYSQL'.mysqli_connect_error());
}
if (isset($_POST["IdxConfirmar"])){
/* --------------------------------------------------------------------------------------- */

if($stmt = $conexion -> prepare('SELECT User, UserPassword FROM users WHERE User = ?')){
    $stmt -> bind_param('s', $_POST['userinput']);/* conecta con la seccion de la sentencia "?'" */
    $stmt -> execute();/* manda la sentencia */
}

/* -------------------------------------------------------------------------------------- */

/* if ($querydocente = $conexiondocente -> prepare('SELECT Docente FROM users WHERE Docente = 1')) {
    $_SESSION['Docente'] = true;
} */

/* --------------------------------busca eso q salio y lo guarda------------------------------------- */

$stmt -> store_result();
if($stmt-> num_rows>0) {
$stmt -> bind_result($id,$password);
$stmt -> fetch();
} else {
    header('Location: index.html');
}

/* -------------------------------------------------------------------------------------------- */

}
$stmt->close();
?>