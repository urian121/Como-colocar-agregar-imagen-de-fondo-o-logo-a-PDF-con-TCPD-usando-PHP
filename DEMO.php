<?php
require_once('tcpdf/tcpdf.php');

$usuario  = "root";
$password = "";
$servidor = "localhost";
$basededatos = "pruebas";
$con = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
$db = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");


date_default_timezone_set("America/Bogota");
setlocale(LC_ALL, 'es_ES');
$fecha_registro   = date('d-m-Y H:i:s A'); 

/*
$nameFull 		= $_REQUEST['nameFull'];
$identification = $_REQUEST['identification'];
$phone 	        = $_REQUEST['phone'];
$addres 	    = $_REQUEST['addres'];
$city           = $_REQUEST['city'];
$dateCompra     = $_REQUEST['dateCompra'];
$typeProduct    = $_REQUEST['typeProduct'];
$lote           = $_REQUEST['lote'];
$cantiRecibida  = $_REQUEST['cantiRecibida'];
$reclamo        = $_REQUEST['reclamo'];
$motivo         = $_REQUEST['motivo'];


$InsertBD = ("
    INSERT INTO clients_huevossantarita (
        nameFull,
        identification,
        phone,
        addres,
        city,
        dateCompra,
        typeProduct,
        lote,
        cantiRecibida,
        reclamo,
        motivo
		)
	VALUES (
        '$nameFull',
		'$identification',
        '$phone',
		'$addres',
        '$city',
        '$dateCompra',
        '$typeProduct',
        '$lote',
        '$cantiRecibida',
        '$reclamo',
        '$motivo'
	);");
$queryBD = mysqli_query($con, $InsertBD);

 */


$sqlCliente      = ("SELECT * FROM clients_huevossantarita");
$resultadoClient = mysqli_query($con, $sqlCliente);
$dataFilaCliente = mysqli_fetch_assoc($resultadoClient);
echo $dataFilaCliente['nameFull'];

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
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, 'mm', 'Letter', true, 'UTF-8', false);
 
//establecer margenes
$pdf->SetMargins(10, 35, 10);
$pdf->SetHeaderMargin(20);
$pdf->setPrintFooter(false);
$pdf->setPrintHeader(false); //para eliminar la linea superio del pdf por defecto y tambien ej hearder
$pdf->SetAutoPageBreak(false);  //IMPORTANTISIMO,permite bajar un elemento y eliminar el crear otra otra.
 
//informacion del pdf
$pdf->SetCreator('UrianViera');
$pdf->SetAuthor('UrianViera');
//$pdf->SetTitle('Factura de Pedido');


$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
//tipo de fuente y tamanio
$pdf->SetFont('helvetica', '', 10);

$pdf->AddPage();

$cedula ="200043322";

/*
$pdf->SetFont('Helvetica', 'B', 16, '', 'false');
$pdf->SetXY(100, 85);
$pdf->Cell(0,0,'CÉDULA DE CIUDADANIA N° '.$cedula,0,0,'C');

*/
$pdf->SetFont('Helvetica', 'B', 25, '', 'false');
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(60, 77);
$pdf->Cell(165, 0, $cedula, 0, 0, 'C');

$pdf->Output('Cliente.pdf', 'I');
?>
