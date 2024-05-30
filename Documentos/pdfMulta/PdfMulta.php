<?php
//OBTENER LOS DATOS DESDE LA VISTA
$id=$_POST['id'];
include ("Controlador.php");

$Con = Conectar();
$SQL = "SELECT * FROM v_datosmulta WHERE Folio = 6";
$ResultSet = Ejecutar($Con, $SQL);
$Fila = mysqli_fetch_row($ResultSet);
Desconectar($Con);


require('fpdf.php');
$pdf = new FPDF('p','mm',array(116,316));
$pdf->AddPage();

$pdf->Image('poderEjecutivo.jpeg', 3, 3, 16.7);

// Establecer color de fondo negro
$pdf->SetFillColor(0); // Negro
// Establecer color de texto blanco
$pdf->SetTextColor(255); // Blanco
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(19.7, 4);
// Dibujar celda rellena de negro
$pdf->Cell(93,11,'  SECRETARIA DE SEGURIDAD CIUDADANA', 1, 1, 'L', true);

$pdf->SetFont('Arial','',9.5);
$pdf->SetXY(19.7, 11);
$pdf->Cell(93,10,'  SUBSECRETARIA DE POLICIA ESTATAL', 1, 1, 'L', true);


$pdf->SetFillColor(255); // Color de fondo predeterminado (blanco)
// Restablecer color de texto por defecto
$pdf->SetTextColor(0); // Color de texto predeterminado (negro)


$pdf->SetFont('Arial','',6);
$pdf->SetXY(3, 19);
$pdf->Cell(93,10,'Con fundamento en los articulos 31 fraccion II de la Ley de Transito para el Estado de Queretaro 6 fraccion II, inciso', 0, 1, 'L');
$pdf->SetXY(3, 21);
$pdf->Cell(93,10.9,'g) del  Reglamento de la Ley de Transito para el Estado de Queretaro, se emite la presente boleta de infraccion:', 0, 1, 'L');

//Margen formulario 
$pdf->SetAutoPageBreak(false);
$pdf->SetFont('Arial','B',6);
$pdf->SetXY(3.2, 30.5);
$pdf->Cell(110,282,'', 1, 1, 'L');


//---------------Bloque 0----------------
$pdf->SetFillColor(220); // Gris claro
$pdf->SetXY(5.5, 33);
$pdf->Cell(20, 3.5,'Anio', 1, 1, 'R', true); // El último parámetro 'true' activa el relleno
$pdf->SetXY(25.5, 33);
$pdf->Cell(10, 3.5,'Mes', 1, 1, 'L', true);
$pdf->SetXY(35.5, 33);
$pdf->Cell(10, 3.5,'Dia', 1, 1, 'L', true);
$pdf->SetXY(45.5, 33);
$pdf->Cell(28, 3.5,'Hora', 1, 1, 'L', true);
$pdf->SetXY(73.5, 33);
$pdf->Cell(37.7, 3.5,'Folio', 1, 1, 'L', true);

$pdf->SetFont('Arial','',8);
$pdf->SetXY(5.5, 36.6); 
$pdf->Cell(40, 8,'', 1, 1, 'L'); 
$pdf->SetXY(45.5, 36.6);
$pdf->Cell(28, 8, $Fila[0], 1, 1, 'C'); //Hora SI
$pdf->SetXY(5.5, 44.6);
$pdf->Cell(68, 8, $Fila[3], 1, 1, 'L'); //Reporte de seccion SI

$pdf->SetFont('Arial', 'B', 13);
$pdf->SetXY(73.5, 36.6);
$pdf->SetTextColor(255, 0, 0); 
$pdf->Cell(37.7, 16, $Fila[1], 1, 1, 'C'); // Folio SI
$pdf->SetTextColor(0);

$pdf->SetFont('Arial','',8);
$pdf->SetXY(22.5, 36.6); 
$pdf->Cell(40, 8, '2024/03/19', 0, 1, 'L'); //Fecha SI

$pdf->SetFont('Arial','',4.7);
$pdf->SetXY(5.8, 44.7); 
$pdf->Cell(10, 2,'Reporte de Secion II:', 0, 1, 'L'); 

//-----------------Bloque 1-Ubicacion-----------------
$pdf->SetFont('Arial','B',6);
$pdf->SetXY(5.5, 54.5);
$pdf->Cell(4, 3.5,'1. ', 1, 1, 'L', true);
$pdf->SetXY(9.5, 54.5);
$pdf->Cell(101.8, 3.5,'Ubicacion', 1, 1, 'L', true); 

$pdf->SetFont('Arial','',8);
$pdf->SetXY(5.5, 58.1);
$pdf->Cell(45, 8, $Fila[3], 'BL', 1, 'L');//Nombre de la via SI
$pdf->SetXY(50.5, 58.1);
$pdf->Cell(27.9, 8, $Fila[4], 'B', 1, 'L');//Kilometro o numero SI
$pdf->SetXY(78.5, 58.1);
$pdf->Cell(32.8, 8, $Fila[3], 'BR', 1, 'C');//Direccion o sentido
$pdf->SetXY(5.5, 66.1);
$pdf->Cell(72.8, 8, $Fila[6], 'BL', 1, 'L');//Referencia del lugar
$pdf->SetXY(78.5, 66.1);
$pdf->Cell(32.8, 8, $Fila[7], 'BR', 1, 'L');//Municipio NO (Debe ser el municipio propio de la multa AGERGAR A MULTA y no de la direccion)

$pdf->SetFont('Arial','',4.7);
$pdf->SetXY(5.5, 58.1); 
$pdf->Cell(10, 2,'Nombre de la via', 0, 1, 'L'); 
$pdf->SetXY(50.5, 58.1); 
$pdf->Cell(10, 2,'Kilometro o numero', 'L', 1, 'L'); 
$pdf->SetXY(78.5, 58.1); 
$pdf->Cell(10, 2,'Direccion o sentido', 'L', 1, 'L'); 
$pdf->SetXY(5.5, 66.1); 
$pdf->Cell(10, 2,'Referencia del lugar', 'L', 1, 'L'); 
$pdf->SetXY(78.5, 66.1); 
$pdf->Cell(10, 2,'Municipio', 'L', 1, 'L'); 

//-------------------Bloque 2-Conductor-----------------
$pdf->SetFont('Arial','B',6);
$pdf->SetXY(5.5, 76.2);
$pdf->Cell(4, 3.5,'2. ', 1, 1, 'L', true);
$pdf->SetXY(9.5, 76.2);
$pdf->Cell(101.8, 3.5,'Conductor', 1, 1, 'L', true);
$pdf->SetFont('Arial','B',5);
$pdf->SetXY(77, 87.8);
$pdf->Cell(34.3, 3,'Fecha de vencimiento (aa/mm/dd)', 1, 1, 'L', true); 

$pdf->SetFont('Arial','',8);
$pdf->SetXY(5.5, 79.8);
$pdf->Cell(52.5, 8, 'Uzziel Yered', 'BL', 1, 'L');//Nombre (s) (SI enlazar con la tabla conductores)
$pdf->SetXY(58.1, 79.8);
$pdf->Cell(19, 8, 'M', 'BR', 1, 'C');//Sexo (SI en la tabla conductores)
$pdf->SetXY(77.3, 79.8);
$pdf->Cell(34, 8, $Fila[11], 'BR', 1, 'L');//Numero de licencia (SI TABLA LICENCIAS)
$pdf->SetXY(5.5, 88);
$pdf->Cell(71.5, 8, 'Balderas', 'BLR',1, 'L');//Apellido Paterno (SI en la tabla conductores)
$pdf->SetXY(77.1, 90);
$pdf->Cell(34.2, 6, $Fila[9], 'BR', 1, 'C');//Fecha de vencimiento ()
$pdf->SetXY(5.5, 96.2);
$pdf->Cell(71.5, 8, 'Vargas', 'BLR', 1, 'L');//Apellido Materno (SI TABLA CONDUCTORES)
$pdf->SetXY(77.2, 96.2);
$pdf->Cell(34.1, 8, 'QRO', 'BR', 1, 'C');//Estado de procedencia (SI TABLA PROCEDENCIA)
$pdf->SetXY(5.5, 104.4);
$pdf->Cell(71.5, 8, $Fila[3], 'BLR', 1, 'L');//Calle (SI TABLA DIRECCIONES)
$pdf->SetXY(45.8, 104.4);
$pdf->Cell(18.5, 8, $Fila[10], '0', 1, 'L');//Numero (SI TABLA DIRECCIONES)
$pdf->SetXY(5.5, 112.6);
$pdf->Cell(71.5, 8, $Fila[7], 'BLR', 1, 'L');//Municipio (SI TABLA DIRECCIONES)
$pdf->SetXY(40.8, 112.6);
$pdf->Cell(18.5, 8, $Fila[01], '0', 1, 'L');//Localidad (SI TABLA DIRECCIONES)
$pdf->SetXY(94.3, 104.4);
$pdf->Cell(17, 16.2, $Fila[12], 'BR', 1, 'C');//Tipo (SI TABLA TARJETAS = TIPOSERVICIO)
$pdf->SetFont('Arial','',7);
$pdf->SetXY(77.2, 104.4);
$pdf->Cell(17, 16.2, $Fila[9], 'BR', 1, 'C');//Clasificacion (conductor) (SI TABLA LICENCIA)

$pdf->SetFont('Arial','',4.7);
$pdf->SetXY(5.5, 79.8); 
$pdf->Cell(10, 2,'Nombre (s)', 0, 1, 'L'); 
$pdf->SetXY(58.1, 79.8); 
$pdf->Cell(10, 2,'Sexo', 'L', 1, 'L'); 
$pdf->SetXY(77.3, 79.8); 
$pdf->Cell(10, 2,'Numero de licencia', 0, 1, 'L');
$pdf->SetXY(5.5, 88); 
$pdf->Cell(10, 2,'Apellido paterno', 0, 1, 'L');
$pdf->SetXY(5.5, 96.2); 
$pdf->Cell(10, 2,'Apellido materno', 0, 1, 'L');
$pdf->SetXY(5.5, 104.4); 
$pdf->Cell(10, 2,'Domicilio', 0, 1, 'L');
$pdf->SetXY(77.2, 96.2); 
$pdf->Cell(10, 2,'Estado de procedencia', 0, 1, 'L');
$pdf->SetXY(94.3, 104.4); 
$pdf->Cell(10, 2,'Tipo', 0, 1, 'L');
$pdf->SetXY(77.2, 104.4); 
$pdf->Cell(10, 2,'Clasificacion', 0, 1, 'L');

//--------------Bloque 3 Vehiculo-------------------
$pdf->SetFont('Arial','B',6);
$pdf->SetXY(5.5, 122.8);
$pdf->Cell(4, 3.5,'3. ', 1, 1, 'L', true);
$pdf->SetXY(9.5, 122.8);
$pdf->Cell(101.8, 3.5,'Vehiculo', 1, 1, 'L', true);

$pdf->SetFont('Arial','',8);
$pdf->SetXY(5.5, 126.5);
$pdf->Cell(36, 8, $Fila[06], 'BL', 1, 'L');//Tipo (vehiculo) (SI TABLA VEHICULOS)
$pdf->SetXY(41.7, 126.5);
$pdf->Cell(34, 8, $Fila[15], 'B', 1, 'L');//Marca (SI TABLA VEHICULOS)
$pdf->SetXY(75.9, 126.5);
$pdf->Cell(35.4, 8, $Fila[16], 'BR', 1, 'L');//Linea (SI TABLA VEHICULOS)
$pdf->SetXY(5.5, 134.7);
$pdf->Cell(27, 8, $Fila[17], 'BL', 1, 'L');//Año (SI TABLA VEHICULOS)
$pdf->SetXY(32.7, 134.7);
$pdf->Cell(23, 8, $Fila[18], 'B', 1, 'L');//Color (SI TABLA VEHICULOS)
$pdf->SetXY(55.9, 134.7);
$pdf->Cell(32, 8, $Fila[19], 'BR', 1, 'L');//Numero tarjeta circulacion (SI TABLA TARJETAS)
$pdf->SetXY(5.5, 142.9);
$pdf->Cell(21, 8, $Fila[04], 'BL', 1, 'L');//Numero de placas (SI TABLA TARJETAS)
$pdf->SetXY(26.7, 142.9);
$pdf->Cell(36, 8, $Fila[19], 'B', 1, 'L');//No. de serie del vehciulo (SI TABLA VEHICULOS)
$pdf->SetXY(62.9, 142.9);
$pdf->Cell(25, 8, $Fila[20], 'BR', 1, 'L');//Estado de procedencia (SI TABLA VEHICULOS)
$pdf->SetXY(88.1, 134.7);
$pdf->Cell(23.2, 16.2, $Fila[9], 'BR', 1, 'C');//Servicio (SI TABLA TARJETAS)

$pdf->SetFont('Arial','',4.7);
$pdf->SetXY(5.5, 126.5); 
$pdf->Cell(10, 2,'Tipo', 0, 1, 'L');
$pdf->SetXY(41.7, 126.5); 
$pdf->Cell(10, 2,'Marca', 'L', 1, 'L');
$pdf->SetXY(75.9, 126.5); 
$pdf->Cell(10, 2,'Linea', 'L', 1, 'L');
$pdf->SetXY(5.5, 134.7); 
$pdf->Cell(10, 2,'Anio', 0, 1, 'L');
$pdf->SetXY(32.7, 134.7); 
$pdf->Cell(10, 2,'Color', 'L', 1, 'L');
$pdf->SetXY(55.9, 134.7); 
$pdf->Cell(10, 2,'Numero de tarjeta de circulacion', 'L', 1, 'L');
$pdf->SetXY(5.5, 142.9); 
$pdf->Cell(10, 2,'Numero de placas', 0, 1, 'L');
$pdf->SetXY(26.7, 142.9); 
$pdf->Cell(10, 2,'No. de serie del vehiculo', 'L', 1, 'L');
$pdf->SetXY(62.9, 142.9); 
$pdf->Cell(10, 2,'Estado de procedencia', 'L', 1, 'L');
$pdf->SetXY(88.1, 134.7); 
$pdf->Cell(10, 2,'Servicio', 0, 1, 'L');


//-------------------Bloque 4 Fundamentacion y Motivacion--------------------
$pdf->SetFont('Arial','B',6);
$pdf->SetXY(5.5, 153);
$pdf->Cell(4, 3.5,'4. ', 1, 1, 'L', true);
$pdf->SetXY(9.5, 153);
$pdf->Cell(101.8, 3.5,'Fundamentacion y Motivacion', 1, 1, 'L', true);

$pdf->SetFont('Arial','',7);
$pdf->SetXY(5.5, 156.7);
$pdf->Cell(105.8, 25, '', 'BLR', 1, 'L');
$pdf->SetXY(5.5, 156);
$pdf->Cell(105.8, 8, 'Con fundamento en (los) articulo(s)', '0', 1, 'L');
$pdf->SetXY(46.4, 157.5);
$pdf->Cell(9.8, 4, $Fila[2], 'B', 1, 'C');//Fundamento articulo SI
$pdf->SetXY(56.5, 156);
$pdf->Cell(105.8, 8, 'del Reglamento de la Ley de Transito para el', '0', 1, 'L');
$pdf->SetXY(5.5, 159);
$pdf->Cell(105.8, 8, 'Estado de Queretaro:', '0', 1, 'L');

$pdf->SetAutoPageBreak(true);
$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(5.5, 164.7);
$pdf->MultiCell(105.8, 6, 'Luz roja', 0 , 'L');//Motivo
$pdf->SetAutoPageBreak(false);

//-------------------Bloque 5 Garantia retenida--------------------
$pdf->SetFont('Arial','B',6);
$pdf->SetXY(5.5, 184);
$pdf->Cell(4, 3.5,'5. ', 1, 1, 'L', true);
$pdf->SetXY(9.5, 184);
$pdf->Cell(101.8, 3.5,'Garantia retenida', 1, 1, 'L', true);

$pdf->SetFont('Arial','',6.4);
$pdf->SetXY(5.3, 188.5);
$pdf->Cell(101.8, 3.5,'Con fundamento en el articulo 31, fraccciones V y VI de la Ley de Transito para el Estado de Queretaro,', 0, 1, 'L');
$pdf->SetXY(5.3, 191.3);
$pdf->Cell(101.8, 3.5,'asi como 6, fraccion II, inciso k) del Reglamento de la Ley de Transito para el Estado de Queretaro, se', 0, 1, 'L');
$pdf->SetXY(5.3, 194.1);
$pdf->Cell(101.8, 3.5,'retiene la garantia: ', 0, 1, 'L');

$pdf->SetFont('Arial','',8);
$pdf->SetXY(5.5, 187.7);
$pdf->Cell(105.8, 16, '', 'BLR', 1, 'L');
$pdf->SetXY(5.5, 190.9);
$pdf->Cell(105.8, 16, '6 meses', 0, 1, 'C');//Garantia retenida SI

//------------------Bloque 6 Hecho de transito-------------------------
$pdf->SetFont('Arial','B',6);
$pdf->SetXY(5.5, 206);
$pdf->Cell(4, 3.5,'6. ', 1, 1, 'L', true);
$pdf->SetXY(9.5, 206);
$pdf->Cell(101.8, 3.5,'Hecho de transito', 1, 1, 'L', true);

$pdf->SetFont('Arial','',8);
$pdf->SetXY(5.5, 209.7);
$pdf->Cell(105.8, 10, '', 'BLR', 1, 'L');
$pdf->SetXY(5.5, 209.7);
$pdf->Cell(22, 10, $Fila[9], 0, 1, 'L');//No. del Parte de Accidente (NO AÑADIR A MULTAS)
$pdf->SetXY(27.5, 209.7);
$pdf->Cell(22, 10, $Fila[00], 0, 1, 'L');//Convenio (NO AÑADIR A MULTAS)
$pdf->SetXY(49.5, 209.7);
$pdf->Cell(22, 10, $Fila[01], 0, 1, 'L');//Puesto a disposicion (NO AÑADIR A MULTAS)
$pdf->SetXY(71.5, 209.7);
$pdf->Cell(39, 10, $Fila[02], 0, 1, 'L');//Deposito oficial (NO AÑADIR A MULTAS)

$pdf->SetFont('Arial','',4.7);
$pdf->SetXY(5.5, 209.7); 
$pdf->Cell(10, 2,'No. del Parte del Accidente', 0, 1, 'L'); 
$pdf->SetXY(27.5, 209.7); 
$pdf->Cell(10, 2,'Convenio', 'L', 1, 'L'); 
$pdf->SetXY(49.5, 209.7); 
$pdf->Cell(10, 2,'Puesto a disposicion', 'L', 1, 'L'); 
$pdf->SetXY(71.5, 209.7); 
$pdf->Cell(10, 2,'Deposito oficial', 'L', 1, 'L'); 


//------------------Bloque 7 Datos del Personal Opertaivo-------------------------
$pdf->SetFont('Arial','B',6);
$pdf->SetXY(5.5, 222.1);
$pdf->Cell(4, 3.5,'7. ', 1, 1, 'L', true);
$pdf->SetXY(9.5, 222.1);
$pdf->Cell(101.8, 3.5,'Datos del Personal Operativo', 1, 1, 'L', true);

$pdf->SetFont('Arial','',8);
$pdf->SetXY(5.5, 225.8);
$pdf->Cell(62.5, 8, $Fila[22], 'BL', 1, 'L');//Nombre Agente (SI TABLA AGENTES)
$pdf->SetXY(5.5, 234);
$pdf->Cell(62.5, 8, 'Bornos', 'BL', 1, 'L');//Apellidos Agente (SI TABLA AGENTES)
$pdf->SetXY(5.5, 242.2);
$pdf->Cell(62.5, 8, $Fila[24], 'BL', 1, 'L');//Grupo, Region o Asignacion (SI TABLA AGENTES)
$pdf->SetXY(68.2, 225.8);
$pdf->Cell(43.1, 8, $Fila[23], 'BLR', 1, 'C');//ID Agente (SI TABLA AGENTES)
$pdf->SetXY(68.2, 234);
$pdf->Cell(43.1, 16.2, '', 'BLR', 1, 'L');
//-------->Aqui falta agregar para insertar la imagen de la firma

$pdf->SetFont('Arial','',4.7);
$pdf->SetXY(5.5, 225.8); 
$pdf->Cell(10, 2,'Nombre (s)', 0, 1, 'L'); 
$pdf->SetXY(5.5, 234); 
$pdf->Cell(10, 2,'Apellidos', 0, 1, 'L');
$pdf->SetXY(5.5, 242.2); 
$pdf->Cell(10, 2,'Grupo, Region o asignacion', 0, 1, 'L'); 
$pdf->SetXY(68.2, 225.8); 
$pdf->Cell(10, 2,'Numero de ID', 0, 1, 'L'); 
$pdf->SetXY(68.2, 234); 
$pdf->Cell(10, 2,'Firma', 0, 1, 'L'); 


//----------------Bloque 8 Observaciones del Personal Operativo------------------
$pdf->SetFont('Arial','B',6);
$pdf->SetXY(5.5, 252.5);
$pdf->Cell(4, 3.5,'8. ', 1, 1, 'L', true);
$pdf->SetXY(9.5, 252.5);
$pdf->Cell(101.8, 3.5,'Observaciones del Personal Operativo', 1, 1, 'L', true);

$pdf->SetFont('Arial','',8);
$pdf->SetXY(5.5, 256.2);
$pdf->Cell(105.8, 19, '', 'BLR', 1, 'L');

$pdf->SetAutoPageBreak(true);
$pdf->SetXY(5.5, 256.2);
$pdf->MultiCell(105.8, 6, 'Salio a exeso de velociada', 0 , 'L');//ObservacionesPersonal SI
$pdf->SetAutoPageBreak(false);


//-----------------Bloque 9 Calificacion de la boleta--------------------------
$pdf->SetFont('Arial','B',6);
$pdf->SetXY(5.5, 277.5);
$pdf->Cell(4, 3.5,'9. ', 1, 1, 'L', true);
$pdf->SetXY(9.5, 277.5);
$pdf->Cell(101.8, 3.5,'Calificacion de la boleta de infraccion', 1, 1, 'L', true);

$pdf->SetFont('Arial','',8);
$pdf->SetXY(5.5, 281.2);
$pdf->Cell(105.8, 12, '', 'BLR', 1, 'L');
$pdf->SetAutoPageBreak(true);
$pdf->SetXY(5.5, 281.2);
$pdf->MultiCell(105.8, 6, $Fila[0], 0 , 'L');//Calificacion de la Boleta SI
$pdf->SetXY(5.5, 281.2);
$pdf->Cell(105.8, 6, '', 'B', 0 , 'L');
$pdf->SetAutoPageBreak(false);


//-----------------Bloque 10 Observaciones del Conductor--------------------------
$pdf->SetFont('Arial','B',6);
$pdf->SetXY(5.5, 295.2);
$pdf->Cell(4, 3.5,'10. ', 1, 1, 'L', true);
$pdf->SetXY(9.5, 295.2);
$pdf->Cell(101.8, 3.5,'Observaciones del conductor', 1, 1, 'L', true);

$pdf->SetFont('Arial','',8);
$pdf->SetXY(5.5, 298.9);
$pdf->Cell(105.8, 12, '', 'BLR', 1, 'L');
$pdf->SetAutoPageBreak(true);
$pdf->SetXY(5.5, 299.2);
$pdf->MultiCell(105.8, 6, 'Primera flata es pero que se al ', 0 , 'L');//Observaciones del conductor (NO AGREGAR A MULTAS OBSERVACIONES CONDUCTOR)
$pdf->SetXY(5.5, 299.2);
$pdf->Cell(105.8, 6, '', 'B', 0 , 'L');
$pdf->SetAutoPageBreak(false);





$pdf->Output();


?>