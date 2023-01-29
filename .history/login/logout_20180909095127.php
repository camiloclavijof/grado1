<?php
    if(isset($_COOKIE['datosUsuarios'])) {
        unset($_COOKIE['datosUsuarios']);
        // setcookie('datosUsuarios', null, -1, '/');
    }
    header("Location: ../index.php");
?>
