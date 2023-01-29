<?php
require_once '../inc/db.php';
$datosUsuario = require_once('../login/checkLogin.php');

$id = mysqli_real_escape_string($conn,$_POST['id']);
$sql = "SELECT * FROM users WHERE UserEmail = '".$post_UserEmail."'";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) < 1){
        alert('El correo no corresponde a ningun usuario.');
    }
}

?>