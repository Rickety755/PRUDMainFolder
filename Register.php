<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/style.css" />
    <style>
        body {
            background-image: url(RegisterBCK.jpg);
            background-size: cover; background-repeat: no-repeat;
            padding: 0;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        header {
            position: fixed;
            width: 70%;
            height: 80px;
            background-color: rgba(0, 0, 0, 0.479);
            color: white;
            font-size: larger;
            box-shadow: 0 0 8px 8px rgba(22, 22, 22, 0.116) inset;
            margin-top: 70px; 
            margin-left: 15%; 
            margin-right: 15%;
        }

        form {
            margin-top: 55px;
            font-size: 25px;
            font-family: "Gill Sans", sans-serif;
            color: #16228a;
            -webkit-text-stroke: #ffffff 1px;
            background-color: rgba(0, 0, 0, 0.479);
            padding-top: 3px; 
            padding-bottom: 10px;
            width: 40%;
        }

        p {
            font-size: 22px;
        }

        .IdxDiv1 {
            box-shadow: black 0 0 100px;
            width: 50%;
            height: 80px;
            background-color: rgba(0, 0, 0, 0.479);
            color: white;
            margin-top: -30px; margin-left: 15%; margin-right: 15%;
            border: none;
            border-radius: 10px;
        }

        .IdxTitle {
            font-size: 70px;
            color: gold;
        }
    
        input {
        color: gold;
        background-color: #272727;
        border: none;
        border-radius: 6px;
        padding: 8px;  
        -webkit-text-stroke: #ffffff 0px;     
        }

        .RegBtn {
            color: gold;
        background-color: #868686;
        border: none;
        border-radius: 6px;
        padding: 8px;  
        -webkit-text-stroke: #ffffff 0px;     
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
            border: #ffffff 1px solid;
        }

        .RegInput {
            color: gold;
        }

        .RegInputAlt {
            width: 60%;
            padding: 3px;
            background-color: #272727;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border: none; border-radius: 5px;
            font-size: 15px;
            color: gold;
        }

        select {
            color: gold;
            -webkit-text-stroke: 0px;
        }
        
    </style>

</head>
<body>
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

    /*TODO        Secuencias SQL para traer los registros de la tabla ingenierias        */
    $query = "SELECT * FROM ingenierias";

    $result = $conexion->query($query);

    if (!$result) {
        die("Query failed: " . $conexion->error);
    }

    $conexion->close();
    ?>
<!--TODO                                       Titlulos de la pagina                                      -->
    <center><div class="IdxDiv1"><p class="IdxTitle">PRUD</p></div></center>

<!--TODO                                       Ingreso de el nombre                                -->
    <center><form action="RegisterQuery.php" method="POST">
    <p>Bienvenido a PRUD!</p>
    <p>Cual sera el nombre de tu usuario?</p>
    <input class="RegInput" type="text" placeholder="Usuario" name="Username" id="Username">

    <br>

<!--TODO                                       Ingreso de la contraseña                                -->
    <p>Cual sera tu contraseña?</p>
    <input class="RegInput" type="password" placeholder="Contraseña" name="Userpassword" id="Userpassword" required> 
    
<!--TODO                                       Ingreso de la ingenieria                                -->
<br><p>Y a que ingenieria estas ingresando?</p>
    <?php
    echo "<td><select class='RegInputAlt' name='IngenieriaAplicada' id='IngenieriaAplicada'>";

     /*TODO              Trae de la base de datos todos las ingenierias  */
    while ($row = $result->fetch_assoc()) { 
        echo "<option value='". $row['IngName'] ."'>". $row['IngName'] ."</option>"; 
    } 
    echo "</select></td>";
    ?>
    <br>
    <button class='submit' name='Confirmar'>Confirmar</button>
    


    </form><br>
    <!--TODO                                 Boton para volver                            -->
    <center><a href="Index.html"><button class="IdxBtn">Ya tenias un usuario? Vuelve al inicio por aqui!</button></a></center>
</center>
</body>
</html>