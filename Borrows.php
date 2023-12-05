<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .LibDiv1 {
            box-shadow: black 0 0 100px;
            width: 50%;
            height: 120px;
            background-color: rgba(0, 0, 0, 0.479);
            margin-top: -30px; margin-left: 15%; margin-right: 15%;
            border: none;
            border-radius: 10px;
        }

        td {
            padding-left: 10px; padding-left: 10px;
            text-align: center;
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

        body {
            background-image: url(LibrerosBCK2.jpg);
            background-size: cover;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            color: white;
        }

        .LibTable {
            box-shadow: black 0 0 100px;
            width: 80%;
            background-color: rgba(180, 180, 180, 0.479);
            margin-top: 50px; margin-left: 10%; margin-right: 10%;
            border: none;
            border-radius: 10px;
        }

        button {
            background-color: #868686;
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
<br><center><strong><p class='PageTitle'>Prestamos registrados</p></strong></center>    
<!-- ------------------------------------------------------------------------------ -->
    <?php
    $DATABASE_HOST = "localhost";
    $DATABASE_USER = "root";
    $DATABASE_PASS = "";
    $DATABASE_NAME = "prud";

    $conexion = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

    if ($conexion->connect_error) {
        die("Connection failed: " . $conexion->connect_error);
    }

    $query = "SELECT * FROM borrows";

    $result = $conexion->query($query);

    if (!$result) {
        die("Query failed: " . $conexion->error);
    }

    $conexion->close();
    ?>
    <!--todo                                                                                                                                                             -->
    <center>
        <table class="LibTable">
            <tr>
                <th>Codigo de prestamo</th>
                <th>Fecha de salida</th>
                <th>Dias para entregar</th>
                <th>Codigo de usuario</th>
                <th>Codigo de libro</th>
                <th>Entregado</th>
            </tr>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['BorrowCode'] . "</td>";
                echo "<td>" . $row['BorrowDate'] . "</td>";
                echo "<td>" . $row['BorrowTimeDays'] . "</td>";
                echo "<td>" . $row['UserBorrowed'] . "</td>";
                echo "<td>" . $row['BookBorrowed'] . "</td>";
                if ($row['Delivered']<1) {
                    echo "<td>No</td>";
                } else {
                    echo "<td>Si</td>";
                } 
                /*echo "<td>" . $row['Delivered'] . "</td>";*/
                echo "<td class='LibBtn'> <div> <form action='BorrowsQuery.php' method='POST'> <button class='submit' value='" . $row['BorrowCode'] . "' name='BorrowEliminar'>Borrar</button> </form> 
                <form action='BorrowsUpdate.php' method='POST'> <button class='submit' value='" . $row['BorrowCode'] . "' name='BorrowUpdate'>Modificar</button> </form> </div></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </center>

    <br>
    <center><a href="BorrowsAltas.php"><button class="CamBtn">Ingresar un nuevo prestamo</button></a></center><br>
    <br>
    <center><a href="Library.php"><button class="LibBtnAlt">Volver a la Biblioteca</button></a></center>
</body>
</html>