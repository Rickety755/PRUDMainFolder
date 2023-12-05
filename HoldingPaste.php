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

<!-- --------------------------------------------------------------------------------------------- -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-image: url(LibrerosBCK2.jpg);
            background-size: cover;
            color: white;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .LibTable {
            box-shadow: black 0 0 100px;
            width: 80%;
            background-color: rgba(180, 180, 180, 0.479);
            margin-top: 120px; margin-left: 10%; margin-right: 10%;
            border: none;
            border-radius: 10px;
        }
        
        .LibBtn {
            color: gold;
        }

        .LibDiv1 {
            box-shadow: black 0 0 100px;
            width: 50%;
            height: 120px;
            background-color: rgba(0, 0, 0, 0.479);
            margin-top: -30px; margin-left: 15%; margin-right: 15%;
            border: none;
            border-radius: 10px;
        }

        .LibTitle {
            font-size: 70px;
            color: gold;
        }

        .LibSubTitle {
            font-size: 25px;
            color: gold;
            margin-top: -95px;
        }

        .LibInput {
            width: 100%;
            padding: 3px;
            background-color: #868686;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border: none; border-radius: 5px;
            font-size: 15px;
        }

        .LibInputAlt {
            width: 80%;
            padding: 3px;
            background-color: #868686;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border: none; border-radius: 5px;
            font-size: 15px;
            margin-left: 10%; margin-right: 10%;
        }

        button {
            background-color: #868686;
            font-size: 15px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border: none; border-radius: 10px;
            padding: 5px;
            margin-bottom: 5px;
        }

        button:hover {
            transition: 0.5s;
            background-color: #c4c4c4;
            border: #ffffff 1px solid;
        }
    </style>
</head>
<body>
<center><div class="LibDiv1"><p class="LibTitle">PRUD</p> <br> <p class="LibSubTitle">Project Rickety's University D</p></div></center>
<!-- ------------------------------------------------------------------------------------------------- -->
    <?php
    $DATABASE_HOST = "localhost";
    $DATABASE_USER = "root";
    $DATABASE_PASS = "";
    $DATABASE_NAME = "prud";

    $conexion = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

    if ($conexion->connect_error) {
        die("Connection failed: " . $conexion->connect_error);
    }
    $query2 = "SELECT * FROM users";
    $query3 = "SELECT * FROM books";

    $result2 = $conexion->query($query2);
    $result3 = $conexion->query($query3);

    if (!$result2) {
        die("Query failed: " . $conexion->error);
    }
    if (!$result3) {
        die("Query failed: " . $conexion->error);
    }

    $conexion->close();
    ?>
    <!-- ------------------------------------------------------------------------------ -->
<center>
        <table class="LibTable">
            <tr>
                <th>Codigo de usuario</th>
                <th>Codigo de libro</th>
                <th>Fecha de salida</th>
                <th>Dias para entregar</th>
                <th>Entregado</th>
            </tr>
            <form action="BorrowsQuery.php" method="POST"><?php
                echo "<tr>";
                    echo "<td><select class='LibInput' name='Username' id='Username'>"; 
                    while ($row = $result2->fetch_assoc()) { 
                        echo "<option value='". $row['Username'] ."'>". $row['Username'] ."</option>"; 
                    } 
                    echo "</select></td>";
                    echo "<td><select class='LibInput' name='BookCode' id='BookCode'>"; 
                    while ($row = $result3->fetch_assoc()) { 
                        echo "<option value='". $row['BookCode'] ."'>". $row['BookCode'] ."</option>"; 
                    } 
                    echo "</select></td>";                    
                    echo "<td><input class='LibInput' type='date' id='BorrowDate' name='BorrowDate' required></td>";
                    echo "<td><input class='LibInputAlt' type='number' id='DeliverTimeDays' name='DeliverTimeDays' required></td>";
                    echo "<td><input class='LibInputAlt' type='number' id='Delivered' name='Delivered' required></td>";
                    echo "<td> <button class='submit' name='BorrowUpdated'>Update</button></td>";
                echo "</tr>";
            ?>
            </form>
        </table>
    </center>
    <br>
        <center><a href="Library.php"><button class="CamBtn">Volver a la Biblioteca</button></a></center>
</body>
</html>
















<?php
include '../Backend/ConnectionSession.php';
// Incluye el archivo de conexión de sesión que   contiene la lógica para manejar las sesiones.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Configuración de la estructura básica de un documento HTML -->
    <title>Biblioteca | UNIIG</title>
    <link rel="shortcut icon" href="imgs/Icono.png" sizes="5x5">
    <link rel="stylesheet" href="design.css">
    <!-- Enlaces a archivos de estilo y otros recursos -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script type="text/javascript" id="MathJax-script" async
            src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js">
    </script>
    <!-- Inclusión de scripts externos, como el soporte para MathJax -->
</head>

<header>
    <a href="Menu.php"><img src="imgs/Logo_UNIIG.png"></a>
    <div>
        <p id="fecha"></p>
    </div>
    <h1>Biblioteca de la UNIIG &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
    <!-- Cabecera de la página, con un enlace a un menú, un logotipo y una etiqueta de fecha -->
</header>

<body class="library">
    <center>
        <?php include '../Backend/findBook.php'; ?>
    <!-- Incluye un archivo PHP que   contiene lógica para buscar libros -->
    <div id="Buscador">
        <form action="libraryPage.php" method="post">
            <!-- Formulario para buscar libros -->
            <label for="search">Buscar libro:</label>
            <input type="text" id="search" name="search" placeholder="Ingrese el folio del libro">
            <input type="submit" value="Buscar">
        </form>
    </div>
    </center>
    
    <form action="libraryPage.php" method="post">
    <!-- Otro formulario, parece ser para mostrar la lista de libros -->
    <table border="1">
        <!-- Tabla para mostrar la información de los libros -->
        <thead>
            <tr>
                <!-- Encabezados de la tabla -->
                <th><p>Folio</p></th>
                <th><p>Nombre del libro</p></th>
                <th><p>Editorial</p></th>
                <th><p>Ejemplar número:</p></th>
                <th><p>Volúmen número:</p></th>
                <?php if ($_SESSION['user_type'] === 'manager'): ?>
                <!-- Condición PHP para mostrar una columna adicional si el usuario es de tipo 'manager' -->
                <th><p>Eliminar/Modificar</p></th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
        <?php
        $seeing = mysqli_query($conexion, $sql_select);
        // Ejecuta una consulta SQL y almacena el resultado en $seeing
        // Mostrar datos de la base de datos
        while ($mostrar = mysqli_fetch_array($seeing)) {
            // Recorre los resultados de la consulta y muestra cada fila en la tabla
            ?>
            <tr>
                <!-- Celdas de la tabla con los datos de cada libro -->
                <td><p align="center"><?php echo $mostrar['Invoice']; ?></p></td>
                <td><p align="center"><?php echo $mostrar['Name_book']; ?></p></td>
                <td><p align="center"><?php echo $mostrar['Editorial']; ?></p></td>
                <td><p align="center"><?php echo $mostrar['No_Exemplary']; ?></p></td>
                <td><p align="center"><?php echo $mostrar['No_Volumen']; ?></p></td>
                <?php if ($_SESSION['user_type'] === 'manager'): ?>
                <td>
                    <!-- Botón eliminar y modificar registro, solo visible para usuarios de tipo 'manager' -->
                    <div id="InputsInvTickLog" align="center">
                        <br>
                        <form action="../Backend/deleteReg.php" method="POST">
                            <input type='hidden' value="<?php echo $mostrar['Id_book']; ?>" name='Id_book'>
                            <input type='submit' value='Eliminar'>
                        </form>
                        <br>
                        <form action="modReg.php" method="POST">
                            <input type="hidden" value="<?php echo $mostrar['Id_book']; ?>" name='Id_book'>
                            <input type="submit" value="Modificar">
                        </form>
                        <br>
                    </div>
                </td>
                <?php endif; ?>
            </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    <!-- Fin de la tabla -->

    <div id="btnslibrary">
        <!-- Botones de navegación para volver al menú y agregar libros, visibles solo para usuarios de tipo 'manager' -->
        <a href="../Frontend/Menu.php">
            <input type="button" value="Volver al menú">
        </a>
        <?php if ($_SESSION['user_type'] === 'manager'): ?>
        <a href="booksNewPage.php">
            <input type="button" value="Agregar libros">
        </a>
        <?php endif; ?>
    </div>

    <div id="btnCloseSignIn">
        <!-- Botón para cerrar sesión -->
        <a href="../Backend/close_signIn.php" >
            <input type="button" value="Cerrar sesión">
        </a>
    </div> 

    </form>
    <br><br><br>

    <footer>
        <!-- Pie de página con información del autor y su clase -->
        <p>&copy; Ortiz Garcia Daniel 5-W</p>
    </footer>

<script>
    // Script para obtener y mostrar la fecha actual en el documento
    function obtenerFechaActual() {
        const fecha = new Date();
        const dia = fecha.getDate().toString().padStart(2, '0');
        const mes = (fecha.getMonth() + 1).toString().padStart(2, '0');
        const año = fecha.getFullYear();
        return `${dia}/${mes}/${año}`;
    }
    document.getElementById('fecha').textContent = obtenerFechaActual();
</script>

</body>
</html>

<!-- --------------------------------------------------------------------------------------- -->

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

    if ($_POST['Deliver']=="Si") {
        $Delivered = 1;
    } else {
        $Delivered = 0;
    }


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

<!-- ------------------------------------------------------------------------------------------- -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-image: url(LibrerosBCK2.jpg);
            background-size: cover;
            color: white;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .LibTable {
            box-shadow: black 0 0 100px;
            width: 80%;
            background-color: rgba(180, 180, 180, 0.479);
            margin-top: 50px; margin-left: 10%; margin-right: 10%;
            border: none;
            border-radius: 10px;
        }
        
        .LibBtn {
            color: gold;
        }

        .LibDiv1 {
            box-shadow: black 0 0 100px;
            width: 50%;
            height: 120px;
            background-color: rgba(0, 0, 0, 0.479);
            margin-top: -30px; margin-left: 15%; margin-right: 15%;
            border: none;
            border-radius: 10px;
        }

        .LibTitle {
            font-size: 70px;
            color: gold;
        }

        .LibSubTitle {
            font-size: 25px;
            color: gold;
            margin-top: -95px;
        }

        .LibInput {
            width: 100%;
            padding: 3px;
            background-color: #868686;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border: 1px solid black; border-radius: 5px;
            font-size: 15px;
        }

        .LibInputAlt {
            width: 80%;
            padding: 3px;
            background-color: #868686;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border: 1px solid black; border-radius: 5px;
            font-size: 15px;
            margin-left: 10%; margin-right: 10%;
        }

        button {
            background-color: #868686;
            font-size: 15px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border: none; border-radius: 10px;
            padding: 5px;
            margin-bottom: 5px;
        }

        button:hover {
            transition: 0.5s;
            background-color: #c4c4c4;
            border: #ffffff 1px solid;
        }

        .PageTitle {
            color: aqua;
            -webkit-text-stroke: black 2px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 25px;
        }
    </style>
</head>
<body>
<center><div class="LibDiv1"><p class="LibTitle">PRUD</p> <br> <p class="LibSubTitle">Project Rickety's University D</p></div></center>
<br><center><strong><p class='PageTitle'>Registrando un prestamo</p></strong></center>    
<!-- ------------------------------------------------------------------------------------------------- -->
    <?php
    $DATABASE_HOST = "localhost";
    $DATABASE_USER = "root";
    $DATABASE_PASS = "";
    $DATABASE_NAME = "prud";

    $conexion = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

    if ($conexion->connect_error) {
        die("Connection failed: " . $conexion->connect_error);
    }
    $query2 = "SELECT * FROM users";
    $query3 = "SELECT * FROM books";

    $result2 = $conexion->query($query2);
    $result3 = $conexion->query($query3);

    if (!$result2) {
        die("Query failed: " . $conexion->error);
    }
    if (!$result3) {
        die("Query failed: " . $conexion->error);
    }

    $conexion->close();
    ?>
    <!-- ------------------------------------------------------------------------------ -->
<center>
        <table class="LibTable">
            <tr>
                <th>Codigo de usuario</th>
                <th>Codigo de libro</th>
                <th>Fecha de salida</th>
                <th>Dias para entregar</th>
                <th>Entregado</th>
            </tr>
            <form action="BorrowsQuery.php" method="POST"><?php
                echo "<tr>";
                    echo "<td><select class='LibInput' name='UserBorrowed' id='UserBorrowed'>"; 

                    while ($row = $result2->fetch_assoc()) { 
                        echo "<option value='". $row['Username'] ."'>". $row['Username'] ."</option>"; 
                    } 
                    echo "</select></td>";

                    echo "<td><select class='LibInput' name='BookBorrowed' id='BookBorrowed'>"; 
                    while ($row = $result3->fetch_assoc()) { 
                        echo "<option value='". $row['BookCode'] ."'>". $row['BookCode'] ."</option>"; 
                    } 
                    echo "</select></td>";    

                    echo "<td><input class='LibInput' type='date' id='BorrowDate' name='BorrowDate' required></td>";
                    echo "<td><input class='LibInputAlt' type='number' id='BorrowTimeDays' name='BorrowTimeDays' required></td>";
                    
                    echo "<td><select class='LibInputAlt' name='Deliver' id='Deliver'>";
                    echo "<option value='Si'>Si</option>";
                    echo "<option value='No'>No</option>";
                    echo "</select></td>";

                    echo "<td> <button class='submit' name='send'>Send</button></td>";
                echo "</tr>";
            ?>
            </form>
        </table>
    </center>
    <br>
        <center><a href="Library.php"><button class="CamBtn">Volver a la Biblioteca</button></a></center>
</body>
</html>