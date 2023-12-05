<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-image: url(IngenieriasBCK.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        table {
            box-shadow: black 0 0 100px;
            width: 80%;
            background-color: rgba(0, 0, 0, 0.479);
            margin-top: 30px; margin-left: 10%; margin-right: 10%;
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: bolder;
            font-size: 18px;
            padding-left: 10px; padding: 5px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .IngDiv1 {
            box-shadow: black 0 0 100px;
            width: 50%;
            height: 120px;
            background-color: rgba(0, 0, 0, 0.479);
            margin-top: -30px; margin-left: 15%; margin-right: 15%;
            border: none;
            border-radius: 10px;
        }

        .IngTitle {
            font-size: 70px;
            color: gold;
        }

        .IngSubTitle {
            font-size: 25px;
            color: gold;
            margin-top: -95px;
        }

        .IngPageTitle {
            color: white;
            font-size: 25px;
            font-weight: bold;
            -webkit-text-stroke: black 1px;
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
    </style>
</head>
<body>
<center><div class="IngDiv1"><p class="IngTitle">PRUD</p> <br> <p class="IngSubTitle">Project Rickety's University D</p></div></center>
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
<!-- ------------------------------------------------------------------------------------------------- -->
<?php
    while ($row = $result->fetch_assoc()) {
    echo "<table>";
    echo "<tr>";
    echo "<td>". $row['IngName'] ."</td>";
    echo "<td>". $row['Programa'] ."</td>";
    echo "</tr>";
    echo "</table>";
    echo "<br>";
    }?>
    <center><a href="Campus.php"><button class="IngBtnAlt">Volver a el campus</button></a><a href="CloseSession.php"><button class="IngBtnAlt">Cerrar sesion</button></a></center>
</body>
</html>