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
                        <a href="registro.php" class="btn btn-primary btn-sm pull-left" style="margin-right: 1%;">Agregar Registro</a>
                        <form action="/grado/admin/exportExcel.php" method="post">
                            <button type="submit" name="export_data" value="excel" class="btn btn-info btn-sm pull-left">Exportar a Excel</button>
                        </form>
                        <input class="searchTerm  col-md-6 pull-right" id="searchTerm" type="text" onkeyup="doSearch()" placeholder="Ingresa tu busqueda">
                    </div>
                    <div class="col-md-12 btn btn-md">
                        <h2>BIENVENIDO AL REGISTRO Y CONTROL DE LOS CAFETEROS DE GUAYABETAL</h2>
                    </div>
                       <table id="tabla" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="col-xs-1 hidden-xs">№</th>
                                <th class="col-xs-1">Nombre</th>
                                <th class="col-xs-1">Primer Apellido</th>
                                <th class="col-xs-1">Segundo Apellido</th>
                                <th class="col-xs-1">Editar</th>
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
                                    <td class="col-xs-1 editar" key="'.$row['id_datospersonales'].'"><i class="fa fa-pencil" aria-hidden="true"></i></td>
                                    <td class="col-xs-1 delete" key="'.$row['id_datospersonales'].'"> <a href="registro.php">X</a></td>
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
        // $('#tabla .editar').on('click', function(){
        //     var id = $(this).attr('key');
        //     $.ajax({
        //         url: 'registro.php',
        //         type:"POST",
        //         data: {id: id},
        //         success: function(response){
        //             alert('Datos Eliminados Correctamente.');
        //             $('#tabla .delete[key="'+id+'"]').parent('tr').remove();
        //         },
        //         error: function(){
        //             alert('Error al eliminar los datos.');
        //         }
        //     });
        // });
    </script>
<?php include'inc/footer.php';?>