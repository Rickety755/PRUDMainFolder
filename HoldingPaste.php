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
            background-image: url(LoginBCK.jpg);
            background-size: cover; background-repeat: no-repeat;
            padding: 0;
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
            margin-top: 85px;
            font-size: 25px;
            font-family: "Gill Sans", sans-serif;
            color: #16228a;
            -webkit-text-stroke: #ffffff 1px;
            background-color: rgba(0, 0, 0, 0.479);
            width: 40%;
            padding-top: 3px; 
            padding-bottom: 10px;
        
        }

        .IdxDiv1 {
            box-shadow: black 0 0 100px;
            width: 50%;
            height: 80px;
            background-color: rgba(0, 0, 0, 0.479);
            color: white;
            margin-top: 70px; margin-left: 15%; margin-right: 15%;
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
        }

        input:hover {
        transition: 1s;
        background-color: #c4c4c4;
        }

        .JustTrial {
            background-color: rgb(80, 80, 80);
        }
        
    </style>

</head>
<body><br>
    <center><div class="IdxDiv1"><p class="IdxTitle">PRUD</p></div></center>

    <center><form action="Verify.php" method="POST">
    <p>Bienvenido de nuevo!</p>
    <p>Cual es el nombre de tu usuario?</p>
    <input type="text" placeholder="Usuario" name="username" id="username">

    <br>

    <p>Ingresa tu contraseña aqui!</p>
    <input type="password" placeholder="Contraseña" name="pass" id="pass" class="contrasena">
    
    
    
    <input type="submit" placeholder="Confirmar" value="Confirmar">
    


    </form></center>
    <i class="bi bi-eye-slash" id="togglePassword"></i> <hr>
    
<script>
    const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        // prevent form submit
        const form = document.querySelector("form");
        form.addEventListener('submit', function (e) {
            e.preventDefault();
        });
</script>

</body>
</html>