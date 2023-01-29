<?php
require_once '../inc/db.php';
$datosUsuario = require_once('../login/checkLogin.php');
return true;
var_export($_POST);
exit;
$id = mysqli_real_escape_string($conn,$_POST['id']);
$sql = "DELETE FROM datoscultivos WHERE id_datoscultivos = '".$id."'";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) < 1){
        return false;
    }
}
$sql = "DELETE FROM datospersonales WHERE id_datospersonales = '".$id."'";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) < 1){
        return false;
    }
}
?>