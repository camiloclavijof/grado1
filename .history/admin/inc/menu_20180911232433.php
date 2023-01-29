<header>
    <nav class="navbar navbar-inverse">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">DDEAA</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
          </ul>
          <ul class="nav navbar-nav navbar-right">  
            <li>&nbsp;<?php echo $datosUsuario['name'] ?></li>
            <li><a href="deleteUser.php"><i class="fa fa-user-times fa-lg" aria-hidden="true"></i>&nbsp;Eliminar Usuario</a></li>                      
            <li><a href="registrousers.php"><i class="fa fa-user-plus fa-lg" aria-hidden="true"></i>&nbsp;Registrar</a></li>
            <li><a href="../login/logout.php"><i class="fa fa-sign-out fa-lg" aria-hidden="true"></i>&nbsp;Salir</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
</header>