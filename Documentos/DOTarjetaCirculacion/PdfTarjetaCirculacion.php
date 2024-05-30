<?php
$id=$_POST['id'];

require('fpdf.php');
include("../../Controlador.php");
$Con=Conectar();
$SQL = "SELECT * FROM V_DatosTarjetaCirculacion WHERE Folio=$id";
$ResulSet=Ejecutar($Con, $SQL);
$Fila=mysqli_fetch_row($ResulSet);
Desconectar($Con);

$pdf = new FPDF('L','mm',array(54,86));
$pdf->SetAutoPageBreak(false); // Desactivar el salto automático de página
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(10, 0);
$pdf->Cell(10,10,'TIPO DE SERVICIO', 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(30, 0);
$pdf->Cell(10,10,'HOLOGRAMA', 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(37, 0);
$pdf->Cell(10,10,'FOLIO', 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(51, 0);
$pdf->Cell(10,10,'VIGENCIA', 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(61, 0);
$pdf->Cell(10,10,'PLACA', 0, 1, 'R');

$pdf->SetFont('Arial', '', 5);
$pdf->SetXY(8.4,2);
$pdf->Cell(10,10,$Fila[2], 0, 1, 'R');

$pdf->SetFont('Arial', '', 5);
$pdf->SetXY(26,2);
$pdf->Cell(10,10,$Fila[5], 0, 1, 'R');

$pdf->SetFont('Arial', '', 5);
$pdf->SetXY(41,2);
$pdf->Cell(10,10,$Fila[0], 0, 1, 'R');

$pdf->SetFont('Arial', '', 5);
$pdf->SetXY(53,2);
$pdf->Cell(10,10,$Fila[3], 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 6);
$pdf->SetXY(70.5,2);
$pdf->Cell(10,10,$Fila[4], 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(7,4);
$pdf->Cell(10,10,'PROPIETARIO', 0, 1, 'R');

$pdf->SetFont('Arial', '', 5);
$pdf->SetXY(34,4);
$pdf->Cell(10,10,$Fila[1], 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(.4,8);
$pdf->Cell(10,10,'RFC', 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(34.5,8);
$pdf->Cell(10,10,'NUMERO DE SERIE', 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(55,8);
$pdf->Cell(10,10,'MODELO', 0, 1, 'R');

$pdf->SetFont('Arial', '', 5);
$pdf->SetXY(11.7,10);
$pdf->Cell(10,10,$Fila[21], 0, 1, 'R'); #pendiente

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(5.8,12);
$pdf->Cell(10,10,'LOCALIDAD', 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(39,12);
$pdf->Cell(10,10,'MARCA/LINEA/SUBLINEA', 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(57.3,12);
$pdf->Cell(10,10,'OPERACION', 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(53,16);
$pdf->Cell(10,10,'FOLIO', 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(57.5,17.5);
$pdf->Cell(10,10,'A      '.$Fila[0], 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(56.5,19);
$pdf->Cell(10,10,'PLACA ANT', 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(56.5,20.5);
$pdf->Cell(10,10,$Fila[7], 0, 1, 'R');

$pdf->SetFont('Arial', '', 5);
$pdf->SetXY(7,14);
$pdf->Cell(10,10,$Fila[22], 5, 1, 'R'); 

$pdf->SetFont('Arial', '', 5);
$pdf->SetXY(38.3,14);
$pdf->Cell(10,10,'FORD/RANGER/XLT', 5, 1, 'R');

$pdf->SetFont('Arial', '', 5);
$pdf->SetXY(60,14);
$pdf->Cell(10,10,'2018/1056773', 5, 1, 'R');

$pdf->SetFont('Arial', '', 5);
$pdf->SetXY(40.5,10);
$pdf->Cell(10,10,$Fila[8], 0, 1, 'R');

$pdf->SetFont('Arial', '', 5);
$pdf->SetXY(52.6,10);
$pdf->Cell(10,10,$Fila[10], 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(5,18);
$pdf->Cell(10,10,'MUNICIPIO', 0, 1, 'R');

$pdf->SetFont('Arial', '', 5);
$pdf->SetXY(7,24);
$pdf->Multicell(20,2,$Fila[20], 0);

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(16,23.5);
$pdf->Cell(10,10,'NUMERO DE CONSTANCIA', 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(27,23);
$pdf->Cell(10,10,'CILINDRAJE', 5, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(27,24.5);
$pdf->Cell(10,10,'CAPACIDAD', 5, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(25.5,26);
$pdf->Cell(10,10,'PUERTAS', 5, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(26,27.5);
$pdf->Cell(10,10,'ASIENTOS', 5, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(29,29);
$pdf->Cell(10,10,'COMBUSTIBLE', 5, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(28.5,30.5);
$pdf->Cell(10,10,'TRANSMISION', 5, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(9.2,25);
$pdf->Cell(10,10,'DE INSCRIPCION', 0, 1, 'R');

$pdf->SetFont('Arial', '', 5);
$pdf->SetXY(28,32);
$pdf->Cell(10,10,$Fila[16], 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(31,23);
$pdf->Cell(10,10,$Fila[11], 5, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(32,24.5);
$pdf->Cell(10,10,$Fila[12], 5, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(31,26);
$pdf->Cell(10,10,$Fila[13], 5, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(31,27.5);
$pdf->Cell(10,10,$Fila[14], 5, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(31,29);
$pdf->Cell(10,10,$Fila[15], 5, 1, 'R');

$pdf->SetFont('Arial', 'B', 3);
$pdf->SetXY(42,23);
$pdf->Cell(10,10,'CVE VEHICULAR', 5, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(38.5,25);
$pdf->Cell(10,10,'CLASE', 5, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(37,27);
$pdf->Cell(10,10,'TIPO', 5, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(37,29);
$pdf->Cell(10,10,'USO', 5, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(37,31);
$pdf->Cell(10,10,'RPA', 5, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(41,25);
$pdf->Cell(10,10,$Fila[17], 5, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(41,27);
$pdf->Cell(10,10,$Fila[18], 5, 1, 'R'); 

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(41.5,29);
$pdf->Cell(10,10,$Fila[25], 5, 1, 'R'); 

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(61,23.5);
$pdf->Cell(10,10,'FECHA DE EXPEDICION', 0, 1, 'R');

$pdf->SetFont('Arial', '', 5);
$pdf->SetXY(54,25);
$pdf->Cell(10,10,'04-MAY-18', 0, 1, 'R'); //Pendiente

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(60.3,26.5);
$pdf->Cell(10,10,'OFICINA EXPEDIDORA', 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(54,28);
$pdf->Cell(10,10,'MOVIMIENTO', 0, 1, 'R');

$pdf->SetFont('Arial', '', 5);
$pdf->SetXY(58.5,29.5);
$pdf->Cell(10,10,'ALTA DE PLACA', 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(59,31);
$pdf->Cell(10,10,'NUMERO DE MOTOR', 0, 1, 'R');

$pdf->SetFont('Arial', '', 5);
$pdf->SetXY(59,32.5);
$pdf->Cell(10,10,$Fila[26], 0, 1, 'R');

$pdf->SetFont('Arial', '', 5);
$pdf->SetXY(3.3,32.4);
$pdf->Cell(10,10,$Fila[24], 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(2.5,30.7);
$pdf->Cell(10,10,'COLOR', 0, 1, 'R');

$pdf->SetFont('Arial', '', 5);
$pdf->SetXY(9,29.5);
$pdf->Cell(10,10,$Fila[23], 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 4);
$pdf->SetXY(2.8,27.8);
$pdf->Cell(10,10,'ORIGEN', 0, 1, 'R');

$pdf->SetXY(47,11);
$pdf->Image('cirGris.png', 1.5, 38.2, 11);

$pdf->SetXY(47,11);
$pdf->Image('qroNosotros.png', 14, 37, 13);

$pdf->SetXY(47,11);
$pdf->Image('escudoQro.png', 29, 37.5, 7);

$pdf->SetFont('Arial', 'B', 6.7);
$pdf->SetXY(56,35);
$pdf->Cell(10,10,'PODER EJECUTIVO DEL', 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 7);
$pdf->SetXY(59,37.5);
$pdf->Cell(10,10,'ESTADO DE QUERETARO', 0, 1, 'R');

$pdf->SetFont('Arial', '', 4.2);
$pdf->SetXY(59,39.5);
$pdf->Cell(10,10,'SECRETARIA DE PLANEACION Y FINANZAS', 0, 1, 'R');

$pdf->SetXY(47,11);
$pdf->Image('tarjetaCirculacion.jpg', 21, 49.2, 46);

$pdf->SetXY(47,11);
$pdf->Image('QR.png', 68, 35.2, 17);

$Folio = $Fila[0];
$ruta = "./pdfGenerados/$Folio.pdf";

// Guarda el archivo en la ruta especificada
$pdf->Output();
$pdf->Output('F', $ruta);
?>
