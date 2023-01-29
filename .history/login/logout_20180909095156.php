<?php
    if(isset($_COOKIE['datosUsuarios'])) {
        unset($_COOKIE['datosUsuarios']);
        // setcookie('datosUsuarios', null, -1, '/');
    }
    var_export($_COOKIE['datosUsuarios']);
    header("Location: ../index.php");
?>
