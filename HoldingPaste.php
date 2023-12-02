<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/style.css" />
    <style>
        body {
            background-image: url(LoginBCK.jpg);
            background-size: cover; background-repeat: no-repeat;
            padding: 0;
        }

        header {
            position: fixed;
            width: 70%;
            height: 80px;
            background-color: rgba(0, 0, 0, 0.479);
            color: white;
            font-size: larger;
            box-shadow: 0 0 8px 8px rgba(22, 22, 22, 0.116) inset;
            margin-top: 70px; 
            margin-left: 15%; 
            margin-right: 15%;
        }

        form {
            margin-top: 85px;
            font-size: 25px;
            font-family: "Gill Sans", sans-serif;
            color: #16228a;
            -webkit-text-stroke: #ffffff 1px;
            background-color: rgba(0, 0, 0, 0.479);
            width: 40%;
            padding-top: 3px; 
            padding-bottom: 10px;
        
        }

        .IdxDiv1 {
            box-shadow: black 0 0 100px;
            width: 50%;
            height: 80px;
            background-color: rgba(0, 0, 0, 0.479);
            color: white;
            margin-top: 70px; margin-left: 15%; margin-right: 15%;
            border: none;
            border-radius: 10px;
        }

        .IdxTitle {
            font-size: 70px;
            color: gold;
        }
    
        input {
        color: gold;
        background-color: #272727;
        border: none;
        border-radius: 6px;
        padding: 8px;       
        }

        input:hover {
        transition: 1s;
        background-color: #c4c4c4;
        }

        .JustTrial {
            background-color: rgb(80, 80, 80);
        }
        
    </style>

</head>
<body><br>
    <center><div class="IdxDiv1"><p class="IdxTitle">PRUD</p></div></center>

    <center><form action="Verify.php" method="POST">
    <p>Bienvenido de nuevo!</p>
    <p>Cual es el nombre de tu usuario?</p>
    <input type="text" placeholder="Usuario" name="username" id="username">

    <br>

    <p>Ingresa tu contraseña aqui!</p>
    <input type="password" placeholder="Contraseña" name="pass" id="pass" class="contrasena">
    
    
    
    <input type="submit" placeholder="Confirmar" value="Confirmar">
    


    </form></center>
    <i class="bi bi-eye-slash" id="togglePassword"></i> <hr>
    
<script>
    const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        // prevent form submit
        const form = document.querySelector("form");
        form.addEventListener('submit', function (e) {
            e.preventDefault();
        });
</script>

</body>
</html>

<!-- --------------------------------------------------------------------------------------------- -->

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

<!-- ------------------------------------------------------------------------------------------------- -->

<?php
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Si se desea destruir la sesión, también debe eliminar la cookie de sesión.
// Nota: Esto destruirá la sesión y no afectará a otras cookies.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalmente, destruir la sesión.
session_destroy();

// Redirigir a la página de inicio después de cerrar sesión
header("Location: ../Index.html");
?>