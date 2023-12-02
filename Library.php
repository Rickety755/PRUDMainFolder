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
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            background-image: url(LibraryBCKAlt2.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }

        .LibDiv1 {
            box-shadow: black 0 0 100px;
            width: 50%;
            height: 120px;
            background-color: rgba(0, 0, 0, 0.479);
            margin-top: 70px; margin-left: 15%; margin-right: 15%;
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

        .LibDiv2 {
            box-shadow: black 0 0 100px;
            width: 30%;
            height: 200px;
            background-color: rgba(0, 0, 0, 0.479);
            margin-top: 80px; margin-left: 35%; margin-right: 35%;
            border: none;
            border-radius: 10px;
        }

        .LibGeneralTxt {
            color: #ffffff;
            -webkit-text-stroke: white 1px;
            font-size: 25px;
        }

        .LibBtn {
            background-color: #868686;
            font-size: 15px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border: none; border-radius: 10px;
            padding: 5px;
            margin-bottom: 5px;
        }

        .LibBtn:hover {
            transition: 0.5s;
            background-color: #c4c4c4;
            border: #ffffff 1px solid;
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
    </style>
</head>
<body>
    <center><div class="LibDiv1"><p class="LibTitle">PRUD</p> <br> <p class="LibSubTitle">Project Rickety's University D</p></div></center>
    
    <div class="LibDiv2"><br>
    <center><p class="LibGeneralTxt">Bienvenido! Que necesitas?</p><br></center>
    <center><a href="Libreros.php"><button class="LibBtn">Explorar los libreros</button></a></center>
    <?php if ($_SESSION['Docente']==1) {
    echo "<center><a href='Borrows.php'><button class='LibBtn'>Libros en prestamo</button></a></center>"; 
    }?>
    <center><a href="BorrowsAltas.php"><button class="LibBtn">Acercarte a la recepcion</button></a></center><!-- then you can ask by a highht of an book to borrow or delete an deliver an borrowed book by an input and it will delete only that one -->
    <br><br>
    <center><a href="Campus.php"><button class="LibBtnAlt">Volver a el campus</button></a><a href="CloseSession.php"><button class="LibBtnAlt">Cerrar sesion</button></a></center>
</div>
</body>
</html>