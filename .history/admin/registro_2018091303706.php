<?php 
  session_start();
  require_once('../inc/db.php');
  $datosUsuario = require_once('../login/checkLogin.php');
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $datos = array();
  $sql = "SELECT * FROM proyeccion WHERE id_proyeccion = ".$id;
  $run = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($run)){
    $datos = array_merge($datos, $row);
  }
  $sql2 = "SELECT * FROM datoscultivos WHERE id_datoscultivos = ".$id;
  $run = mysqli_query($conn, $sql2);
  while($row = mysqli_fetch_assoc($run)){
    $datos = array_merge($datos, $row);
  }
  $sql3 = "SELECT * FROM predios WHERE id_predios = ".$id;
  $run = mysqli_query($conn, $sql3);
  while($row = mysqli_fetch_assoc($run)){
    $datos = array_merge($datos, $row);
  }
  $sql4 = "SELECT * FROM nucleofamiliar WHERE id_nucleofamiliar = ".$id;
  $run = mysqli_query($conn, $sql4);
  while($row = mysqli_fetch_assoc($run)){
    $datos = array_merge($datos, $row);
  }
  $sql5 = "SELECT * FROM datospersonales WHERE id_datospersonales = ".$id;
  $run = mysqli_query($conn, $sql5);
  while($row = mysqli_fetch_assoc($run)){
    $datos = array_merge($datos, $row);
  }
  echo '<script> var datos = '.json_encode($datos).'</script>';
}
if( isset($_POST['Submit_form'])){
    if(count($_POST) < 60){
      echo "<script type='text/javascript'>alert('Faltaron campos por diligenciar');</script>";
    }else{
      //print_r($_POST);
      //datos 1
      $nombre = strip_tags($_POST['nombre']);
      $apellido1 = strip_tags($_POST['apellido1']);
      $apellido2 = strip_tags($_POST['apellido2']);
      $sexo = implode(',', $_POST['sexo']);
      $fecha_nacimiento = strip_tags($_POST['fecha_nacimiento']);
      $tipo_documento = implode(',', $_POST['tipo_documento']);
      $numero_documento =  strip_tags($_POST['numero_documento']);
      $telefono = strip_tags($_POST['telefono']);
      $estado_civil = $_POST['estado_civil'];
      $vereda = $_POST['vereda'];
      $cedula_cafetera =  implode(',', $_POST['cedula_cafetera']);
      $correo_electronico = implode(',', $_POST['correo_electronico']);
      $correo_electronico_name = strip_tags($_POST['correo_electronico_name']);
      //datos 2
      $nombre_conyugue = strip_tags($_POST['nombre_conyugue']);
      $primer_apellido = strip_tags($_POST['primer_apellido']);
      $segundo_apellido = strip_tags($_POST['segundo_apellido']);
      $numero_documento = strip_tags($_POST['numero_documento']);
      $hijos = strip_tags($_POST['hijos']);
      $hijos_menores = $_POST['hijos_menores'];
      $hijos_mayores = $_POST['hijos_mayores'];
      $personas_acargo = $_POST['personas_acargo'];
      //datos 3
      $nombrefinca = strip_tags($_POST['nombrefinca']);
      $tenencia = implode(',', $_POST['tenencia']);
      $vereda = $_POST['vereda'];
      $georeferenciacion = strip_tags($_POST['georeferenciacion']);
      $tipo_acceso = $_POST['tipo_acceso'];
      //datos 4
      $areas_sembradas = strip_tags($_POST['areas_sembradas']);
      $edad_cultivo = strip_tags($_POST['edad_cultivo']);
      $lote1 = strip_tags($_POST['lote1']);
      $lote2 = strip_tags($_POST['lote2']);
      $lote3 = strip_tags($_POST['lote3']);
      $lote4 = strip_tags($_POST['lote4']);
      $lote5 = strip_tags($_POST['lote5']);
      $renovacion_nueva_siembra = strip_tags($_POST['renovacion_nueva_siembra']);
      $renovacion_suca = strip_tags($_POST['renovacion_suca']);
      $cantidad_cargas = strip_tags($_POST['cantidad_cargas']);
      $afectacion_broca = implode(',', $_POST['afectacion_broca']);
      $area_afectada = strip_tags($_POST['area_afectada']);
      $regional = strip_tags($_POST['regional']);
      $foranea = strip_tags($_POST['foranea']);
      $jornales = strip_tags($_POST['jornales']);
      $disposicion_residuos = implode(',', $_POST['disposicion_residuos']);
      $disposicion_residuos_cual = strip_tags($_POST['disposicion_residuos_cual']);
      $disposicion_envases = strip_tags($_POST['disposicion_envases']);    
      $secadero = implode(',', $_POST['secadero']);
      $tiempo_construido = strip_tags($_POST['tiempo_construido']);
      $area_secadero = strip_tags($_POST['area_secadero']);
      $despulpadora = implode(',', $_POST['despulpadora']);
      $tiempo_uso = strip_tags($_POST['tiempo_uso']);
      $capacidad_despulpado = strip_tags($_POST['capacidad_despulpado']);
      $trilladora = implode(',', $_POST['trilladora']);
      $area_almacenamiento_cafe = strip_tags($_POST['area_almacenamiento_cafe']);
      $maquina_poscosecha = strip_tags($_POST['maquina_poscosecha']);
      //datos 5
      $ano1renovacion = strip_tags($_POST['ano1renovacion']);
      $ano2renovacion = strip_tags($_POST['ano2renovacion']);
      $ano3renovacion = strip_tags($_POST['ano3renovacion']);
      $ano4renovacion = strip_tags($_POST['ano4renovacion']);
      $ano5renovacion = strip_tags($_POST['ano5renovacion']);
      $ano1renovacionsuca = strip_tags($_POST['ano1renovacionsuca']);
      $ano2renovacionsuca = strip_tags($_POST['ano2renovacionsuca']);
      $ano3renovacionsuca = strip_tags($_POST['ano3renovacionsuca']);
      $ano4renovacionsuca = strip_tags($_POST['ano4renovacionsuca']);
      $ano5renovacionsuca = strip_tags($_POST['ano5renovacionsuca']); 
      
      //consultas sql
      $sql = "INSERT INTO proyeccion ( ano1renovacion, ano2renovacion, ano3renovacion, ano4renovacion, ano5renovacion, ano1renovacionsuca, ano2renovacionsuca, ano3renovacionsuca, ano4renovacionsuca, ano5renovacionsuca ) VALUES ('".$_POST["ano1renovacion"]."','".$_POST["ano2renovacion"]."','".$_POST["ano3renovacion"]."','".$_POST["ano4renovacion"]."','".$_POST["ano5renovacion"]."','".$_POST["ano1renovacionsuca"]."','".$_POST["ano2renovacionsuca"]."','".$_POST["ano3renovacionsuca"]."','".$_POST["ano4renovacionsuca"]."','".$_POST["ano5renovacionsuca"]."')";

      $query = mysqli_query($conn,$sql) or die ('No se pudo buscar la información del usuario' . mysqli_error($conn));
      $ultimoid = mysqli_insert_id($conn);

      $sql2 = "INSERT INTO datoscultivos (areas_sembradas , edad_cultivo, lote1, lote2, lote3, lote4, lote5, renovacion_nueva_siembra, renovacion_suca, cantidad_cargas, afectacion_broca, area_afectada, regional, foranea, jornales, disposicion_residuos, disposicion_residuos_cual, disposicion_envases, secadero, tiempo_construido, area_secadero, despulpadora, tiempo_uso, capacidad_despulpado, trilladora, area_almacenamiento_cafe, maquina_poscosecha, id_proyeccion) VALUES ('".$_POST["areas_sembradas"]."','".$_POST["edad_cultivo"]."','".$_POST["lote1"]."','".$_POST["lote2"]."','".$_POST["lote3"]."','".$_POST["lote4"]."','".$_POST["lote5"]."','".$_POST["renovacion_nueva_siembra"]."','".$_POST["renovacion_suca"]."','".$_POST["cantidad_cargas"]."', '".$afectacion_broca."', '".$_POST["area_afectada"]."', '".$_POST["regional"]."','".$_POST["foranea"]."','".$_POST["jornales"]."','".$disposicion_residuos."','".$_POST["disposicion_residuos_cual"]."','".$_POST["disposicion_envases"]."', '".$secadero."','".$_POST["tiempo_construido"]."','".$_POST["area_secadero"]."', '".$despulpadora."','".$_POST["tiempo_uso"]."','".$_POST["capacidad_despulpado"]."', '".$trilladora."', '".$_POST["area_almacenamiento_cafe"]."','".$_POST["maquina_poscosecha"]."','".$ultimoid."')";

      $query = mysqli_query($conn, $sql2) or die ('No se pudo buscar la información del usuario' . mysqli_error($conn));
      $ultimoid2 = mysqli_insert_id($conn); 

      $sql3 = "INSERT INTO predios (nombrefinca, tenencia, vereda, georeferenciacion, tipo_acceso, id_datoscultivos) VALUES ('".$_POST["nombrefinca"]."', '".$tenencia."', '".$_POST["vereda"]."', '".$_POST["georeferenciacion"]."', '".$_POST["tipo_acceso"]."', '".$ultimoid2."')";

      $query = mysqli_query($conn, $sql3) or die ('No se pudo buscar la información del usuario' . mysqli_error($conn));
      $ultimoid3 = mysqli_insert_id($conn); 

      $sql4 = "INSERT INTO nucleofamiliar (nombre_conyugue, primer_apellido, segundo_apellido, numero_documento, hijos, hijos_menores, hijos_mayores, personas_acargo, id_predios) VALUES ('".$_POST["nombre_conyugue"]."', '".$_POST["primer_apellido"]."', '".$_POST["segundo_apellido"]."', '".$_POST["numero_documento"]."', '".$_POST["hijos"]."', '".$_POST["hijos_menores"]."','".$_POST["hijos_mayores"]."','".$_POST["personas_acargo"]."', '".$ultimoid3."')";
      
      $query = mysqli_query($conn, $sql4) or die ('No se pudo buscar la información del usuario' . mysqli_error($conn));
      $ultimoid4 = mysqli_insert_id($conn); 


      $sql5 = "INSERT INTO datospersonales (nombre, apellido1, apellido2, sexo, fecha_nacimiento, tipo_documento, numero_documento, telefono, estado_civil, vereda, cedula_cafetera, correo_electronico, correo_electronico_name, id_nucleofamiliar) VALUES ('".$_POST["nombre"]."', '".$_POST["apellido1"]."','".$_POST["apellido2"]."', '".$sexo."', '".$_POST["fecha_nacimiento"]."', '".$tipo_documento."','".$_POST["numero_documento"]."', '".$_POST["telefono"]."', '".$estado_civil."', '".$_POST["vereda"]."', '".$cedula_cafetera."', '".$correo_electronico."', '".$_POST["correo_electronico_name"]."', '".$ultimoid4."')";

      $query = mysqli_query($conn, $sql5) or die ('No se pudo buscar la información del usuario' . mysqli_error($conn));
    }
  }
?>
<?php include'inc/header.php';?>
<?php include'inc/menu.php';?>
<section class="info">
    <div class="container">
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button" class="btn btn-warning btn-circle">
                      <i class="fa fa-user"></i>
                    </a>
                    <p>Datos personales</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button" class="btn btn-default btn-circle" >
                      <i class="fa fa-users"></i>
                    </a>
                    <p>Nucleo familiar</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button" class="btn btn-default btn-circle" >
                      <i class="fa fa-building"></i>
                    </a>
                    <p>Datos predio o finca</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-4" type="button" class="btn btn-default btn-circle" >
                      <i class="fa fa-map-signs"></i>
                    </a>
                    <p>Datos del cultivo</p>
                </div>
            </div>
        </div>
        <form role="form" method="post" action="">
            <div class="row setup-content" id="step-1">
              <div class="col-xs-12 col-sm-12"> 
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="nombre">Nombre:</label>
                      <input type="text"  name="nombre" class="form-control" placeholder="Digite su nombre">
                    </div>
                     <div class="form-group col-md-6">
                      <label for="apellido1">Primer apellido:</label>
                      <input type="text"  name="apellido1" class="form-control" placeholder="digite su apellido">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="apellido2">Segundo apellido:</label>
                      <input type="text"  name="apellido2" class="form-control" placeholder="digite su apellido">
                    </div>
                    <div class="form-check col-md-6">
                      <label for="sexo">Sexo:</label><br>
                      <input type="checkbox" name="sexo[]" value="Hombre"/>Hombre
                      <input type="checkbox" name="sexo[]" value="mujer"/>Mujer
                    </div>
                    <div class="form-group col-md-6">
                      <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                      <div class="input-group date">
                          <input type="text" class="form-control" name="fecha_nacimiento" id="datepicker" placeholder="Seleccione su fecha">
                          <div class="input-group-addon">
                              <span class="fa fa-th"></span>
                          </div>
                      </div>
                    </div>
                    <div class="form-check col-md-6">
                      <label for="tipo_documento" class="form-check-label">Tipo de documento:</label><br>
                      <input type="checkbox" class="form-check-input" name="tipo_documento[]" value="TI"/>TI
                      <input type="checkbox" class="form-check-input" name="tipo_documento[]" value="CC"/>CC
                    </div>
                    <div class="form-group col-md-6">
                      <label for="numero_documento">Numero de documento:</label>
                      <input type="number"  name="numero_documento" class="form-control" placeholder="Digite su documento">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="telefono">Telefono:</label>
                      <input type="number"  name="telefono" class="form-control" placeholder="Digite su telefono">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="estado_civil">Estado civil:</label>
                      <select name="estado_civil" class="form-control">
                        <option value="">Selecione su estado civil</option>
                        <option value="Soltero/a">Soltero/a</option>
                        <option value="Casado/a">Casado/a</option>
                        <option value="Divorciado/a">Divorciado/a</option>
                      </select>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="vereda">Vereda donde se radica:</label>
                      <select name="vereda" class="form-control">
                        <option value="">Selecione uns vereda</option>
                        <option value="Chipaque">Chipaque</option>
                        <option value="Limoncitos">Limoncitos</option>
                        <option value="Tengavita">Tengavita</option>	
                        <option value="Monterredondo">Monterredondo</option>
                        <option value="la Meseta">la Meseta</option>
                        <option value="Mesagrande">Mesagrande</option>
                        <option value="Vanguardia">Vanguardia</option>
                        <option value="San Miguel">San Miguel</option>
                        <option value="La Primavera">La Primavera</option>
                        <option value="Chirajara Baja">Chirajara Baja</option>
                        <option value="Chirajara Alta">Chirajara Alta</option>
                        <option value="Casa de Teja">Casa de Teja</option>
                        <option value="Susumuco">Susumuco</option>
                        <option value="San Roque">San Roque</option>
                        <option value="Funcdiciones">Funcdiciones</option>
                        <option value="Jabonera">Jabonera</option>
                        <option value="San Marcos">San Marcos</option>
                        <option value="Los Gaquez">Los Gaquez</option>
                        <option value="Tunque">Tunque</option>
                        <option value="Naranjal">Naranjal</option>
                        <option value="La palma">La palma</option>
                        <option value="Espinal">Espinal</option>
                        <option value="El Laurel">El Laurel</option>
                        <option value="Las Mesas">Las Mesas</option>
                        <option value="Encenillos">Encenillos</option>
                        <option value=Conucos"">Conucos</option>
                        <option value="San Antonio">San Antonio</option>
                      </select>
                    </div>
                    <div class="form-check col-md-6">
                      <label for="cedula_cafetera" class="form-check-label">Posee cédula cafetera:</label><br>
                      <input type="checkbox" class="form-check-input" name="cedula_cafetera[]" value="SI"/>SI
                      <input type="checkbox" class="form-check-input" name="cedula_cafetera[]" value="NO"/>NO
                    </div>
                    <div class="form-check col-md-6">
                      <label for="correo_electronico" class="form-check-label">Posee correo electronico:</label><br>
                      <input type="checkbox" class="form-check-input" name="correo_electronico[]" value="SI"/>SI
                      <input type="checkbox" class="form-check-input" name="correo_electronico[]" value="NO"/>NO
                    </div>
                    <div class="form-group col-md-12">
                      <label for="correo_electronico_name">Cual:</label>
                      <input type="text"  name="correo_electronico_name" class="form-control" placeholder="Digite su correo ">
                    </div>
                  </div>
                <a href="index.php" class="btn btn-danger btn-lg push-left" >cancelar</a><button class="btn btn-warning nextBtn btn-lg pull-right" type="button" >Siguiente</button>
              </div>
            </div>
            <div class="row setup-content" id="step-2">
                <div class="col-xs-12 col-sm-12">
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="nombre_conyugue">Cual:</label>
                      <input type="text"  name="nombre_conyugue" class="form-control" placeholder="Digite nombre del conyugue">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="primer_apellido">Primer apellido:</label>
                      <input type="text"  name="primer_apellido" class="form-control" placeholder="Digite el primer apellido ">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="segundo_apellido">Segundo apellido:</label>
                      <input type="text"  name="segundo_apellido" class="form-control" placeholder="Digite el segundo apellido ">
                    </div> 
                    <div class="form-group col-md-12">
                      <label for="numero_documento">Numero de documento:</label>
                      <input type="number"  name="numero_documento" class="form-control" placeholder="Digite el numero del documento">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="hijos">Hijos:</label>
                      <select name="hijos" class="form-control">
                        <option value="">Selecione el numero de hijos</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="hijos_menores">Hijos menores de edad:</label>
                      <select name="hijos_menores" class="form-control">
                        <option value="">Selecione el numero de hijos</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="hijos_mayores">Hijos menores de edad:</label>
                      <select name="hijos_mayores" class="form-control">
                        <option value="">Selecione el numero de hijos</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="personas_acargo">Personas a cargo:</label>
                      <select name="personas_acargo" class="form-control">
                        <option value="">Selecione el numero</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                      </select>
                    </div>
                  </div>
                    <button class="btn btn-warning nextBtn btn-lg pull-right" type="button" >Siguiente</button> 
                </div>
            </div>
            <div class="row setup-content" id="step-3">
              <div class="col-xs-12 col-sm-12">
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="nombrefinca">Nombre del predio:</label>
                    <input type="text"  name="nombrefinca" class="form-control" placeholder="Digite el nombre del predio ">
                  </div>
                  <div class="form-check col-md-6">
                    <label for="tenencia" class="form-check-label">Tenencia:</label><br>
                    <input type="checkbox" class="form-check-input" name="tenencia[]" value="Propiedad"/>Propiedad
                    <input type="checkbox" class="form-check-input" name="tenencia[]" value="Arriendo"/>Arriendo
                  </div>
                  <div class="form-group col-md-6">
                    <label for="vereda">Vereda donde se ubica:</label>
                    <select name="vereda" class="form-control">
                      <option value="">Selecione una vereda</option>
                      <option value="Chipaque">Chipaque</option>
                      <option value="Limoncitos">Limoncitos</option>
                      <option value="Tengavita">Tengavita</option>	
                      <option value="Monterredondo">Monterredondo</option>
                      <option value="la Meseta">la Meseta</option>
                      <option value="Mesagrande">Mesagrande</option>
                      <option value="Vanguardia">Vanguardia</option>
                      <option value="San Miguel">San Miguel</option>
                      <option value="La Primavera">La Primavera</option>
                      <option value="Chirajara Baja">Chirajara Baja</option>
                      <option value="Chirajara Alta">Chirajara Alta</option>
                      <option value="Casa de Teja">Casa de Teja</option>
                      <option value="Susumuco">Susumuco</option>
                      <option value="San Roque">San Roque</option>
                      <option value="Funcdiciones">Funcdiciones</option>
                      <option value="Jabonera">Jabonera</option>
                      <option value="San Marcos">San Marcos</option>
                      <option value="Los Gaquez">Los Gaquez</option>
                      <option value="Tunque">Tunque</option>
                      <option value="Naranjal">Naranjal</option>
                      <option value="La palma">La palma</option>
                      <option value="Espinal">Espinal</option>
                      <option value="El Laurel">El Laurel</option>
                      <option value="Las Mesas">Las Mesas</option>
                      <option value="Encenillos">Encenillos</option>
                      <option value=Conucos"">Conucos</option>
                      <option value="San Antonio">San Antonio</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="georeferenciacion">georeferenciacion:</label>
                    <input type="text"  name="georeferenciacion" class="form-control" placeholder="Digite la ubicacion">
                  </div>
                  <div class="form-group col-md-6 ">
                    <label for="tipo_acceso">Tipo de acceso:</label>
                    <select name="tipo_acceso" class="form-control">
                      <option value="">Selecione una opcion</option>
                      <option value="Camino">Camino</option>
                      <option value="Carretera">Carretera</option>
                      <option value="Carreteable">Carreteable</option>
                      <option value="Servidumbre">Servidumbre</option>
                    </select>
                  </div>
                </div>
                <button class="btn btn-warning nextBtn btn-lg pull-right" type="button" >Siguiente</button> 
              </div>
            </div>
            <div class="row setup-content" id="step-4">
              <div class="col-xs-12 col-sm-12">
                <div class="row">
                    <div class="form-group col-md-6">
                    <label for="areas_sembradas">Area sembrada en hectareas:</label>
                    <input type="number"  name="areas_sembradas" class="form-control" placeholder="Digite el area sembrada">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="edad_cultivo">Edad del cultivo en años:</label>
                    <input type="text"  name="edad_cultivo" class="form-control" placeholder="Digite la edad del cultivo">
                  </div>
                  <div class="table-responsive table-bordered col-md-12">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Lote 1</th>
                          <th>Lote 2</th>
                          <th>Lote 3</th>
                          <th>Lote 4</th>
                          <th>Lote 5</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><input type="text" name="lote1"></td>
                          <td><input type="text" name="lote2"></td>
                          <td><input type="text" name="lote3"></td>
                          <td><input type="text" name="lote4"></td>
                          <td><input type="text" name="lote5"></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <hr>
                    <p>En el ultimo año</p>
                  <hr>
                  <div class="form-group col-md-6">
                    <label for="renovacion_nueva_siembra">Renovacion por nueva siembra en hectareas:</label>
                    <input type="number"  name="renovacion_nueva_siembra" class="form-control" placeholder="Digite el area">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="renovacion_suca">Renovacion pos suca en hectareas:</label>
                    <input type="number"  name="renovacion_suca" class="form-control" placeholder="Digite el area">
                  </div>
                  <hr>
                    <p>Produccion ultimo año</p>
                  <hr>
                  <div class="form-group col-md-4">
                    <label for="cantidad_cargas">Cargas:</label>
                    <input type="number"  name="cantidad_cargas" class="form-control" placeholder="Digite la cantidad de cargas">
                  </div>
                  <div class="form-check col-md-4">
                      <label for="afectacion_broca" class="form-check-label">Afectacion de broca:</label><br>
                      <input type="checkbox" class="form-check-input" name="afectacion_broca[]" value="SI"/>SI
                      <input type="checkbox" class="form-check-input" name="afectacion_broca[]" value="NO"/>NO
                  </div>
                  <div class="form-group col-md-4">
                    <label for="area_afectada">Area afectada:</label>
                    <input type="number"  name="area_afectada" class="form-control" placeholder="Digite el area afectada">
                  </div>
                  <hr>
                    <p>Mano de obra</p>
                  <hr>
                  <div class="form-group col-md-4">
                    <label for="regional">Regional:</label>
                    <input type="text"  name="regional" class="form-control" placeholder="Digite la regional">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="foranea">Foranea:</label>
                    <input type="text"  name="foranea" class="form-control" placeholder="Digite la foranea">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="jornales">Jornales año:</label>
                    <input type="text"  name="jornales" class="form-control" placeholder="Digite los jornales">
                  </div>
                  <div class="form-check col-md-4">
                    <label for="disposicion_residuos" class="form-check-label">Disposicion de residuos organicos:</label><br>
                    <input type="checkbox" class="form-check-input" name="disposicion_residuos[]" value="Compostaje"/>Compostaje
                    <input type="checkbox" class="form-check-input" name="disposicion_residuos[]" value="Lombricultivo"/>Lombricultivo
                    <input type="checkbox" class="form-check-input" name="disposicion_residuos[]" value="Otro"/>Otro
                  </div>
                  <div class="form-group col-md-4">
                    <label for="disposicion_residuos_cual">Cual:</label>
                    <input type="text"  name="disposicion_residuos_cual" class="form-control" placeholder="Digite los jornales">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="disposicion_envases">Disposicion de envases de agroquimicos?:</label>
                    <input type="text"  name="disposicion_envases" class="form-control" placeholder="">
                  </div>
                  <hr>
                    <p>Maquinas Herramientas</p>
                  <hr>
                  <div class="form-check col-md-2">
                    <label for="secadero" class="form-check-label">Secadero:</label><br>
                    <input type="checkbox" class="form-check-input" name="secadero[]" value="SI"/>SI
                    <input type="checkbox" class="form-check-input" name="secadero[]" value="NO"/>NO
                  </div>
                  <div class="form-group col-md-5">
                    <label for="tiempo_contruido">Tiempo Construido Años:</label>
                    <input type="text"  name="tiempo_construido" class="form-control" placeholder="Tiempo construido en años">
                  </div>
                  <div class="form-group col-md-5">
                    <label for="area_secadero">Area del secadero en metros cuadrados:</label>
                    <input type="text"  name="area_secadero" class="form-control" placeholder="Medida del secadero">
                  </div>
                  <div class="form-check col-md-2">
                    <label for="despulpadora" class="form-check-label">Despulpadera:</label><br>
                    <input type="checkbox" class="form-check-input" name="despulpadora[]" value="SI"/>SI
                    <input type="checkbox" class="form-check-input" name="despulpadora[]" value="NO"/>NO
                  </div>
                  <div class="form-group col-md-5">
                    <label for="tiempo_uso">Tiempo de Uso en años:</label>
                    <input type="text"  name="tiempo_uso" class="form-control" placeholder="Tiempo de uso despulpadora">
                  </div>
                  <div class="form-group col-md-5">
                    <label for="capacidad_despulpado">Capacidad de despulpado:</label>
                    <input type="text"  name="capacidad_despulpado" class="form-control" placeholder="Capacidad de despulpadora">
                  </div>
                  <div class="form-check col-md-2">
                    <label for="trilladora" class="form-check-label">Trilladora:</label><br>
                    <input type="checkbox" class="form-check-input" name="trilladora[]" value="SI"/>SI
                    <input type="checkbox" class="form-check-input" name="trilladora[]" value="NO"/>NO
                  </div>
                  <div class="form-group col-md-10">
                    <label for="area_almacenamiento_cafe">Area de almacenamiento de café pergamino seco:</label>
                    <input type="text"  name="area_almacenamiento_cafe" class="form-control" placeholder="Tamaño de la trilladora">
                  </div>
                  <br>
                  <hr>
                    <p>Otra maquina de poscosecha</p>
                  <hr>
                  <div class="form-check col-md-12">
                    <label for="maquina_poscosecha" class="form-check-label">Cual:</label><br>
                    <input type="text"  name="maquina_poscosecha" class="form-control" placeholder="">
                  </div>
                  <br><br>
                  <hr>
                    <p>Proyeccion a 5 años o no se va a seguir extendiendo</p>
                  <hr>
                  <div class="table-responsive table-bordered col-md-12">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Año</th>
                          <th>Lote 1</th>
                          <th>Lote 2</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td><input type="text" class="form-control" name="ano1renovacion"></td>
                          <td><input type="text" class="form-control" name="ano1renovacionsuca"></td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td><input type="text" class="form-control" name="ano2renovacion"></td>
                          <td><input type="text" class="form-control" name="ano2renovacionsuca"></td>
                        </tr>
                         <tr>
                          <td>3</td>
                          <td><input type="text" class="form-control" name="ano3renovacion"></td>
                          <td><input type="text" class="form-control" name="ano3renovacionsuca"></td>
                        </tr>
                         <tr>
                          <td>4</td>
                          <td><input type="text" class="form-control" name="ano4renovacion"></td>
                          <td><input type="text" class="form-control" name="ano4renovacionsuca"></td>
                        </tr>
                         <tr>
                          <td>5</td>
                          <td><input type="text" class="form-control" name="ano5renovacion"></td>
                          <td><input type="text" class="form-control" name="ano5renovacionsuca"></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <br>
                <button class="btn btn-success btn-lg pull-right" type="submit" name="Submit_form">Guardar</button>                
              </div>
            </div>
        </form>
        </div>
</section>
<script>
  if(datos){
    $.each(datos, function(index, value) {
      var a = $('form [name="'+index+'"]').val(value);
      if(!a['length']){
        $('form [value="'+value+'"]')
      }
    });
  }
  $('form [name]') //cc
</script>