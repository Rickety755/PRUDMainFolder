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

        .PageTitle {
            color: aqua;
            -webkit-text-stroke: black 2px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 25px;
            margin-top: 0px;
        }

        input {
            background-color: #868686;
            color: #ffffff;
            border: none; border-radius: 5px;
            padding: 3px; padding-left: 5px;
            font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 13px;
        }
        
        .LibInput {
            width: 100%;
            padding: 3px;
            background-color: #868686;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border: none; border-radius: 5px;
            font-size: 15px;
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

        .LibInputAlt {
            width: 80%;
            padding: 3px;
            background-color: #868686;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border: none; border-radius: 5px;
            font-size: 15px;
            margin-left: 10%; margin-right: 10%;
        }
    </style>
</head>
<body>
<!--TODO                                       Titlulos de la pagina                                      -->
<center><div class="LibDiv1"><p class="LibTitle">PRUD</p> <br> <p class="LibSubTitle">Project Rickety's University D</p></div></center>
<br><center><strong><p class='PageTitle'></p></strong></center>
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
    $CodeUpdating = $_POST['BorrowUpdate'] ? $_POST['BorrowUpdate'] : 0;

    /*TODO        Secuencias SQL para traer los registros de las tablas users, books y borrows        */
    $query = "SELECT * FROM borrows WHERE BorrowCode = $CodeUpdating";
    $query2 = "SELECT * FROM users";
    $query3 = "SELECT * FROM books";

    $result = $conexion->query($query);
    $result2 = $conexion->query($query2);
    $result3 = $conexion->query($query3);
    $result4 = $conexion->query($query);

    if (!$result) {
        die("Query failed: " . $conexion->error);
    }
    if (!$result2) {
        die("Query failed: " . $conexion->error);
    }
    if (!$result3) {
        die("Query failed: " . $conexion->error);
    }

    /*TODO        Titulo extra de la pagina        */
    while ($CodeUpdating = $result4->fetch_assoc()) {
        echo "<br><center><strong><p class='PageTitle'>Actualizando pestamo no.". $CodeUpdating['BorrowCode'] ."</p></strong></center>";
        }

    $conexion->close();
    ?>
<!--TODO                                  Primera seccion de la tabla                                -->
<center>
        <table class="LibTable">
            <tr>
                <th>Codigo de prestamo</th>
                <th>Codigo de usuario</th>
                <th>Codigo de libro</th>
                <th>Fecha de salida</th>
                <th>Dias para entregar</th>
                <th>Entregado</th>
            </tr>
<!--TODO                                Segunda seccion de la tabla                                  -->
            <form action="BorrowsQuery.php" method="POST">
            <?php
            while ($CodeUpdating = $result->fetch_assoc()) {
                echo "<tr>";
                    echo "<td style='text-align: center;'>" . $CodeUpdating['BorrowCode'] . "</td>";

                    /*TODO             Trae de la base de datos todos los usuarios          */
                    echo "<td><select class='LibInput' name='UserBorrowed' id='UserBorrowed'>"; 
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

                    echo "<td><input type='date' id='BorrowDate' value='" . $CodeUpdating['BorrowDate'] . "' name='BorrowDate' required></td>";
                    echo "<td><input type='number' id='BorrowTimeDays' value='" . $CodeUpdating['BorrowTimeDays'] . "' name='BorrowTimeDays' required></td>";

                    echo "<td><select class='LibInputAlt' name='Deliver' id='Deliver'>";
                    echo "<option value='Si'>Si</option>";
                    echo "<option value='No'>No</option>";
                    echo "</select></td>";

                    echo "<td> <button class='submit' value='" . $CodeUpdating['BorrowCode'] . "' name='BorrowUpdated'>Update</button></td>";
                echo "</tr>";
            }
            ?>
            </form>
        </table>
    </center>
    
    <br>
    <!--TODO                                 Botones para regresar                            -->
        <center><a href="Borrows.php"><button class="CamBtn">Modificar base de datos</button></a></center><br>
        <center><a href="Library.php"><button class="CamBtn">Volver a la Biblioteca</button></a></center>
</body>
</html>