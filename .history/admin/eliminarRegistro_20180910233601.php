<?php
require_once '../inc/db.php';
$datosUsuario = require_once('../login/checkLogin.php');
$id = mysqli_real_escape_string($conn,$_POST['id']);

$sql = "DELETE FROM datospersonales WHERE id_datospersonales = '".$id."'";
if($result = mysqli_query($conn, $sql)){
    // if(mysqli_num_rows($result) < 1){
    //     return false;
    // }
    return true;
}

$sql = "DELETE FROM nucleofamiliar WHERE id_nucleofamiliar = '".$id."'";
if($result = mysqli_query($conn, $sql)){
    $sql = "DELETE FROM proyeccion WHERE id_proyeccion = '".$id."'";
    if($result = mysqli_query($conn, $sql)){
        $sql = "DELETE FROM datoscultivos WHERE id_datoscultivos = '".$id."'";
        if($result = mysqli_query($conn, $sql)){
            return true;
        }
    }
}
?>