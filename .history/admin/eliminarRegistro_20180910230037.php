<?php
require_once '../inc/db.php';
$datosUsuario = require_once('../login/checkLogin.php');

$id = mysqli_real_escape_string($conn,$_POST['id']);
$sql = "DELETE FROM datoscultivos WHERE id_datoscultivos = '".$id."'";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) < 1){
        alert('El correo no corresponde a ningun usuario.');
    }
}
$sql = "DELETE FROM datospersonales WHERE id_datoscultivos = '".$id."'";

?>