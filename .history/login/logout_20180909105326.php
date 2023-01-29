<?php
    session_start();
    session_destroy();
    setcookie('datosUsuarios', 'NULL' , time() + 84600);
    header("Location: ../index.php");

?>
