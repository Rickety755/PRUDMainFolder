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
            background-position: center;
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

        .SearchBar {
            background-color: #c4c4c4;
            border: white 1px solid;
            border-radius: 10px;
            color: darkgreen;
            font-size: 19px;
            padding: 4px;
            width: 280px;
        }

        .SearchBar::placeholder {
            color: #ffffff;
        }

        .SearchTxt {
            color: mediumseagreen;
            -webkit-text-stroke: black 1px;
            font-weight: bold;
            font-size: 23px;
        }

        .SearchBtn {
            background-color: #868686;
            font-size: 15px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border: none; border-radius: 10px;
            padding: 5px;
            margin-bottom: 5px;
            color: #ffffff;
        }

        .SearchBtn:hover {
            transition: 0.5s;
            background-color: #c4c4c4;
            border: #ffffff 1px solid;
            color: black;
        }
    </style>
</head>
<body>
<!--TODO                                       Titlulos de la pagina                                      -->
<center><div class="UsrDiv1"><p class="UsrTitle">PRUD</p> <br> <p class="UsrSubTitle">Project Rickety's University D</p></div></center>
    <br><center><p class="UsrPageTitle">Usuarios registrados</p></center>
<!--TODO                                    Conexion a base de datos                                      -->
    <?php
    $DATABASE_HOST = "localhost";
    $DATABASE_USER = "root";
    $DATABASE_PASS = "";
    $DATABASE_NAME = "prud";

    $conexion = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

    if ($conexion->connect_error) {
        die("Connection failed: " . $conexion->connect_error);
    }

    /*TODO        Secuencia SQL para traer los registros de la tabla de users        */
    $query = "SELECT * FROM users";

    $result = $conexion->query($query);

    if (!$result) {
        die("Query failed: " . $conexion->error);
    }

    $conexion->close();
    ?>
<!--TODO         Barra de busqueda, php incluyendo archivo con php necesario para la busqueda             -->
    <?php include 'SearchUsers.php'; ?>
    <center><div id="Buscador">
        <form action="Users.php" method="POST">
            <label class="SearchTxt" for="search">Buscar usuario:</label>
            <input class="SearchBar" type="text" id="search" name="search" placeholder="Ingrese el nombre del usuario">
            <input class="SearchBtn" type="submit" value="Buscar"></div></center>
        </form>
<!--TODO                                  Primera seccion de la tabla                                -->
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
<!--TODO                                Segunda seccion de la tabla                                  -->
            <?php
            if ($seeing = mysqli_query($conexion, $sql_select)) {
                while ($row = mysqli_fetch_array($seeing)) {
                echo "<tr>";
                echo "<td>" . $row['UserCode'] . "</td>";
                echo "<td>" . $row['Username'] . "</td>";
                echo "<td>" . $row['Userpassword'] . "</td>";

                 /*TODO              Convierte el boleano de Docente a un texto     */
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
        }    else {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['UserCode'] . "</td>";
                echo "<td>" . $row['Username'] . "</td>";
                echo "<td>" . $row['Userpassword'] . "</td>";

                 /*TODO              Convierte el boleano de Docente a un texto     */
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
        }
            ?>
        </table>
    </center>
    <br>
    <!--TODO                               Boton para ir al registro                           -->
    <center><a href="DocenteAlta.php"><button class="UsrBtnAlt">Registrar un nuevo docente</button></a></center><br>
    <br>
    <!--TODO                                Botones para regresar                            -->
    <center><a href="Campus.php"><button class="UsrBtnAlt">Volver al campus</button></a><a href="CloseSession.php"><button class="UsrBtnAlt">Cerrar sesion</button></a></center>
</body>
</html>