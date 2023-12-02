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

if(!isset($_POST['userinput'],$_POST['passinput'])){
    // si no hay datos , que redireccione
    header('Location: Campus.html');
    exit;//es para asegurar de que se detenga la ejecucion del script
}

// evita inyeccion de datos en sql, utilizando sentencias preparadas

if($stmt = $conexion -> prepare('SELECT Username, Userpassword, Docente FROM users WHERE Username = ?')){
   
    //parametros de enlace
    $stmt -> bind_param('s', $_POST['userinput']);//esta variable me es necesaria para enlazar los parametros que tengo para con sql
    $stmt -> execute();
}
// si coinciden los datos introducidos,traerlos
//almacenar resultados
$stmt -> store_result();
if($stmt-> num_rows>0) {
$stmt -> bind_result($id,$password,$docente);
$stmt -> fetch();
//comprobar si se encontraron resultados
if($_POST['passinput']===$password){
//con esto debe mandarnos al menu
   session_regenerate_id();
   $_SESSION['loggedin']=true;
   $_SESSION['name']=$_POST['userinput'];
   $_SESSION['id']=$id;
   $_SESSION['Docente']=$docente;
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