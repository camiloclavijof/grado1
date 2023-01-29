<?php
require_once '../inc/db.php';
$datosUsuario = require_once('../login/checkLogin.php');
var_export($_POST['id']);
exit;
$id = mysqli_real_escape_string($conn,$_POST['id']);
$sql = "DELETE FROM datospersonales WHERE id_datospersonales = '".$id."'";
if($result = mysqli_query($conn, $sql)){
    // if(mysqli_num_rows($result) < 1){
    //     return false;
    // }
}
$id = mysqli_real_escape_string($conn,$_POST['id']);
$sql = "DELETE FROM nucleofamiliar WHERE id_nucleofamiliar = '".$id."'";
if($result = mysqli_query($conn, $sql)){
    $id = mysqli_real_escape_string($conn,$_POST['id']);
    $sql = "DELETE FROM proyeccion WHERE id_proyeccion = '".$id."'";
    if($result = mysqli_query($conn, $sql)){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $sql = "DELETE FROM datoscultivos WHERE id_datoscultivos = '".$id."'";
        if($result = mysqli_query($conn, $sql)){
            $id = mysqli_real_escape_string($conn,$_POST['id']);
            $sql = "DELETE FROM predios WHERE id_predios = '".$id."'";
            if($result = mysqli_query($conn, $sql)){
                return true;
            }
        }
    }
}
?>