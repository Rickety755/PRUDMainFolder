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

        .UsrInput {
            width: 100%;
            padding: 3px;
            background-color: #868686;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border: none; border-radius: 5px;
            font-size: 15px;
            color: white;
        }

        button {
            background-color: #868686;
            font-size: 15px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border: none; border-radius: 10px;
            padding: 5px;
            margin-bottom: 5px; margin-right: 5px; margin-left: 5px;
            color: white;
        }

        button:hover {
            transition: 0.5s;
            background-color: #c4c4c4;
            border: #ffffff 1px solid;
        }
    </style>
</head>
<body>
<!--TODO                                       Titlulos de la pagina                                      -->
<center><div class="UsrDiv1"><p class="UsrTitle">PRUD</p> <br> <p class="UsrSubTitle">Project Rickety's University D</p></div></center>
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

    /*TODO        Obtenemos el codigo del registro modificandose        */
    $CodeUpdating = $_POST['UserUpdate'] ? $_POST['UserUpdate'] : 0;

    /*TODO        Secuencias SQL para traer los registros de las tablas users y ingenierias      */
    $query = "SELECT * FROM users WHERE UserCode = $CodeUpdating";
    $query2 = "SELECT * FROM ingenierias";

    $result = $conexion->query($query);
    $result2 = $conexion->query($query2);
    $result3 = $conexion->query($query);
    
    if (!$result) {
        die("Query failed: " . $conexion->error);
    }
    if (!$result2) {
        die("Query failed: " . $conexion->error);
    }

    /*TODO        Titulo extra de la pagina        */
    while ($CodeUpdating = $result3->fetch_assoc()) {
    echo "<br><center><strong><p class='UsrPageTitle'>Actualizando usuario no.". $CodeUpdating['UserCode'] ."</p></strong></center>";
    }

    $conexion->close();
    ?>
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
            <form action="UsersQuery.php" method="POST">
            <?php
            while ($CodeUpdating = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $CodeUpdating['UserCode'] . "</td>";

                echo "<td><input class='UsrInput' type='text' id='Username' value='" . $CodeUpdating['Username'] . "' name='Username' required></td>";
                echo "<td><input class='UsrInput' type='text' id='Userpassword' value='" . $CodeUpdating['Userpassword'] . "' name='Userpassword' required></td>";
                
                echo "<td><select class='UsrInput' name='Docente' id='Docente'>"; 
                echo "<option value='Docente'>Docente</option>"; 
                echo "<option value='Alumno'>Alumno</option>"; 
                echo "</select></td>";
                
                    /*TODO              Trae de la base de datos todas las ingenierias     */
                echo "<td><select class='UsrInput' name='IngenieriaAplicada' id='IngenieriaAplicada'>"; 
                while ($row2 = $result2->fetch_assoc()) { 
                    echo "<option value='". $row2['IngName'] ."'>". $row2['IngName'] ."</option>"; 
                } 
                echo "</select></td>";

                echo "<td> <button class='submit' value='" . $CodeUpdating['UserCode'] . "' name='UserUpdated'>Update</button></td>";
                echo "</tr>";
            }
            ?>
            </form>
        </table>
    </center>
    <br>
    <!--TODO                                 Botones para regresar                            -->
    <center><a href="Users.php"><button class="UsrBtnAlt">Volver a la base de datos</button></a><a href="CloseSession.php"><button class="UsrBtnAlt">Cerrar sesion</button></a></center>
</body>
</html>