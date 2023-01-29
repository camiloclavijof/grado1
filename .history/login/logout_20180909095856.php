<?php
    // unset($_COOKIE['datosUsuarios']);
    setcookie('datosUsuarios', '', time() - 10);
    // var_export($_COOKIE['datosUsuarios']);
    if(isset($_COOKIE['datosUsuarios'])) {
    }
    // header("Location: ../index.php");
?>
