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

    $CodeUpdating = $_POST['BorrowUpdate'] ? $_POST['BorrowUpdate'] : 0;

    $query = "SELECT * FROM borrows WHERE BorrowCode = $CodeUpdating";
    $query2 = "SELECT * FROM users";
    $query3 = "SELECT * FROM books";

    $result = $conexion->query($query);
    $result2 = $conexion->query($query2);
    $result3 = $conexion->query($query3);

    if (!$result) {
        die("Query failed: " . $conexion->error);
    }
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
                <th>Codigo de prestamo</th>
                <th>Codigo de usuario</th>
                <th>Codigo de libro</th>
                <th>Fecha de salida</th>
                <th>Dias para entregar</th>
                <th>Entregado</th>
            </tr>
            <form action="BorrowsQuery.php" method="POST">
            <?php
            while ($CodeUpdating = $result->fetch_assoc()) {
                echo "<tr>";
                    echo "<td>" . $CodeUpdating['BorrowCode'] . "</td>";
                    echo "<td><select name='User' id='User'>"; 
                    while ($row = $result2->fetch_assoc()) { 
                        echo "<option value='". $row['User'] ."'>". $row['User'] ."</option>"; 
                    } 
                    echo "</select></td>";
                    echo "<td><select name='BookCode' id='BookCode'>"; 
                    while ($row = $result3->fetch_assoc()) { 
                        echo "<option value='". $row['BookCode'] ."'>". $row['BookCode'] ."</option>"; 
                    } 
                    echo "</select></td>";                    echo "<td><input type='date' id='BorrowDate' value='" . $CodeUpdating['BorrowDate'] . "' name='BorrowDate' required></td>";
                    echo "<td><input type='number' id='DeliverTimeDays' value='" . $CodeUpdating['DeliverTimeDays'] . "' name='DeliverTimeDays' required></td>";
                    echo "<td><input type='number' id='Delivered' value='" . $CodeUpdating['Delivered'] . "' name='Delivered' required></td>";
                    echo "<td> <button class='submit' value='" . $CodeUpdating['BorrowCode'] . "' name='BorrowUpdated'>Update</button></td>";
                echo "</tr>";
            }
            ?>
            </form>
        </table>
    </center>
    
        
    
    <br>
        <center><a href="LibrerosDocentes.php"><button class="CamBtn">Modificar base de datos</button></a></center><br>
        <center><a href="Library.php"><button class="CamBtn">Volver a la Biblioteca</button></a></center>
</body>
</html>