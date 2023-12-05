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

        .LibInput {
            background-color: #868686;
            color: #ffffff;
            border: 1px solid black; border-radius: 5px;
            padding: 3px; padding-left: 5px;
            font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 13px;
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
<br><center><strong><p class='PageTitle'>Ingresando nuevo libro</p></strong></center>    
<!-- ------------------------------------------------------------------------------------------------- -->
<center>
        <table class="LibTable">
            <tr>
                <th>Titulo</th>
                <th>Cantidad de hojas</th>
                <th>Editorial</th>
                <th>Codigo de ejemplar</th>
                <th>Numero de volumen</th>
            </tr>
            <form action="LibrerosDocentesQuery.php" method="POST"><?php
            echo "<tr>";
            echo "<td><input class='LibInput' type='text' id='Title' name='Title' required></td>";
            echo "<td><input class='LibInput' type='number' id='Pages' name='Pages' required></td>";
            echo "<td><input class='LibInput' type='text' id='Editorial' name='Editorial' required></td>";
            echo "<td><input class='LibInput' type='number' id='BookNumber' name='BookNumber' required></td>";
            echo "<td><input class='LibInput' type='number' id='TomeNumber' name='TomeNumber' required></td>";
            echo "<td> <button class='submit' name='send'>Send</button></td>";
            echo "</tr>";
        ?></form>
        </table>
    </center>
    <br>
        <center><a href="LibrerosDocentes.php"><button class="CamBtn">Modificar base de datos</button></a></center><br>
        <center><a href="Library.php"><button class="CamBtn">Volver a la Biblioteca</button></a></center>
</body>
</html>