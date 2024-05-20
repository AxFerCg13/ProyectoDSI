<?php
//// Obtener los dartos desde la vista
$id=$_POST['id'];

require('fpdf.php');

include("../../Controlador.php");
$Con=Conectar();
$SQL = "SELECT * FROM V_DatosLicencia WHERE NumLicencia='$id'";
$ResulSet=Ejecutar($Con, $SQL);
$Fila=mysqli_fetch_row($ResulSet);
Desconectar($Con);

$pdf = new FPDF('p','mm',array(54,85.5));
$pdf->SetAutoPageBreak(false); // Desactivar el salto automático de página
$pdf->AddPage();
$pdf->Image('escudoQro.png', 5, 4, 8.5);
$pdf->Image('lineaVertical.png', 10, 4.5, 12);

$pdf->SetFont('Arial','',5);
$pdf->SetXY(30, 0);
$pdf->Cell(10,10,'Estados Unidos Mexicanos', 0, 1, 'R');
$pdf->SetXY(40.8, 2);
$pdf->Cell(10,10,'Poder Ejecutivo del Estado de Queretaro', 0, 1, 'R');

$pdf->SetFont('Arial','B',4.5); 
$pdf->SetXY(35.5, 5);
$pdf->Cell(10,10,'Secretaria de Seguridad Ciudadana', 0, 1, 'R');

$pdf->SetFont('Arial','B',5.5); 
$pdf->SetXY(30, 7.5);
$pdf->Cell(10,10,'Licencia para conducir', 0, 1, 'R');
$pdf->Image('user.jpg', 30, 18, 20);

$pdf->SetFont('Arial','',3);
$pdf->SetXY(22, 18);
$pdf->Cell(10,10,'No. de Licencia', 0, 1, 'R');
$pdf->SetXY(39.5, 31);
$pdf->Cell(10,10,'Nombre', 0, 1, 'R');
$pdf->SetXY(39.5, 39);
$pdf->Cell(10,10.4,'Observaciones', 0, 1, 'R');

$pdf->SetFont('Arial','',6);
$pdf->SetTextColor(255,0,0);
$pdf->SetXY(22, 21);
$pdf->Cell(10,10,$Fila[0], 0, 1, 'R');
$pdf->SetTextColor(0,0,0);

$pdf->SetFont('Arial','',4);
$pdf->SetXY(22, 24);
$pdf->Cell(10,10,'AUTOMOVILISTA', 0, 1, 'R');

$pdf->SetFont('Arial','',6);
$pdf->SetXY(39.5, 37);
$pdf->Multicell(15,2,$Fila[1], 0);


$pdf->SetFont('Arial','B',3);
$pdf->SetXY(5, 42);
$pdf->Cell(10,10,'Fecha de Nacimiento', 0, 1, 'R');
$pdf->SetXY(5, 46);
$pdf->Cell(10,11,'Fecha de Expedicion', 0, 1, 'R');
$pdf->SetXY(2.4, 50.6);
$pdf->Cell(10,11,'Valida hasta', 0, 1, 'L');
$pdf->SetXY(2.4, 55.5);
$pdf->Cell(10,10,'Antiguedad', 0, 1, 'L');

$pdf->SetFont('Arial','', 6.5);
$pdf->SetXY(2.3, 43);
$pdf->Cell(10,12,$Fila[3], 0, 1, 'L');
$pdf->SetXY(2.3, 47);
$pdf->Cell(10,13,$Fila[4], 0, 1, 'L');
$pdf->SetXY(2.3, 56.2);
$pdf->Cell(10,13,'14', 0, 1, 'L');

$pdf->Image('recuadroA.jpg', 3.6, 65, 10);

$pdf->SetFont('Arial','B',20);
$pdf->SetXY(5, 60.5);
$pdf->Cell(10,20,$Fila[7], 0, 1, 'L');

$pdf->SetFont('Arial','B', 6.5);
$pdf->SetXY(2.3, 51.5);
$pdf->Cell(10,13,$Fila[5], 0, 1, 'L');



$pdf->SetFont('Arial','', 3.5);
$pdf->SetXY(23, 62);
$pdf->Cell(10,12,'AUTORIZO PARA QUE LA PRESENTE', 0, 1, 'C');
$pdf->SetXY(23, 63.5);
$pdf->Cell(10,12,'SEA RECABADA COMO GARANTIA DE', 0, 1, 'C');
$pdf->SetXY(23, 64.5);
$pdf->Cell(10,12.5,'INFRACCCION', 0, 1, 'C');

$pdf->SetFont('Arial','', 3);
$pdf->SetXY(24, 50.6);
$pdf->Cell(10,12,'Firma', 0, 1, 'C');
$pdf->Image('firma.png', 24, 58, 11);

$pdf->Image('lineasQro.png', 40, 65, 15);

//Pagina 2-Parte trasera de la licencia
$pdf->AddPage();
$pdf->SetAutoPageBreak(true);
$pdf->Image('911.jpeg', 2.7, 4, 13);
$pdf->Image('089.png', 38, 4, 11.8);
$pdf->SetFont('Arial','B', 9);
$pdf->SetXY(16.6, 5.8);
$pdf->Cell(19.5,4.5,'B211571223', 1, 1, 'C');

$pdf->SetFont('Arial','B',4.3);
$pdf->SetXY(41, 9.5);
$pdf->Cell(10,10,'Domicilio', 0, 1, 'R');

$pdf->SetFont('Arial','', 7.8);
$pdf->SetXY(38.5, 11);
$pdf->Multicell(15,12,$Fila[9], 0);

$pdf->Image('autos.png', 2.8, 32, 50);
$pdf->SetFont('Arial','B',4.3);
$pdf->SetXY(2.7, 34);
$pdf->Cell(10,10,'Restricciones', 0, 1, 'I');
$pdf->SetFont('Arial','', 6);
$pdf->SetXY(2.7, 35.2);
$pdf->Cell(10,12,$Fila[12], 0, 1, 'I');

$pdf->SetFont('Arial','B',4.3);
$pdf->SetXY(37, 34);
$pdf->Cell(10,10,'Grupo Sanguineo', 0, 1, 'D');
$pdf->SetFont('Arial','', 6);
$pdf->SetXY(44, 35.2);
$pdf->Cell(10,12,$Fila[10], 0, 1, 'D');
$pdf->SetFont('Arial','B',4.3);
$pdf->SetXY(35.8, 38.5);
$pdf->Cell(10,10,'DonadordeOrganos', 0, 1, 'D');
$pdf->SetFont('Arial','', 6);
$pdf->SetXY(48, 39.8);
$pdf->Cell(3,12,$Fila[11], 0, 1, 'D');
$pdf->SetFont('Arial','B',4.3);
$pdf->SetXY(33, 42.8);
$pdf->Cell(10,10,'Numero deEmergencias', 0, 1, 'D');
$pdf->SetFont('Arial','', 6);
$pdf->SetXY(33, 44);
$pdf->Cell(10,12,'000-442-253-6464', 0, 1, 'D');

$pdf->Image('ultFirma.png', 37, 51.6, 16);
$pdf->SetFont('Arial','B',4);
$pdf->SetXY(17.8, 60);
$pdf->Cell(10,10,'M. EN GPA MIGUEL ANGEL CONTRERAS ALVAREZ', 0, 1, 'D');
$pdf->SetXY(21, 62);
$pdf->Cell(10,10,'SECRETARIO DE SEGURIDAD CIUDADANA', 0, 1, 'D');

$pdf->SetFont('Arial','B',3.5);
$pdf->SetXY(2.7, 62.3);
$pdf->Cell(10,10,'Fundamento Legal', 0, 1, 'I');

$pdf->SetFont('Arial','',2.8);
$pdf->SetXY(2.7, 64);
$pdf->Cell(10,10,'Articulo 19 fraccion XIII y 33 fraccion Il de la Ley Organica del Poder Ejecutivo del', 0, 1, 'I');
$pdf->SetXY(2.7, 65);
$pdf->Cell(10,10,'Estado de Queretaro, articulo 9 fraccion XII y 55 de la Ley de Transito del Estado de', 0, 1, 'I');
$pdf->SetXY(2.7, 66);
$pdf->Cell(10,10,'Queretaro, articulo 4 de la Ley de Procedimientos Administrativos del Estado de', 0, 1, 'I');
$pdf->SetXY(2.7, 67);
$pdf->Cell(10,10,'Queretaro, articulo 28 del Reglamento de Transito del Estado de Queretaro y articulo 6,', 0, 1, 'I');
$pdf->SetXY(2.7, 68);
$pdf->Cell(10,10,'fraccion IV, inciso b) y 20, fraccion IV de la Ley de la Secretaria de Seguridad', 0, 1, 'I');
$pdf->SetXY(2.7, 69);
$pdf->Cell(10,10,'Ciudadana del Estado de Queretaro', 0, 1, 'I');


$pdf->Image('poderEj.png', 38, 74, 15);

$pdf->SetFont('Arial','',3);
$pdf->SetTextColor(0, 0, 255);
$pdf->SetXY(44.5, 72);
$pdf->Cell(10,10,'Secretaria de', 0, 1, 'I');

$pdf->SetFont('Arial','B',3.5);
$pdf->SetXY(44.5, 73);
$pdf->Cell(10,10,'Seguridad', 0, 1, 'I');
$pdf->SetXY(44.5, 74.1);
$pdf->Cell(10,10,'Ciudadana', 0, 1, 'I');






$pdf->Output();
?>
