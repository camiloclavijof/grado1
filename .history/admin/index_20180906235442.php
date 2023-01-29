<?php
    session_start();
    require_once('../inc/db.php');

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

    if( isset($_POST['export_data']) ){
        header("Content-Type: text/plain");
        $filename = "Datos Usuarios" . date('Ymd') . ".xls";
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/vnd.ms-excel");

        $sql = "SELECT * FROM datospersonales INNER JOIN  nucleofamiliar ON datospersonales.id_nucleofamiliar =  nucleofamiliar.id_nucleofamiliar INNER JOIN predios ON nucleofamiliar.id_predios = predios.id_predios INNER JOIN datoscultivos ON predios.id_datoscultivos = datoscultivos.id_datoscultivos INNER JOIN proyeccion ON datoscultivos.id_proyeccion = proyeccion.id_proyeccion";    

        $result = mysqli_query($conn,$sql) or die ('No se pudo buscar la información del usuario' . mysqli_error($conn));
        $flag = false;
         while($row = mysqli_fetch_assoc($result)){
            if(!$flag) {
                echo implode("\t", array_keys($row)) . "\r\n";
                $flag = true;
            }
            echo implode("\t", array_values($row)) . "\r\n";
         }
        //print_r($result);
        exit;      
    }

?>
<?php include'inc/header.php';?>
<?php include'inc/menu.php';?> 
  <section class="info">
        <div class="container">
           <div class="row">
               <div class="container filas">
                  <div class="col-md-12 btn btn-md">
                        <a href="registro.php" class="btn btn-primary btn-sm pull-left" style="margin-right: 1%;">Agregar Registro</a>
                        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                            <button type="submit" name="export_data" value="excel" class="btn btn-info btn-sm pull-left">Exportar a Excel</button>
                        </form>
                        <input class="searchTerm  col-md-6 pull-right" id="searchTerm" type="text" onkeyup="doSearch()" placeholder="Ingresa tu busqueda">
                    </div>
                       <table id="tabla" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="col-xs-1 hidden-xs">№</th>
                                <th class="col-xs-1">Nombre</th>
                                <th class="col-xs-1">Primer Apellido</th>
                                <th class="col-xs-1">Segundo Apellido</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            $sql = "SELECT * FROM datospersonales" ;
                            $run = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($run)){
                              echo '
                                 <tr>
                                    <td class="col-xs-1 hidden-xs">'.$row['id_datospersonales'].'</td>
                                    <td class="col-xs-1">'.$row['nombre'].'</td>
                                    <td class="col-xs-1">'.$row['apellido1'].'</td>
                                    <td class="col-xs-1">'.$row['apellido2'].'</td>
                                </tr>
                                ';
                              }
                            ?>
                        </tbody>
                    </table>
               </div>
           </div>
        </div>
    </section>
<?php include'inc/footer.php';?>