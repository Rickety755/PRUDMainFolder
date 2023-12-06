<!--TODO                                    Obtiene el valor de docente                                      -->
<?php
session_start();
?>
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
            background-position: center;
            background-repeat: no-repeat;
        }

        .LibTable {
            box-shadow: black 0 0 100px;
            width: 80%;
            background-color: rgba(180, 180, 180, 0.479);
            margin-top: 50px; margin-left: 10%; margin-right: 10%;
            border: none;
            border-radius: 10px;
        }

        td {
            text-align: center;
            padding: 10px;
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
            margin-bottom: 5px;
        }

        button:hover {
            transition: 0.5s;
            background-color: #c4c4c4;
            border: #ffffff 1px solid;
        }

        .PageTitle {
            color: aqua;
            -webkit-text-stroke: black 1px;
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
<center><div class="LibDiv1"><p class="LibTitle">PRUD</p> <br> <p class="LibSubTitle">Project Rickety's University D</p></div></center>
<br><center><strong><p class='PageTitle'>Libros disponibles</p></strong></center>

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

    /*TODO        Secuencia SQL para traer los registros de la tabla books        */
    $query = "SELECT * FROM books";

    $result = $conexion->query($query);

    if (!$result) {
        die("Query failed: " . $conexion->error);
    }

    $conexion->close();
    ?>
<!--TODO         Barra de busqueda, php incluyendo archivo con php necesario para la busqueda             -->
    <?php include 'SearchBooks.php'; ?>
    <center><div id="Buscador">
        <form action="Libreros.php" method="POST">
            <label class="SearchTxt" for="search">Buscar libro:</label>
            <input class="SearchBar" type="text" id="search" name="search" placeholder="Ingrese el titulo del libro">
            <input class="SearchBtn" type="submit" value="Buscar"></div></center>
        </form>
<!--TODO                                  Primera seccion de la tabla                                -->
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
<!--TODO                                Segunda seccion de la tabla                                  -->
            <?php
            /*TODO               If para comprobar si se utiliza la barra de busqueda           */
            if ($seeing = mysqli_query($conexion, $sql_select)) {
            
                /*TODO     Crea una linea para la tabla segun cuantos registros obtuvo la secuencia SQL     */
            while ($row = mysqli_fetch_array($seeing)) {
                echo "<tr>";
                echo "<td>" . $row['BookCode'] . "</td>";
                echo "<td>" . $row['Title'] . "</td>";
                echo "<td>" . $row['Pages'] . "</td>";
                echo "<td>" . $row['Editorial'] . "</td>";
                echo "<td>" . $row['BookNumber'] . "</td>";
                echo "<td>" . $row['TomeNumber'] . "</td>";
                echo "</tr>";
            }
        } else { 

            /*TODO          Muestreo de toda la tabla en caso de no usar la barra de busqueda        */
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['BookCode'] . "</td>";
                echo "<td>" . $row['Title'] . "</td>";
                echo "<td>" . $row['Pages'] . "</td>";
                echo "<td>" . $row['Editorial'] . "</td>";
                echo "<td>" . $row['BookNumber'] . "</td>";
                echo "<td>" . $row['TomeNumber'] . "</td>";
                echo "</tr>";
            }
        }
            ?>
        </table>
    </center>
    <br>
    <!--TODO                                 SI el usuario es un docente                            -->
    <?php if ($_SESSION['Docente']==1) {
        //TODO                     Boton para ir a los libreros para docentes                      
    echo "<center><a href='LibrerosDocentes.php'><button class=\'LibBtn\'>Modificar base de datos</button></a></center><br>";
    }?>
    <!--TODO                                Botones para regresar                            -->
        <center><a href="Library.php"><button class="LibBtn">Volver a la Biblioteca</button></a></center>
        
        
</body>
</html>