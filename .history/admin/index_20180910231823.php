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
                       <table id="tabla" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="col-xs-1 hidden-xs">№</th>
                                <th class="col-xs-1">Nombre</th>
                                <th class="col-xs-1">Primer Apellido</th>
                                <th class="col-xs-1">Segundo Apellido</th>
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
           $.post( "eliminarRegistro.php", {id: id})
            .done(function( data ) {
                console.log(data);
                if(data == true){
                    alert('Datos Eliminados Correctamente.');
                    $(this).parent('tr').remove();
                }else{
                    alert('Error al eliminar los datos.');
                }
            });
            // $.ajax({
            //     url: 'eliminarRegistro.php',
            //     dataType: 'json',
            //     type: 'post',
            //     contentType: 'application/json',
            //     data: JSON.stringify({id: id}),
            //     processData: true,
            //     success: function( data, textStatus, jQxhr ){
            //         alert('Datos Eliminados Correctamente.');
            //         $(this).parent('tr').remove();
            //     },
            //     error: function( jqXhr, textStatus, errorThrown ){
            //         alert('Error al eliminar los datos.');
            //     }
            // });
        });
    </script>
<?php include'inc/footer.php';?>