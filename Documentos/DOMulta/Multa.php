<?php
require('fpdf.php');

include("../../Controlador.php");
$Con=Conectar();
$SQL = "SELECT * FROM multas WHERE Folio=1";
$ResulSet=Ejecutar($Con, $SQL);
$Fila=mysqli_fetch_row($ResulSet);
Desconectar($Con);

// Crear instancia de FPDF con orientación 'P' para retrato, tamaño 'Letter' (carta)
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
// Dibujar el recuadro en la parte izquierda superior
$pdf->SetFillColor(173, 216, 230); // Azul claro: R=173, G=216, B=230
$pdf->Rect(120, 40, 70, 10, 'F');
$pdf->SetDrawColor(0, 0, 0); // Negro
$pdf->SetLineWidth(0.3); // Ancho de línea
$pdf->Rect(120, 40, 70, 10);

// Agregar texto 'FOLIO' en el centro del recuadro
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor(0, 0, 0); // Negro
$pdf->SetXY(10, 10);
$pdf->Cell(235, 70, 'FOLIO', 0, 0, 'C');
$pdf->SetLineWidth(0.3); // Ancho de la línea
$pdf->Line(135, 40, 135, 50); // Coordenadas: (x1, y1, x2, y2)

// Agregar texto 'FOLIO' en el centro del recuadro
$pdf->SetFont('Arial', 'B', 15);
$pdf->SetTextColor(0, 0, 0); // Negro
$pdf->SetXY(10, 10);
$pdf->Cell(300, 70, '4561225AASASD', 0, 0, 'C');
$pdf->SetLineWidth(0.3); // Ancho de la línea

$pdf->SetFont('Arial', 'B', 16);
$pdf->SetTextColor(0, 0, 180); // Azul: 0, Verde: 0, Rojo: 180
$pdf->SetXY(10, 0);
$pdf->Cell(125,20,'POLICIA FEDERAL', 0, 1, 'R');
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetTextColor(0, 0, 180); // Azul: 0, Verde: 0, Rojo: 180
$pdf->SetXY(10, 0);
$pdf->Cell(135,35,'BOLETA DE INFRACCION', 0, 1, 'R');


// Agregar la imagen al espacio a la izquierda de "FOLIO"
$imagePath = 'logoMx.jpg'; // Ruta de la imagen
$pdf->Image($imagePath, 35, 25, 60, 40); // Coordenadas: (x, y, ancho, alto)


//SEGUNDO CUADRO 
// Dibujar el recuadro en la parte izquierda superior
$pdf->SetFillColor(173, 216, 230); // Azul claro: R=173, G=216, B=230
$pdf->Rect(120, 55, 70, 10, 'F');
$pdf->SetDrawColor(0, 0, 0); // Negro
$pdf->SetLineWidth(0.3); // Ancho de línea
$pdf->Rect(120, 55, 70, 10);

// Agregar texto 'HORA' en el centro del recuadro
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetTextColor(0, 0, 0); // Negro
$pdf->SetXY(10, 10);
$pdf->Cell(233, 95, 'HORA', 0, 0, 'C');
$pdf->SetLineWidth(0.3); // Ancho de la línea
$pdf->Line(147, 65, 147, 55); // Coordenadas: (x1, y1, x2, y2) LINEA

$pdf->SetFont('Arial', 'B', 15);
$pdf->SetTextColor(0, 0, 0); // Negro
$pdf->SetXY(10, 10);
$pdf->Cell(245, 103, '9:15', 0, 0, 'C');

// Agregar texto 'FECHA' en el centro del recuadro
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetTextColor(0, 0, 0); // Negro
$pdf->SetXY(10, 10);
$pdf->Cell(288, 95, 'FECHA', 0, 0, 'C');
$pdf->SetLineWidth(0.3); // Ancho de la línea

$pdf->SetFont('Arial', 'B', 15);
$pdf->SetTextColor(0, 0, 0); // Negro
$pdf->SetXY(10, 10);
$pdf->Cell(315, 103, '22/08/2023', 0, 0, 'C');


//TERCER CUADRO 
// Dibujar el recuadro en la parte izquierda superior
$pdf->SetFillColor(173, 216, 230); // Azul claro: R=173, G=216, B=230
$pdf->Rect(20, 70, 170, 10, 'F');
$pdf->SetDrawColor(0, 0, 0); // Negro
$pdf->SetLineWidth(0.3); // Ancho de línea
$pdf->Rect(20, 70, 170, 10);
$pdf->Line(110, 70, 110, 80); // Coordenadas: (x1, y1, x2, y2) LINEA

// Agregar texto 'ENTIDADA FEDELAR' en el centro del recuadro
$pdf->SetFont('Arial', 'B', 7);
$pdf->SetTextColor(0, 0, 0); // Negro
$pdf->SetXY(10, 10);
$pdf->Cell(50, 125, 'ENTIDADA FEDELAR', 0, 0, 'C');
$pdf->SetLineWidth(0.3); // Ancho de la línea

$pdf->SetFont('Arial', 'B', 15);
$pdf->SetTextColor(0, 0, 0); // Negro
$pdf->SetXY(10, 10);
$pdf->Cell(60, 133, 'Queretaro ', 0, 0, 'C');

// Agregar texto 'MUNICIPIO' en el centro del recuadro
$pdf->SetFont('Arial', 'B', 7);
$pdf->SetTextColor(0, 0, 0); // Negro
$pdf->SetXY(10, 10);
$pdf->Cell(218, 125, 'MUNICIPIO', 0, 0, 'C');

$pdf->SetFont('Arial', 'B', 15);
$pdf->SetTextColor(0, 0, 0); // Negro
$pdf->SetXY(10, 10);
$pdf->Cell(240, 133, 'Queretaro ', 0, 0, 'C');






$pdf->SetFont('Arial', 'B', 8);
$pdf->SetTextColor(0, 0, 0); // Negro
$pdf->SetXY(10, 10);
$pdf->Cell(38, 147, 'INFRACTOR', 0, 0, 'C');

//CUARTO CUADRO 
// Dibujar el recuadro en la parte izquierda superior
$pdf->SetFillColor(173, 216, 230); // Azul claro: R=173, G=216, B=230
$pdf->Rect(20, 85, 170, 10, 'F');
$pdf->SetDrawColor(0, 0, 0); // Negro
$pdf->SetLineWidth(0.3); // Ancho de línea
$pdf->Rect(20, 85, 170, 10);
$pdf->Line(40, 95, 40, 85); // Coordenadas: (x1, y1, x2, y2) LINEA

// Agregar texto 'ID' en el centro del recuadro
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetTextColor(0, 0, 0); // Negro
$pdf->SetXY(10, 10);
$pdf->Cell(29, 155, 'ID', 0, 0, 'C');
$pdf->SetLineWidth(0.3); // Ancho de la línea

$pdf->SetFont('Arial', 'B', 15);
$pdf->SetTextColor(0, 0, 0); // Negro
$pdf->SetXY(10, 10);
$pdf->Cell(40, 163, '15', 0, 0, 'C');


// Agregar texto 'NOMBRE' en el centro del recuadro
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetTextColor(0, 0, 0); // Negro
$pdf->SetXY(10, 10);
$pdf->Cell(80, 155, 'NOMBRE', 0, 0, 'C');
$pdf->SetLineWidth(0.3); // Ancho de la línea
$pdf->Line(90, 95, 90, 85); // Coordenadas: (x1, y1, x2, y2) LINEA

$pdf->SetFont('Arial', 'B', 15);
$pdf->SetTextColor(0, 0, 0); // Negro
$pdf->SetXY(10, 10);
$pdf->Cell(110, 163, 'JUAN PEREZ', 0, 0, 'C');

// Agregar texto 'GRUPO' en el centro del recuadro
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetTextColor(0, 0, 0); // Negro
$pdf->SetXY(10, 10);
$pdf->Cell(178, 155, 'GRUPO', 0, 0, 'C');
$pdf->SetLineWidth(0.3); // Ancho de la línea
$pdf->Line(150, 95, 150, 85); // Coordenadas: (x1, y1, x2, y2) LINEA

$pdf->SetFont('Arial', 'B', 15);
$pdf->SetTextColor(0, 0, 0); // Negro
$pdf->SetXY(10, 10);
$pdf->Cell(207, 163, 'MUNICIPAL', 0, 0, 'C');


// Agregar texto 'FIRMA' en el centro del recuadro
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetTextColor(0, 0, 0); // Negro
$pdf->SetXY(10, 10);
$pdf->Cell(300, 155, 'FIRMA', 0, 0, 'C');
$pdf->SetLineWidth(0.3); // Ancho de la línea



//PROPIETARIO
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetTextColor(0, 0, 0); // Negro
$pdf->SetXY(10, 10);
$pdf->Cell(62, 177, 'PROPIETARIO DEL VEHICULO', 0, 0, 'C');

//CUARTO CUADRO 
// Dibujar el recuadro en la parte izquierda superior
$pdf->SetFillColor(173, 216, 230); // Azul claro: R=173, G=216, B=230
$pdf->Rect(20, 100, 170, 10, 'F');
$pdf->SetDrawColor(0, 0, 0); // Negro
$pdf->SetLineWidth(0.3); // Ancho de línea
$pdf->Rect(20, 100, 170, 10);
$pdf->Line(40, 95, 40, 85); // Coordenadas: (x1, y1, x2, y2) LINEA

// Agregar texto 'NOMBRE' en el centro del recuadro
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetTextColor(0, 0, 0); // Negro
$pdf->SetXY(10, 10);
$pdf->Cell(38, 185, 'NOMBRE', 0, 0, 'C');
$pdf->SetLineWidth(0.3); // Ancho de la línea
$pdf->Line(105, 110, 105, 100); // Coordenadas: (x1, y1, x2, y2) LINEA

$pdf->SetFont('Arial', 'B', 15);
$pdf->SetTextColor(0, 0, 0); // Negro
$pdf->SetXY(10, 10);
$pdf->Cell(105, 193, 'CLAUDIO GALLEGO VARGAS', 0, 0, 'C');

// Agregar texto 'NO DE LICENCIA' en el centro del recuadro
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetTextColor(0, 0, 0); // Negro
$pdf->SetXY(10, 10);
$pdf->Cell(220, 185, 'NO.LICENCIA', 0, 0, 'C');
$pdf->SetLineWidth(0.3); // Ancho de la línea
$pdf->Line(140, 110, 140, 100); // Coordenadas: (x1, y1, x2, y2) LINEA


$pdf->SetFont('Arial', 'B', 15);
$pdf->SetTextColor(0, 0, 0); // Negro
$pdf->SetXY(10, 10);
$pdf->Cell(225, 193, 'BA154433', 0, 0, 'C');

// Agregar texto 'TIPO' en el centro del recuadro
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetTextColor(0, 0, 0); // Negro
$pdf->SetXY(10, 10);
$pdf->Cell(350, 185, 'TIPO', 0, 0, 'C');
$pdf->SetLineWidth(0.3); // Ancho de la línea
$pdf->Line(180, 110, 180, 100); // Coordenadas: (x1, y1, x2, y2) LINEA

$pdf->SetFont('Arial', 'B', 15);
$pdf->SetTextColor(0, 0, 0); // Negro
$pdf->SetXY(10, 10);
$pdf->Cell(350, 193, 'A', 0, 0, 'C');

// Agregar texto 'TIPO' en el centro del recuadro
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetTextColor(0, 0, 0); // Negro
$pdf->SetXY(10, 10);
$pdf->Cell(295, 185, 'FECHA EXPEDICION ', 0, 0, 'C');
$pdf->SetLineWidth(0.3); // Ancho de la línea
$pdf->Line(180, 110, 180, 100); // Coordenadas: (x1, y1, x2, y2) LINEA

$pdf->SetFont('Arial', 'B', 15);
$pdf->SetTextColor(0, 0, 0); // Negro
$pdf->SetXY(10, 10);
$pdf->Cell(285, 193, '2025', 0, 0, 'C');

$pdf->Output();
?>
