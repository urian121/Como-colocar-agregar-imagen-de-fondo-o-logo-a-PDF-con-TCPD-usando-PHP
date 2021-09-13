<?php
$usuario  = "usr0802_wp";
$password = "NiQKe9uSfr7n";
$servidor = "localhost";
$basededatos = "usr0802_wp";
$con = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
$db = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");

require_once('http://huevossantarita.com/huevossantarita_form_pdf/tcpdf/tcpdf.php');
ob_end_clean(); //limpiar la memoria

$sqlCliente      = ("SELECT * FROM clients_huevossantarita");
$resultadoClient = mysqli_query($con, $sqlCliente);
$dataFilaCliente = mysqli_fetch_assoc($resultadoClient);
$dataFilaCliente['nameFull'];

class MYPDF extends TCPDF {
    
      /* function Header()
        {
           $this->Image('panel/'.$url_log, 5, 5, 30 );
            $this->SetFont('Arial','B',15);
            $this->Cell(30);
            $this->Cell(120,10, 'Reporte De Estados',0,0,'C');
            $this->Ln(20);
        } */
   /* public function Header() {
        $bMargin = $this->getBreakMargin();
        $auto_page_break = $this->AutoPageBreak;
        $this->SetAutoPageBreak(false, 0);
          $img_file = 'foto.jpg';
        //$img_file = K_PATH_IMAGES.'foto.jpg';
        //diferencia si uso esta funcion buscara la imagen en la url tcpdf/examples/images.foto.jpg
        $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        $this->setPageMark();
    }
    */
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



$pdf->SetFont('Helvetica', 'B', 9, '', 'false');
$pdf->SetXY(35, 56);
$pdf->Cell(70,0, 'Urian Viera Jose Viera Parra Uriany Somosa',0,0,'C');


/*Cedula*/
$pdf->SetFont('Helvetica', 'B', 9, '', 'false');
$pdf->SetXY(116, 56);
$pdf->Cell(60,0, '123456789321456',0,0,'C');

/*Telefono*/
$pdf->SetFont('Helvetica', 'B', 9, '', 'false');
$pdf->SetXY(37, 66);
$pdf->Cell(32,0, '3213872648',0,0,'C');

/*Direcci贸n*/
$pdf->SetFont('Helvetica', 'B', 9, '', 'false');
$pdf->SetXY(90, 66);
$pdf->Cell(62,0, 'cra 96b 24c 48 Fontibon',0,0,'C');

/*Ciudad*/
$pdf->SetFont('Helvetica', 'B', 9, '', 'false');
$pdf->SetXY(165, 66);
$pdf->Cell(25,0, 'Bogota',0,0,'C');

/*Fecha de reclamo*/
$pdf->SetFont('Helvetica', 'B', 9, '', 'false');
$pdf->SetXY(57, 81);
$pdf->Cell(47,0, '03-09-2021',0,0,'C');

/*Fecha de Compra */
$pdf->SetFont('Helvetica', 'B', 9, '', 'false');
$pdf->SetXY(140, 81);
$pdf->Cell(45,0, '03-09-2021',0,0,'C');

/*Tipo de Producto */
$pdf->SetFont('Helvetica', 'B', 9, '', 'false');
$pdf->SetXY(53, 91);
$pdf->Cell(50,0, 'Granos',0,0,'C');

/*Lote */
$pdf->SetFont('Helvetica', 'B', 9, '', 'false');
$pdf->SetXY(117, 91);
$pdf->Cell(75,0, 'Lote 1',0,0,'C');

/*Cantidad Recibida */
$pdf->SetFont('Helvetica', 'B', 9, '', 'false');
$pdf->SetXY(55, 100);
$pdf->Cell(70,0, '320',0,0,'C');


/*Motivo de Reclamo */
$reclamo ="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.";
$pdf->SetFont('Helvetica', 'I', 10, '', 'false');
//$pdf->SetTextColor(128);
$pdf->SetXY(57, 125);
$pdf->writeHTMLCell(138, 0, '', '', $reclamo, 0, 0, 0, true, 'C'); 
 
//$pdf->MultiCell(0,4,'This is my disclaimer. THESE WORDS NEED TO BE BOLD. These words do not need to be bold.',1,'C');

$pdf->Output('Cliente_'.$identification.date('d_m_y').'.pdf', 'D');


?>
