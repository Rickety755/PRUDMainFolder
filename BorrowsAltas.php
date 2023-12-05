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

                    echo "<td> <button class='submit' name='send'>Update</button></td>";
                echo "</tr>";
            ?>
            </form>
        </table>
    </center>
    <br>
        <center><a href="Library.php"><button class="CamBtn">Volver a la Biblioteca</button></a></center>
</body>
</html>