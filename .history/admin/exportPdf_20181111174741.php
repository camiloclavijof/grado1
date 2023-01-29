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

// set default header data
// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
// $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// // set image scale factor
// $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// $pdf->setFontSubsetting(true);

$pdf->SetFont('dejavusans', '', 14, '', true);

$pdf->AddPage();
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
$html ='
    <h1>Welcome to <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;">&nbsp;<span style="color:black;">TC</span><span style="color:white;">PDF</span>&nbsp;</a>!</h1>
    <i>This is the first example of TCPDF library.</i>
    <p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use: <i>Multicell(), writeHTML(), Write(), Cell() and Text()</i>.</p>
    <p>Please check the source code documentation and other examples for further information.</p>
    <p style="color:#CC0000;">TO IMPROVE AND EXPAND TCPDF I NEED YOUR SUPPORT, PLEASE <a href="http://sourceforge.net/donate/index.php?group_id=128076">MAKE A DONATION!</a></p>';

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

ob_end_clean();
$pdf->Output('example_001.pdf', 'I');
exit;
?>