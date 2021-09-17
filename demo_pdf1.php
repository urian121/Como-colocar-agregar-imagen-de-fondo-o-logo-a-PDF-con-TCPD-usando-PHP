<?php
require_once('tcpdf/tcpdf.php');

date_default_timezone_set("America/Bogota");
setlocale(LC_ALL, 'es_ES');
$fecha   = date('d-m-Y'); 


class MYPDF extends TCPDF {
    
  public function Header(){
        $bMargin = $this->getBreakMargin();
        $auto_page_break = $this->AutoPageBreak;
        $this->SetAutoPageBreak(false, 0);
        $img_file = 'imgs/images.jpg';
        //$img_file = K_PATH_IMAGES.'foto.jpg';
        //diferencia si uso esta funcion buscara la imagen en la url tcpdf/examples/images.foto.jpg
        $this->Image($img_file, 10, 10, 25, 25, '', '', '', false, 300, '', false, false, 0);
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        $this->setPageMark();
    }

}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, 'mm', 'Letter', true, 'UTF-8', false);
 
//establecer margenes
$pdf->SetMargins(25, 35, 25);
$pdf->SetHeaderMargin(20);
$pdf->setPrintFooter(false);
$pdf->setPrintHeader(true); //activar el Header
$pdf->SetAutoPageBreak(false);  //IMPORTANTISIMO,permite bajar un elemento y eliminar el crear otra otra.
 
//informacion del pdf
$pdf->SetCreator('UrianViera');
$pdf->SetAuthor('UrianViera');


$pdf->AddPage();


$cliente ="Urian Viera";
$pdf->SetFont('helvetica','B',10); 
$pdf->SetXY(15, 40);
$pdf->Write(0, 'Cliente: '. $cliente);
$pdf->SetXY(15, 45);
$pdf->Write(0, 'Email: programadorphp2017@gmail.com');


$codigo ="00125PO";
$pdf->SetFont('helvetica','B',10); 
$pdf->SetFillColor(0, 0, 255);
$pdf->SetTextColor(0, 0, 255);
$pdf->SetXY(150, 20);
$pdf->Write(0, 'Código: '. $codigo);

$pdf->SetFillColor(0, 0, 0, 100);
$pdf->SetTextColor(0, 0, 0, 100);
$pdf->SetXY(150, 25);
$pdf->Write(0, 'Fecha: '. $fecha);

$pdf->Ln(20); //Espacio en blanco

$pdf->SetFont('Helvetica', 'B', 15, '', 'false');
$pdf->SetFillColor(0, 100, 0, 0);
$pdf->SetTextColor(0, 100, 0, 0);
$pdf->SetXY(5, 120);
$pdf->Cell(200,0, 'Urian Viera - Programador & Desarrollador Web ',0,0,'C');



$pdf->Output('Cliente_'.$fecha.'.pdf', 'I');

?>
