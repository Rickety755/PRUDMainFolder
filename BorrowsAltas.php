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
            margin-top: 120px; margin-left: 10%; margin-right: 10%;
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
    </style>
</head>
<body>
<center><div class="LibDiv1"><p class="LibTitle">PRUD</p> <br> <p class="LibSubTitle">Project Rickety's University D</p></div></center>
<!-- ------------------------------------------------------------------------------------------------- -->
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
            <form action="BorrowsQuery.php" method="POST"><?php
            echo "<tr>";
            echo "<td><input type='number' id='User' name='User' required></td>";
            echo "<td><input type='number' id='BookCode' name='BookCode' required></td>";
            echo "<td><input type='date' id='BorrowDate' name='BorrowDate' required></td>";
            echo "<td><input type='number' id='DeliverTimeDays' name='DeliverTimeDays' required></td>";
            echo "<td><input type='number' id='Delivered' name='Delivered' required></td>";
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