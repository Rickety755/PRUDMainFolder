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
    $query = "SELECT * FROM ingenierias";

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
                <th>Nombre de usuario</th>
                <th>Contraseña</th>
                <th>Clase de ingenieria</th>
            </tr>
            <form action="UsersQuery.php" method="POST"><?php
                echo "<tr>";
                echo "<td><input class='UsrInput' type='text' id='Username' name='Username' required></td>";
                echo "<td><input class='UsrInput' type='text' id='Userpassword' name='Userpassword' required></td>";
                
                echo "<td><select class='UsrInput' name='IngenieriaAplicada' id='IngenieriaAplicada'>"; 
                while ($row = $result->fetch_assoc()) { 
                    echo "<option value='". $row['IngName'] ."'>". $row['IngName'] ."</option>"; 
                } 
                echo "</select></td>";

                echo "<td> <button class='submit' name='send'>Send</button></td>";
                echo "</tr>";
            ?></form>
        </table>
    </center>
    <br>
    <center><a href="Users.php"><button class="UsrBtnAlt">Volver a la base de datos</button></a><a href="CloseSession.php"><button class="UsrBtnAlt">Cerrar sesion</button></a></center>
</body>
</html>