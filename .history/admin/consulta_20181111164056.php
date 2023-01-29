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
           <div class="row">
               <div class="container filas">
                  <div class="col-md-12 btn btn-md">
                        
                        <form action="/grado/admin/exportExcel.php" method="post">
                            <button type="submit" name="export_data" value="excel" class="btn btn-info btn-sm pull-left">
                                <i class="fa fa-file-excel-o" aria-hidden="true"></i> >Exportar a Excel
                            </button>
                        </form>
                        <input class="searchTerm  col-md-6 pull-right" id="searchTerm" type="text" onkeyup="doSearch()" placeholder="Ingresa tu busqueda">
                    </div>
                    <p> LISTA DE USUARIOS REGISTRADOS</p>
                    </div>
                       <table id="tabla" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="col-xs-1 hidden-xs">№</th>
                                <th class="col-xs-1">Nombre</th>
                                <th class="col-xs-1">Primer Apellido</th>
                                <th class="col-xs-1">Segundo Apellido</th>
                                <th class="col-xs-1">Actualizar</th>
                                <th class="col-xs-1">Eliminar</th>
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
                                    <td class="col-xs-1 editar"> <a href="registro.php?id='.$row['id_datospersonales'].'"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                                    <td class="col-xs-1 delete" key="'.$row['id_datospersonales'].'">X</td>
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
    <script>
        $('#tabla .delete').on('click', function(){
            var id = $(this).attr('key');
            $.ajax({
                url: 'eliminarRegistro.php',
                type:"POST",
                data: {id: id},
                success: function(response){
                    alert('Datos Eliminados Correctamente.');
                    $('#tabla .delete[key="'+id+'"]').parent('tr').remove();
                },
                error: function(){
                    alert('Error al eliminar los datos.');
                }
            });
        });
    </script>
<?php include'inc/footer.php';?>
