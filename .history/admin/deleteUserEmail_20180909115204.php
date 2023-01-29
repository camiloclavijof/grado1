<?php
require_once '../inc/db.php';
$datosUsuario = require_once('../login/checkLogin.php');
function alert($text){
    echo"<script type='text/javascript'>alert('$text');</script>";
}
function eliminarUsuario($args, $conn){
    $id_users = mysqli_real_escape_string($conn,$args['id_users']);
    $sql = 'DELETE FROM users WHERE id_users = '.$id_users.';';
    if($result = mysqli_query($conn, $sql)){
        if($result){
            alert('Usuario '.$args['UserName'].' fue eliminado.');
        }else{
            alert('No se pudo eliminar el usuario '.$args['UserName']);
        }
    }
}
if(isset($_POST['UserEmail'])){
    $post_UserEmail = mysqli_real_escape_string($conn,$_POST['UserEmail']);
    $sql = "SELECT * FROM users WHERE UserEmail = '".$post_UserEmail."'";
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) < 1){
            alert('El correo no corresponde a ningun usuario.');
        }
        while($rows = mysqli_fetch_assoc($result)){
            eliminarUsuario($rows, $conn);
        }
    }
}
?>