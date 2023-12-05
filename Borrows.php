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
            background-position: center;
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

        .LibDate {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 15px;
            font-weight: bold;
            position: fixed; top: 0; right: 25px;
        }
    </style>
</head>
<body>
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
    <!-- ------------------------------------------------------------------------------------------------ -->
    <?php include 'SearchBorrows.php'; ?>
    <center><div id="Buscador">
        <form action="Borrows.php" method="POST">
            <label class="SearchTxt" for="search">Buscar prestamo:</label>
            <input class="SearchBar" type="text" id="search" name="search" placeholder="Ingrese el nombre del usuario">
            <input class="SearchBtn" type="submit" value="Buscar"></div></center>
        </form>  
    <!-- ------------------------------------------------------------------------------------------------- -->
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
            if ($seeing = mysqli_query($conexion, $sql_select)) {
            while ($row = mysqli_fetch_array($seeing)) {
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
        }    else {
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