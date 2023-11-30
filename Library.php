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
            margin-top: 120px; margin-left: 35%; margin-right: 35%;
            border: none;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <center><div class="LibDiv1"><p class="LibTitle">PRUD</p> <br> <p class="LibSubTitle">Project Rickety's University D</p></div></center>
    
    <div class="LibDiv2"><br>
    <center><p class="CamGeneralTxt">A donde quieres ir?</p><br></center>
    <center><a href="Libreros.php"><button class="LibBtn">Explorar los libreros</button></a></center>
    <center><a href="Borrows.php"><button class="CamBtn">Libros en prestamo</button></a></center><!-- database of the borrowed books --> 
    <center><a href="Library.php"><button class="CamBtn">Acercarte a la recepcion</button></a></center><!-- then you can ask by a highht of an book to borrow or delete an deliver an borrowed book by an input and it will delete only that one -->
    </div>
</body>
</html>