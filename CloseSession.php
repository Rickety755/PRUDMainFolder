<!--TODO                                    Obtiene el valor de docente                                      -->
<?php
session_start();

//TODO       Vacia el array de SESSION          
$_SESSION = array();

//TODO            Eliminamos las cookies de el inicio de sesion                
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

//TODO          Cierre de sesion                         
session_destroy();


//TODO              Nos dirige de nuevo a la pagina del index                 
header("Location: index.html");
?>