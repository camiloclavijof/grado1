<?php
    session_start();
    require_once('../inc/db.php');
    echo '<pre>';
    var_export($_POST);
    echo '</echo>';
    exit;
    // $sql = "SELECT * FROM datospersonales INNER JOIN  nucleofamiliar ON datospersonales.id_nucleofamiliar =  nucleofamiliar.id_nucleofamiliar INNER JOIN predios ON nucleofamiliar.id_predios = predios.id_predios INNER JOIN datoscultivos ON predios.id_datoscultivos = datoscultivos.id_datoscultivos INNER JOIN proyeccion ON datoscultivos.id_proyeccion = proyeccion.id_proyeccion";    
    // $result = mysqli_query($conn,$sql) or die ('No se pudo buscar la información del usuario' . mysqli_error($conn));
    // $hea = false;
    //     while($row = mysqli_fetch_assoc($result)){
    //     if(!$hea) {
    //         echo implode("\t", array_keys($row)) . "\r\n";
    //         $hea = true;
    //     }
    //     echo implode("\t", array_values($row)) . "\r\n";
    //     }
    // exit; 
?>