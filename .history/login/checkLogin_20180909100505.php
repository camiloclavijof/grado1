<?php
    if(isset($_COOKIE['datosUsuarios'])) {
        return $_COOKIE['datosUsuarios'];
    }else{
        header("Location: ../index.php?login_error=wrong");
    }
?>