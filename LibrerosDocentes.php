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

        .LibBtnAlt {
            background-color: #868686;
            font-size: 15px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border: none; border-radius: 10px;
            padding: 5px;
            margin-bottom: 5px; margin-right: 5px; margin-left: 5px;
        }

        .LibBtnAlt:hover {
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
<center><div class="LibDiv1"><p class="LibTitle">PRUD</p> <br> <p class="LibSubTitle">Project Rickety's University D</p></div></center>
<br><center><strong><p class='PageTitle'>Libros registrados</p></strong></center>        
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

    $query = "SELECT * FROM books";

    $result = $conexion->query($query);

    if (!$result) {
        die("Query failed: " . $conexion->error);
    }

    $conexion->close();
    ?>
    <!-- ------------------------------------------------------------------------------ -->
    <?php include 'SearchBooks.php'; ?>
    <center><div id="Buscador">
        <form action="LibrerosDocentes.php" method="POST">
            <label class="SearchTxt" for="search">Buscar libro:</label>
            <input class="SearchBar" type="text" id="search" name="search" placeholder="Ingrese el titulo del libro">
            <input class="SearchBtn" type="submit" value="Buscar"></div></center>
        </form>  
    <!-- ------------------------------------------------------------------------------- -->
<center>
        <table class="LibTable">
            <tr>
                <th>Codigo de libro</th>
                <th>Titulo</th>
                <th>Cantidad de hojas</th>
                <th>Editorial</th>
                <th>Codigo de ejemplar</th>
                <th>Numero de volumen</th>
            </tr>
            <?php
            $rowCount = 0;
            if ($seeing = mysqli_query($conexion, $sql_select)) {
            while ($row = mysqli_fetch_array($seeing)) {
                $rowCount++;
                $BCKX = $rowCount + 200;
                echo "<tr>";
                echo "<td>" . $row['BookCode'] . "</td>";
                echo "<td>" . $row['Title'] . "</td>";
                echo "<td>" . $row['Pages'] . "</td>";
                echo "<td>" . $row['Editorial'] . "</td>";
                echo "<td>" . $row['BookNumber'] . "</td>";
                echo "<td>" . $row['TomeNumber'] . "</td>";
                echo "<td class='LibBtn'> <div> <form action='LibrerosDocentesQuery.php' method='POST'> <button class='submit' value='" . $row['BookCode'] . "' name='BookEliminar'>Borrar</button> </form> 
            <form action='LibrerosDocentesUpdate.php' method='POST'> <button class='submit' value='" . $row['BookCode'] . "' name='BookUpdate'>Modificar</button> </form> </div></td>";
                echo "</tr>";
            }
        } else {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['BookCode'] . "</td>";
                echo "<td>" . $row['Title'] . "</td>";
                echo "<td>" . $row['Pages'] . "</td>";
                echo "<td>" . $row['Editorial'] . "</td>";
                echo "<td>" . $row['BookNumber'] . "</td>";
                echo "<td>" . $row['TomeNumber'] . "</td>";
                echo "<td class='LibBtn'> <div> <form action='LibrerosDocentesQuery.php' method='POST'> <button class='submit' value='" . $row['BookCode'] . "' name='BookEliminar'>Borrar</button> </form> 
            <form action='LibrerosDocentesUpdate.php' method='POST'> <button class='submit' value='" . $row['BookCode'] . "' name='BookUpdate'>Modificar</button> </form> </div></td>";
                echo "</tr>";
            }
        }
            ?>
        </table>
    </center>
    <br>
    <center><a href="LibrerosDocentesAltas.php"><button class="LibBtnAlt">Ingresar un nuevo libro</button></a></center><br>
    <br>
        
        <center><a href="Library.php"><button class="LibBtnAlt">Volver a la Biblioteca</button></a></center>
</body>
</html>