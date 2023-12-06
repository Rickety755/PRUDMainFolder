<?php
//TODO                Obtenemos el inicio de sesion              
session_start();

$DATABASE_HOST = "localhost";
$DATABASE_USER = "root";
$DATABASE_PASS = "";
$DATABASE_NAME = "prud";

$conexion=mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);

if(mysqli_connect_error()){

    exit('ERROR EN LA CONEXION CON LA BD EN MYSQL'.mysqli_connect_error());
}

//TODO                SI los campos de el inicio de sesion estan vacios                     
if(!isset($_POST['userinput'],$_POST['passinput'])){

        //TODO              Nos dirige de nuevo a la pagina del index                 
    header('Location: Index.html');
    exit;
}

//TODO                                   Secuencia SQL select                                    
if($stmt = $conexion -> prepare('SELECT Username, Userpassword, Docente FROM users WHERE Username = ?')){
   
    //TODO   Conecta aquellos campos no especificados de la consulta(= ?) con las variables     
    $stmt -> bind_param('s', $_POST['userinput']);
    $stmt -> execute();
}

//TODO             Guardar resultados, comprobar si los resultados coinciden        
$stmt -> store_result();
if($stmt-> num_rows>0) {
$stmt -> bind_result($id,$password,$docente);
$stmt -> fetch();
if($_POST['passinput']===$password){

//TODO            Creacion de la sesion             
   session_regenerate_id();
   $_SESSION['loggedin']=true;
   $_SESSION['name']=$_POST['userinput'];
   $_SESSION['id']=$id;
   $_SESSION['Docente']=$docente;
   echo '<script> alert("Inicio de sesión exitoso"); </script>';

   //TODO              Nos dirige a la pantalla del campus                 
   header('Location:Campus.php');
   
} else{
    //TODO          SI no coincide la contraseña, nos dirige de nuevo a la pagina del index                 
    header('Location:index.html');
}
} else{
    //TODO          SI no hay resultados, nos dirige de nuevo a la pagina del index                 
    header('Location:index.html');
}
$stmt->close();

?>