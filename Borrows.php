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
        }

        .LibTable {
            box-shadow: black 0 0 100px;
            width: 80%;
            background-color: rgba(180, 180, 180, 0.479);
            margin-top: 120px; margin-left: 10%; margin-right: 10%;
            border: none;
            border-radius: 10px;
        }
    </style>
</head>
<body>
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
    <!-- ------------------------------------------------------------------------------- -->
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
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['BorrowCode'] . "</td>";
                echo "<td>" . $row['User'] . "</td>";
                echo "<td>" . $row['BookCode'] . "</td>";
                echo "<td>" . $row['BorrowDate'] . "</td>";
                echo "<td>" . $row['DeliverTimeDays'] . "</td>";
                echo "<td>" . $row['Delivered'] . "</td>";
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
    <center><a href="BorrowsAltas.php"><button class="CamBtn">Ingresar un nuevo libro</button></a></center><br>
    <br>
</body>
</html>