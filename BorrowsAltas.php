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

        .LibDate {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 15px;
            font-weight: bold;
            position: fixed; top: 0; right: 25px;
        }
    </style>
</head>
<body>
<!--TODO                Aqui utilizamos una funcion con php para obtener la fecha de hoy                -->
<?php
// Script para obtener y mostrar la fecha actual en el documento
function obtenerFechaActual() {
    $fecha = new DateTime();
    $dia = $fecha->format('d');
    $mes = $fecha->format('m');
    $año = $fecha->format('Y');
    return "$dia/$mes/$año";
}

echo "<p class='LibDate'>". obtenerFechaActual() ."</p>";
?>
<!--TODO                                       Titlulos de la pagina                                      -->
<center><div class="LibDiv1"><p class="LibTitle">PRUD</p> <br> <p class="LibSubTitle">Project Rickety's University D</p></div></center>
<br><center><strong><p class='PageTitle'>Registrando un prestamo</p></strong></center>    
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
    /*TODO        Secuencias SQL para traer los registros de las tablas users y books        */
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
<!--TODO                                  Primera seccion de la tabla                                -->
<center>
        <table class="LibTable">
            <tr>
                <th>Codigo de usuario</th>
                <th>Codigo de libro</th>
                <th>Fecha de salida</th>
                <th>Dias para entregar</th>
            </tr>
<!--TODO                                Segunda seccion de la tabla                                  -->
            <form action="BorrowsQuery.php" method="POST"><?php
                echo "<tr>";
                    echo "<td><select class='LibInput' name='UserBorrowed' id='UserBorrowed'>"; 

                    /*TODO             Trae de la base de datos todos los usuarios          */
                    while ($row = $result2->fetch_assoc()) { 
                        echo "<option value='". $row['Username'] ."'>". $row['Username'] ."</option>"; 
                    } 
                    echo "</select></td>";
                    /*TODO              Trae de la base de datos todos los libros  */
                    echo "<td><select class='LibInput' name='BookBorrowed' id='BookBorrowed'>"; 
                    while ($row = $result3->fetch_assoc()) { 
                        echo "<option value='". $row['BookCode'] ."'>". $row['BookCode'] ."</option>"; 
                    } 
                    echo "</select></td>";    

                    echo "<td><input class='LibInput' type='date' id='BorrowDate' name='BorrowDate' required></td>";
                    echo "<td><input class='LibInputAlt' type='number' id='BorrowTimeDays' name='BorrowTimeDays' required></td>";
                    

                    echo "<td> <button class='submit' name='send'>Send</button></td>";
                echo "</tr>";
            ?>
            </form>
        </table>
    </center>
    <br>
    <!--TODO                                Botones para regresar                            -->
        <center><a href="Library.php"><button class="CamBtn">Volver a la Biblioteca</button></a></center>
</body>
</html>