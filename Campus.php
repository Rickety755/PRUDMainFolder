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
            background-image: url(CampusBCK.jpg);
            background-size: cover;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .CamDiv1 {
            box-shadow: black 0 0 100px;
            width: 50%;
            height: 120px;
            background-color: rgba(0, 0, 0, 0.479);
            margin-top: 70px; margin-left: 15%; margin-right: 15%;
            border: none;
            border-radius: 10px;
        }

        .CamDiv2 {
            box-shadow: black 0 0 100px;
            width: 30%;
            height: 250px;
            background-color: rgba(0, 0, 0, 0.479);
            margin-top: 80px; margin-left: 35%; margin-right: 35%;
            border: none;
            border-radius: 10px;
        }

        .CamTitle {
            font-size: 70px;
            color: gold;
        }

        .CamSubTitle {
            font-size: 25px;
            color: gold;
            margin-top: -95px;
        }

        .CamBtn {
            background-color: #868686;
            font-size: 15px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border: none; border-radius: 10px;
            padding: 5px;
            margin-bottom: 5px;
        }

        .CamBtn:hover {
            transition: 0.5s;
            background-color: #c4c4c4;
            border: #ffffff 1px solid;
        }

        .CamGeneralTxt {
            color: #ffffff;
            -webkit-text-stroke: white 1px;
            font-size: 25px;
        }

        .CamBtnAlt {
            background-color: #868686;
            font-size: 15px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border: none; border-radius: 10px;
            padding: 5px;
            margin-bottom: 5px; margin-right: 5px; margin-left: 5px;
        }

        .CamBtnAlt:hover {
            transition: 0.5s;
            background-color: #c4c4c4;
            border: #ffffff 1px solid;
        }
    </style>
</head>
<body>
<!--TODO                                       Titlulos de la pagina                                      -->
<center><div class="CamDiv1"><p class="CamTitle">PRUD</p> <br> <p class="CamSubTitle">Project Rickety's University D</p></div></center>

<!--TODO                                          Cuadro del menu                                        -->
<div class="CamDiv2"><br>
    <center><p class="CamGeneralTxt">A donde quieres ir?</p><br></center>
    
    <!--TODO                               Boton para ir a la biblioteca                           -->
    <center><a href="Library.php"><button class="CamBtn">Ir a la Biblioteca</button></a></center>
    
    <!--TODO                               Boton para ir a las ingenierias                           -->
    <center><a href="Ingenierias.php"><button class="CamBtn">Ir a las ingenierias</button></a></center>
    

    <!--TODO                                 SI el usuario es un docente                            -->
    <?php if ($_SESSION['Docente']==1) {
        //TODO                             Boton para ir a los usuarios                               
    echo "<center><a href='Users.php'><button class='CamBtn'>Ver los usuarios</button></a></center>"; 
    }?>
    
    <!--TODO                                Botones para regresar                            -->
    <br><center><a href="CloseSession.php"><button class="CamBtnAlt">Cerrar sesion</button></a></center>
</div>

</body>
</html>