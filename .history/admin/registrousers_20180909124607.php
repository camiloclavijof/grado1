<?php
session_start();
require_once '../inc/db.php';
function alert($text,$func){
    echo"<script type='text/javascript'>alert('$text');$func();</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <!-- css -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <!-- js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</head>
<body>
   <section id="Registro">
       <div class="container">
           <div class="row">
               <div class="form">
                   <div class="col-md-6 col-md-offset-3">
                   <h3>Registro y Actualizacion de Usuario</h3>
                   </br></br>
                   <form action="" method="post">
                        <div class="form-group">
                            <label for="UserName">Nombre:</label>
                            <input type="text" class="form-control" id="UserName" name="UserName" placeholder="Ingrese su Nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="UserEmail">Email:</label>
                            <input type="email" class="form-control" id="UserEmail" name="UserEmail" placeholder="Ingrese su Email" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Tipo de Usuario:</label>
                            <input type="text" class="form-control" id="role" name="role" placeholder="Tipo usuario" required>
                        </div>
                        <div class="form-group">
                            <label for="UserPass">Contraseña:</label>
                            <input type="password" class="form-control" id="UserPass" name="UserPass" placeholder="Ingrese su Contraseña" required>
                        </div>
                        <div class="form-group">
                            <label for="conf_UserPass"> Confirmar contraseña: </label>
                            <input type="password" class="form-control" id="conf_UserPass" name="conf_UserPass" placeholder="Confirme su contraseña"  required>
                        </div>
                        <button type="submit" name="registrar" class="btn btn btn-primary enviar btn-block">Registarse</button>
                   </form>
               <a href="index.php">&laquo; Regresar &laquo;</a>
               </div>
               </div>
           </div>
       </div>
   </section>
<?php
if(isset($_POST['registrar'])){
    function comprobarUsuario($args, $conn){
        $UserEmail = mysqli_real_escape_string($conn, $args);
        $sql = "SELECT * FROM users WHERE UserEmail = '".$UserEmail."'";
        if($result = mysqli_query($conn, $sql)){
            // var_export($result);
            if(mysqli_num_rows($result) < 1){
                return false;
            }else{
                alert("Datos actualizados","registro");
                return 'actualizar';
            }
        }
    }
    $UserId ='';
    $UserName = $_POST['UserName'];
    $UserEmail = $_POST['UserEmail'];
    $role = $_POST['role'];
    $UserPass = $_POST['UserPass'];
    $conf_UserPass = $_POST['conf_UserPass'];
    $existe = comprobarUsuario($UserEmail, $conn);
    if($UserName!='' && $UserEmail!='' && $UserPass !=''){
        if($UserPass == $conf_UserPass){
            $UserId = dechex($UserId);
            $UserPass = md5($UserPass);
            // var_export($existe);
            if($existe == 'actualizar'){
                $sql = "UPDATE users SET UserName = '".$UserName."', role = '".$role."', UserPass = '".$UserPass."'
                         WHERE UserEmail = '".$UserEmail."'";
            }else{
                $sql = "INSERT INTO users (id_users, UserName, UserEmail, role, UserPass) VALUES ('".$UserId."', '".$UserName."','".$UserEmail."', '".$role."','".$UserPass."')";
            }
            $registro = mysqli_query($conn,$sql) or die (mysqli_error($conn));
            alert("Registro Exitoso","registro");
            unset($_POST);
            // header("Location: index.php");
        } else{
         alert("Las Contraseñas no coinciden","registro");
         }
    }else{
        alert("Hay algunos campos vacíos.","registro");
    }
}
?>
</body>
</html>
