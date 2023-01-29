<?php
    if(isset($_COOKIE['datosUsuarios'])) {
        return json_decode($_COOKIE['datosUsuarios'], true);
    }else{
        header("Location: ../index.php?login_error=wrong");
    }
?>