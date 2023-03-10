<?php
    session_start();
    require_once('../inc/db.php');
    if($_GET['id'] === '' || $_GET['id'] === false){
        echo 'Datos insuficientes para generar el PDF';
        exit;
    }
$sql = "SELECT CONCAT(nombre, ' ', apellido1, ' ', apellido2) AS nombre, sexo, numero_documento1 FROM datospersonales WHERE id_datospersonales =".$_GET['id'];    

$result = mysqli_query($conn,$sql) or die ('No se pudo buscar la información del usuario' . mysqli_error($conn));
while($row = mysqli_fetch_assoc($result)){
    $datos = array(
        'nombre' => $row['nombre'],
        'sexo' => $row['sexo'],
        'numero_documento1' => $row['numero_documento1'],
    );
    
}
if(count($datos) < 1){
    echo 'No se encontraron datos del usurio.';
    exit;
}
    
// Include the main TCPDF library (search for installation path).
require_once('../assets/tcpdf/tcpdf_import.php');
ob_start();

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Camilo Andrés Clavijo Fernández');
$pdf->SetTitle('- Certificado');

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
$complemento = 'La señora';
if($datos['sexo'] == 'Hombre'){
    $complemento = 'El señor';
}
$html ="
    <p>".$complemento." ".$datos['nombre']." con numero de identificación ".$datos['numero_documento1'].", se encuentra registrado en el sistema de Direccion de desarrollo agropecuario económico y ambiental.<br><br>
Se expide el ".date('dd/mm/yyyy')." en Guayabetal Cundinamarca.
    </p>
";

$pdf->Image('../assets/img/logo1,3.jpg', 'C', 20, 45, '', 'JPG', false, 'C', false, 300, 'C', false, false, 0, false, false, false);
$pdf->SetFont('dejavusans', '', 12, '', true);
$pdf->MultiCell(0, 10, 'DIRECCIÓN DE DESARROLLO AGROPECUARIO ECONÓMICO Y AMBIENTAL', 0, 'C', 0, 0, '', 90, true);
$pdf->SetFont('dejavusans', '', 11, '', true);
$pdf->MultiCell(0, 10, 'CERTIFICA:', 0, 'C', 0, 0, '', 110, true);
$pdf->SetFont('dejavusans', '', 10, '', true);
$pdf->writeHTMLCell(0, 0, '', 130, $html, 0, 1, 0, true, '', true);

$pdf->Image('../assets/img/firma.png', 'C', 186, 45, '', 'PNG', false, 'L', false, 300, 'C', false, false, 0, false, false, false);
$pdf->MultiCell(0, 10, '______________________________', 0, 'C', 0, 0, '', 195, true);
$pdf->MultiCell(0, 10, 'Firma', 0, 'C', 0, 0, '', 200, true);
ob_end_clean();
$pdf->Output('certificado.pdf', 'I');
exit;
?>