<?php
session_start();
//credenciales de acceso
$DATABASE_HOST = "localhost";
$DATABASE_USER = "root";
$DATABASE_PASS = "";
$DATABASE_NAME = "prud";

//conexion
$conexion=mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);
//condicion para verificacion de errores con la bd
if(mysqli_connect_error()){

    exit('ERROR EN LA CONEXION CON LA BD EN MYSQL'.mysqli_connect_error());
}

// validacion de informacion por POST

if(!isset($_POST['username'],$_POST['pass'])){
    // si no hay datos , que redireccione
    header('Location: index.html');
    exit;//es para asegurar de que se detenga la ejecucion del script
}

// evita inyeccion de datos en sql, utilizando sentencias preparadas

if($stmt = $conexion -> prepare('SELECT UsersCode, UserPassword FROM users WHERE User= ?')){
   
    //parametros de enlace
    $stmt -> bind_param('s', $_POST['username']);//esta variable me es necesaria para enlazar los parametros que tengo para con sql
    $stmt -> execute();
}
// si coinciden los datos introducidos,traerlos
//almacenar resultados
$stmt -> store_result();
if($stmt-> num_rows>0) {
$stmt -> bind_result($id,$password);
$stmt -> fetch();
//comprobar si se encontraron resultados
if($_POST['pass']===$password){
//con esto debe mandarnos al menu
   session_regenerate_id();
   $_SESSION['loggedin']=true;
   $_SESSION['name']=$_POST['username'];
   $_SESSION['id']=$id;
   echo '<script> alert("Inicio de sesión exitoso"); </script>';
   header('Location:Campus.php');
   
} else{
    header('Location:index.html');
}
} else{
   
    header('Location:index.html');
}
$stmt->close();

?>