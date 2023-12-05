<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-image: url(UsersBCK.jpg);
            background-size: cover;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .UsrDiv1 {
            box-shadow: black 0 0 100px;
            width: 50%;
            height: 120px;
            background-color: rgba(0, 0, 0, 0.479);
            margin-top: -30px; margin-left: 15%; margin-right: 15%;
            border: none;
            border-radius: 10px;
        }

        .UsrTitle {
            font-size: 70px;
            color: gold;
        }

        .UsrSubTitle {
            font-size: 25px;
            color: gold;
            margin-top: -95px;
        }

        .UsrPageTitle {
            color: white;
            font-size: 25px;
            font-weight: bold;
            -webkit-text-stroke: black 1px;
        }

        .UsrTable {
            box-shadow: black 0 0 100px;
            width: 80%;
            background-color: rgba(0, 0, 0, 0.479);
            margin-top: 50px; margin-left: 10%; margin-right: 10%;
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: bolder;
        }

        td {
            padding-left: 10px;
            text-align: center;
        }

        button {
            background-color: #868686;
            color: white;
            font-size: 15px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border: none; border-radius: 10px;
            padding: 5px;
            margin-bottom: 5px; margin-right: 5px; margin-left: 5px;
        }

        button:hover {
            transition: 0.5s;
            background-color: #c4c4c4;
            border: #ffffff 1px solid;
        }
    </style>
</head>
<body>
<center><div class="UsrDiv1"><p class="UsrTitle">PRUD</p> <br> <p class="UsrSubTitle">Project Rickety's University D</p></div></center>
    <!-- ---------------------------------------------------------------------------------- -->
    <br><center><p class="UsrPageTitle">Usuarios registrados</p></center>
    <!-- ----------------------------------------------------------------------------------- -->
    <?php
    $DATABASE_HOST = "localhost";
    $DATABASE_USER = "root";
    $DATABASE_PASS = "";
    $DATABASE_NAME = "prud";

    $conexion = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

    if ($conexion->connect_error) {
        die("Connection failed: " . $conexion->connect_error);
    }

    $query = "SELECT * FROM users";

    $result = $conexion->query($query);

    if (!$result) {
        die("Query failed: " . $conexion->error);
    }

    $conexion->close();
    ?>
    <!-- ------------------------------------------------------------------------------ -->
    <center>
        <table class="UsrTable">
            <tr>
                <th>Codigo de usuario</th>
                <th>Nombre de usuario</th>
                <th>Contraseña establecida</th>
                <th>Docente/Estudiante</th>
                <th>Ingenieria Aplicando</th>
                <th>Opciones</th>
            </tr>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['UserCode'] . "</td>";
                echo "<td>" . $row['Username'] . "</td>";
                echo "<td>" . $row['Userpassword'] . "</td>";
                if ($row['Docente']==1) {
                echo "<td>Docente</td>";
                } else {
                echo "<td>Alumno</td>";
                }
                echo "<td>" . $row['IngenieriaAplicada'] . "</td>";
                echo "<td class='UsrBtn'> <div> <form action='UsersQuery.php' method='POST'> <button class='submit' value='" . $row['UserCode'] . "' name='UserEliminar'>Borrar</button> </form> 
            <form action='UsersUpdate.php' method='POST'> <button class='submit' value='" . $row['UserCode'] . "' name='UserUpdate'>Modificar</button> </form> </div></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </center>
    <br>
    <center><a href="DocenteAlta.php"><button class="UsrBtnAlt">Registrar un nuevo docente</button></a></center><br>
    <br>
    <center><a href="Campus.php"><button class="UsrBtnAlt">Volver al campus</button></a><a href="CloseSession.php"><button class="UsrBtnAlt">Cerrar sesion</button></a></center>
</body>
</html>