<?php
    session_start();
    require_once('../inc/db.php');
    // echo '<pre>';
    // var_export($_GET);
    // echo '</echo>';
    // exit;
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


    
// Include the main TCPDF library (search for installation path).
require_once('../assets/tcpdf/tcpdf_import.php');
ob_start();

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Camilo Andrés Clavijo Fernández');
$pdf->SetTitle('Direccion de desarrollo agropecuario económico y ambiental - Certificado');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


// add a page
$pdf->AddPage();
// Set some content to print
    // <div style='text-align: center;'>
    // 	<img src='logo.jpg' width='150' height='150'>
    // </div>
// $empresa ="<div style='text-align: center;'><h2></h2></div>";

$html ="
    <p>Tiene que ser individual por el id de la persona
        Es que salga el logo el nombre de la empresa 
        Certifica que:
        El(a) señor(a) -nombres y apellidos de la persona- con numero de identificación -, se encuentra registrado en el sistema de -nombre de la empresa-.
        Se expide -dia,mes,año actual- que se genere automáticamente-  en Guayabetal Cundinamarca
    </p>
";
$pdf->Image('../assets/img/logo1,3.jpg', 'C', 20, 45, '', 'JPG', false, 'C', false, 300, 'C', false, false, 0, false, false, false);
$pdf->SetFont('dejavusans', '', 12, '', true);
$pdf->MultiCell(0, 10, 'DIRECCIÓN DE DESARROLLO AGROPECUARIO ECONÓMICO Y AMBIENTAL', 0, 'C', 0, 0, '', 90, true);
$pdf->SetFont('dejavusans', '', 10, '', true);
$pdf->writeHTMLCell(0, 0, '', 130, $html, 0, 1, 0, true, '', true);

ob_end_clean();
$pdf->Output('certificado.pdf', 'I');
exit;
?>