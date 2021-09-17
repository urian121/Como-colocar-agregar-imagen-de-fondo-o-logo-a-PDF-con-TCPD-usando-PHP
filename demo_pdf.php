<?php
require_once('tcpdf/tcpdf.php');

date_default_timezone_set("America/Bogota");
setlocale(LC_ALL, 'es_ES');
$fecha_registro   = date('d-m-Y H:i:s A'); 


class MYPDF extends TCPDF {
   
   /* public function Header() {
        $bMargin = $this->getBreakMargin();
        $auto_page_break = $this->AutoPageBreak;
        $this->SetAutoPageBreak(false, 0);
        $img_file = K_PATH_IMAGES.'foto.png';
        $this->Image($img_file, 0, 0, 280, 205, '', '', '', false, 300, '', false, false, 0);
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        $this->setPageMark();
    }
    */
}


//iniciando un nuevo pdf
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
 
//establecer margenes
$pdf->SetMargins(10, 35, 10);
$pdf->SetHeaderMargin(20);
$pdf->setPrintFooter(false);
$pdf->setPrintHeader(false); //para eliminar la linea superio del pdf por defecto y tambien ej hearder
$pdf->SetAutoPageBreak(false);  //IMPORTANTISIMO,permite bajar un elemento y eliminar el crear otra otra.
 
//informacion del pdf
$pdf->SetCreator('UrianViera');
$pdf->SetAuthor('UrianViera');
$pdf->SetTitle('Factura de Pedido');
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 


$pdf->AddPage(); //Genero mi Nueva pagina

$canal ="WebDeveloper";

//tipo de fuente y tamanio
$pdf->SetFont('Helvetica', 'B', 25, '', 'false');
$pdf->SetFillColor(100, 0, 0, 0);
$pdf->SetTextColor(100, 0, 0, 0);
$pdf->SetXY(5, 77);
$pdf->Cell(200, 0, 'Canal '. $canal, 0, 0, 'C');

$pdf->Output('Cliente_'.$fecha_registro.'.pdf', 'I'); //el pdf se habre en otro venta, es como un tabs
//$pdf->Output('Cliente_'.$fecha_registro.date('d_m_y').'.pdf', 'D'); //La D es para forzar la Descarga

?>
