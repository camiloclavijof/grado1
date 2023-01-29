<?php
    // unset($_COOKIE['datosUsuarios']);
    setcookie('datosUsuarios', ' ', time() - 999999);
    var_export($_COOKIE['datosUsuarios']);
    if(isset($_COOKIE['datosUsuarios'])) {
    }
    // header("Location: ../index.php");
?>
