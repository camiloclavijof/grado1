<?php
session_start();
require_once('inc/db.php'); 
if(isset($_POST['submit_login'])){
    //print_r($_POST);    
    if(!empty($_POST['UserName']) && !empty($_POST['UserPass'])){
        $post_UserName = mysqli_real_escape_string($conn,$_POST['UserName']);
        $post_UserPass = md5($_POST['UserPass']);

        $sql = "SELECT * FROM users WHERE UserEmail = '".$post_UserName."' AND UserPass = '".$post_UserPass."'";

        if($result = mysqli_query($conn, $sql)){
            while($rows = mysqli_fetch_assoc($result)){
                if(mysqli_num_rows($result) == 1){
                    $_SESSION['user'] = $post_UserName;
                    $_SESSION['password'] = $post_UserPass;
                    $_SESSION['role'] = $rows['role'];
                   //acceso administrador
                    if($rows['role'] == 'admin'){
                        //echo $rows['role'];
                        header('Location: admin/index.php');
                    } else {
                        //header('Location: index.php');
                    }
                   //acceso aseguradora1
                    if($rows['role'] == 'smo1'){
                        //echo $rows['role'];
                        header('Location: smo1/index.php');
                    } else {
                        //header('Location: index.php');
                    }
					//acceso aseguradora2
                    if($rows['role'] == 'smo2'){
                        //echo $rows['role'];
                        header('Location: smo2/index.php');
                    } else {
                        //header('Location: index.php');
                    }
					//acceso aseguradora3
                    if($rows['role'] == 'smo3'){
                        //echo $rows['role'];
                        header('Location: smo3/index.php');
                    } else {
                        //header('Location: index.php');
                    }
					//acceso aseguradora4
                    if($rows['role'] == 'smo4'){
                        //echo $rows['role'];
                        header('Location: smo4/index.php');
                    } else {
                        //header('Location: index.php');
                    }
                    //acceso tecnico
                    if($rows['role'] == 'tech'){
                        //echo $rows['role'];
                        header('Location: tech/index.php');
                    } else {
                       //header('Location: index.php');
                    }
                    
                    
                    
                } else {
                    header('Location:../index.php?login_error=wrong');
                }
            }
        }else {
            header('Location: ../index.php?login_error=query_error');
        }
    } else {
        header('Location:../index.php?login_error=empty');
    }
}	
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Inicio de sesión</title>
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <!--cache-->
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <section>
        <div class="container">
            <div class="row">
                <div class="main">                          
                  <form role="form" method="post">
                    <div class="form-group">
                      <label for="UserName">Usuario:</label>
                      <input type="text" class="form-control"  id="UserName" placeholder="Escriba su Correo" name="UserName" required>
                    </div>
                    <div class="form-group">                      
                      <label for="UserPass">Contraseña:</label>
                      <input type="password" class="form-control" id="UserPass" name="UserPass" placeholder="Ingrese su Contraseña" required>
                    </div>
                    <button type="submit" class="btn btn btn-warning enviar btn-block" name="submit_login">
                      Entrar
                    </button>
                  </form>
                </div>
            </div>
        </div>
    </section>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>