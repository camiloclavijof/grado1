<?php
    session_start();
    require_once('../inc/db.php');
    $datosUsuario = require_once('../login/checkLogin.php');
    $login_err = '';
	if(isset($_GET['login_error'])){
		if($_GET['login_error'] == 'empty'){
			$login_err = '<div class="alert alert-danger">User name or Password was empty!</div>';
		}elseif($_GET['login_error'] == 'wrong'){
			$login_err = '<div class="alert alert-danger">User name or Password was Wrong!</div>';
		}elseif($_GET['login_error'] == 'query_error'){
			$login_err = '<div class="alert alert-danger">There is somekind of Database Issue!</div>';
		}
    }
?>
<?php include'inc/header.php';?>
<?php include'inc/menu.php';?> 
  <section class="info">
        <div class="container">
           
               
                  
                    <div class="col-md-12 titulo1">
                        <center><h5>BIENVENIDO AL REGISTRO Y CONTROL DE LOS CAFETEROS</h5></center>
                        
                        <center><h4>DDEAA - GUAYABETAL</h4></center>
                        
                        <center><img src="/grado/assets/img/logo1,3.jpg"></center>

    
<?php include'inc/footer.php';?>
</div>
</div>
</section>
