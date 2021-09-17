<?php
$usuario  = "root";
$password = "";
$servidor = "localhost";
$basededatos = "practicas";
$con = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
$db = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");


date_default_timezone_set("America/Bogota");
setlocale(LC_ALL, 'es_ES');
$fecha_registro   = date('d-m-Y H:i:s A'); 


ini_set("memory_limit", "128M");
require_once('tcpdf/tcpdf.php');
//require_once($_SERVER['DOCUMENT_ROOT'].'/tcpdf/tcpdf.php'); 
//require_once dirname( __FILE__ ) . '/tcpdf/tcpdf.php';
ob_end_clean(); //limpiar la memoria


class MYPDF extends TCPDF {
    public function Header() {
        $bMargin = $this->getBreakMargin();
        $auto_page_break = $this->AutoPageBreak;
        $this->SetAutoPageBreak(false, 0);
        $img_file = dirname( __FILE__ ) .'/imgs/formato.jpg';
        //$img_file = 'imgs/formato.jpg';
        //$img_file = K_PATH_IMAGES.'foto.jpg'; //Esta funcion K_PATH_IMAGES busca la imagen en tcpdf/examples/images.foto.jpg
        $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        $this->setPageMark();
    } 
}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 051');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);
$pdf->setPrintFooter(false);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);



$pdf->AddPage();


$sqlCliente      = ("SELECT * FROM clients ORDER BY id DESC LIMIT 1");
$resultadoClient = mysqli_query($con, $sqlCliente);
$total           = mysqli_num_rows($resultadoClient);
$dataFilaCliente = mysqli_fetch_assoc($resultadoClient);

if($total >0){

/*Nombre completo del cliente*/
$pdf->SetFont('Helvetica', 'B', 9, '', 'false');
$pdf->SetXY(35, 56);
$pdf->Cell(70,0, ($dataFilaCliente['nameFull']),0,0,'C');

/*Cedula*/
$pdf->SetFont('Helvetica', 'B', 9, '', 'false');
$pdf->SetXY(116, 56);
$pdf->Cell(60,0, ($dataFilaCliente['identification']),0,0,'C');

/*Telefono*/
$pdf->SetFont('Helvetica', 'B', 9, '', 'false');
$pdf->SetXY(37, 66);
$pdf->Cell(32,0, ($dataFilaCliente['phone']),0,0,'C');

/*Direccion*/
$pdf->SetFont('Helvetica', 'B', 9, '', 'false');
$pdf->SetXY(90, 66);
$pdf->Cell(62,0, ($dataFilaCliente['addres']),0,0,'C');

/*Ciudad*/
$pdf->SetFont('Helvetica', 'B', 9, '', 'false');
$pdf->SetXY(165, 66);
$pdf->Cell(25,0, ($dataFilaCliente['city']),0,0,'C');

/*Fecha de reclamo*/
$pdf->SetFont('Helvetica', 'B', 9, '', 'false');
$pdf->SetXY(57, 81);
$pdf->Cell(47,0, date('d-m-Y', strtotime($dataFilaCliente['dateReclamo'])),0,0,'C');

/*Fecha de Compra */
$pdf->SetFont('Helvetica', 'B', 9, '', 'false');
$pdf->SetXY(140, 81);
$pdf->Cell(45,0, date('d-m-Y', strtotime($dataFilaCliente['dateCompra'])),0,0,'C');

/*Tipo de Producto */
$pdf->SetFont('Helvetica', 'B', 9, '', 'false');
$pdf->SetXY(53, 91);
$pdf->Cell(50,0, ($dataFilaCliente['typeProduct']),0,0,'C');

/*Lote */
$pdf->SetFont('Helvetica', 'B', 9, '', 'false');
$pdf->SetXY(117, 91);
$pdf->Cell(75,0, ($dataFilaCliente['lote']),0,0,'C');

/*Cantidad Recibida */
$pdf->SetFont('Helvetica', 'B', 9, '', 'false');
$pdf->SetXY(55, 100);
$pdf->Cell(70,0, ($dataFilaCliente['cantiRecibida']),0,0,'C');

/*Reclamo persona */
$pdf->SetFont('Helvetica', 'B', 9, '', 'false');
$pdf->SetXY(55, 115);
$pdf->Cell(130,0, ($dataFilaCliente['reclamo']),0,0,'C');


$pdf->Output('Cliente_'.($dataFilaCliente['identification']).'_'.date('d_m_y').'.pdf', 'I');

}


?>



