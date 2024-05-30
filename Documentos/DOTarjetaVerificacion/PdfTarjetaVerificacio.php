<?php
$id=$_POST['id'];

require('fpdf.php');
include("../../Controlador.php");
$Con=Conectar();
$SQL = "SELECT * FROM V_DatosTarjetaVerificacion WHERE Folio=$id";
$ResulSet=Ejecutar($Con, $SQL);
$Fila=mysqli_fetch_row($ResulSet);
Desconectar($Con);

    $pdf = new FPDF('L', 'mm', array(180, 75));
    $pdf->AddPage();

    $pdf->SetFillColor(239, 194, 220); 
    $pdf->Rect(0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight(), 'F');

    $pdf->Image('Ejecutivo.jpeg', 3,3,15,5);
    $pdf->Image('Juntos.jpeg', 20,3,15,5);

    $pdf->SetFont('Arial','B',6);
    $pdf->SetXY(60,0);
    $pdf->Cell(80, 10,'PROGRAMA ESTATAL DE VERIFICACION VEHICULAR');

    $pdf->SetXY(63,2);
    $pdf->Cell(80, 10,'PODER EJECUTIVO DEL ESTADO DE QUERETARO'); 

    $pdf->Image('BarCode.png', 130,3,40,6);

    $pdf->SetFont('Arial','',5);
    $pdf->SetXY(144,5);
    $pdf->Cell(80, 10,$Fila[10]); 

    $pdf->Image('QR.png', 110,18,15,15);

    $pdf->SetFont('Arial','',4);
    $pdf->SetXY(115,10);
    $pdf->Cell(80, 10,'Vigencia: Hasta Enero / Febrero del 2024');

    $pdf->Rect(3, 16.5, 100, 0.1, 'F');

    $pdf->SetFont('Arial','B',4);
    $pdf->SetXY(2,8);
    $pdf->Cell(80, 10,'DATOS DEL VEHICULO');

    $pdf->SetFont('Arial','',4);
    $pdf->SetXY(2,10.5);
    $pdf->Cell(80, 10,'T. de Pasaje Particular');

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(2,12.5);
    $pdf->Cell(80, 10,'TIPO DE SERVICIO');

    $pdf->SetFont('Arial','',4);
    $pdf->SetXY(25,10.5);
    $pdf->Cell(80, 10,$Fila[31]);

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(25,12.5);
    $pdf->Cell(80, 10,'MARCA');

    $pdf->SetFont('Arial','',4);
    $pdf->SetXY(40,10.5);
    $pdf->Cell(80, 10,$Fila[32]);

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(40,12.5);
    $pdf->Cell(80, 10,'SUBMARCA');

    $pdf->SetFont('Arial','',4);
    $pdf->SetXY(60,10.5);
    $pdf->Cell(80, 10,$Fila[15]);

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(60,12.5);
    $pdf->Cell(80, 10,'ANO/MODELO');

    $pdf->SetFont('Arial','',4);
    $pdf->SetXY(85,10.5);
    $pdf->Cell(80, 10,$Fila[33]);

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(85,12.5);
    $pdf->Cell(80, 10,'PLACAS');

    $pdf->Rect(3, 21, 100, 0.1, 'F');

    $pdf->SetFont('Arial','',4);
    $pdf->SetXY(2,15);
    $pdf->Cell(80, 10,$Fila[16]);

    $pdf->SetFont('Arial','',4);
    $pdf->SetXY(25,15);
    $pdf->Cell(80, 10,$Fila[12]);

    $pdf->SetFont('Arial','',4);
    $pdf->SetXY(40,15);
    $pdf->Cell(80, 10,'Gasolina');

    $pdf->SetFont('Arial','',4);
    $pdf->SetXY(40,15);
    $pdf->Cell(80, 10,'Gasolina');

    $pdf->SetFont('Arial','',4);
    $pdf->SetXY(60,15);
    $pdf->Cell(80, 10,$Fila[27]);

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(2,17);
    $pdf->Cell(80, 10,'NUMERO DE SERIE');

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(25,17);
    $pdf->Cell(80, 10,'CLASE');

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(40,17);
    $pdf->Cell(80, 10,'TIPO DE COMBUSTIBLE');

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(60,17);
    $pdf->Cell(80, 10,'No. IDENTIFICACION VEHICULAR(NIV)');

    $pdf->Rect(3, 25.5, 100, 0.1, 'F');

    $pdf->SetFont('Arial','',4);
    $pdf->SetXY(2,19.5);
    $pdf->Cell(80, 10,$Fila[21]);

    $pdf->SetFont('Arial','',4);
    $pdf->SetXY(25,19.5);
    $pdf->Cell(80, 10,$Fila[18]);

    $pdf->SetFont('Arial','',4);
    $pdf->SetXY(40,19.5);
    $pdf->Cell(80, 10,$Fila[29]);

    $pdf->SetFont('Arial','',4);
    $pdf->SetXY(60,19.5);
    $pdf->Cell(80, 10,$Fila[28]);

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(2,21.5);
    $pdf->Cell(80, 10,'NUMERO DE CILINDROS');

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(25,21.5);
    $pdf->Cell(80, 10,'TIPO DE CARROCERIA');

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(40,21.5);
    $pdf->Cell(80, 10,'ENTIDAD FEDERATIVA');

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(60,21.5);
    $pdf->Cell(80, 10,'MUNICIPIO');

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(2,28);
    $pdf->Cell(80, 10,'No. DE CENTRO');

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(2,30);
    $pdf->Cell(80, 10,'No. DE LINEA DE VERIFICACION');

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(2,32);
    $pdf->Cell(80, 10,'TECNICO VERIFICADOR');

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(2,34);
    $pdf->Cell(80, 10,'FECHA DE EXPEDICION');

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(2,36);
    $pdf->Cell(80, 10,'HORA DE ENTRADA');

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(2,38);
    $pdf->Cell(80, 10,'HORA DE SALIDA');

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(2,40);
    $pdf->Cell(80, 10,'MOTIVO DE VERIFICACION');

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(2,42);
    $pdf->Cell(80, 10,'FOLIO DE CERTIFICADO');

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(2,44);
    $pdf->Cell(75, 10,'SEMESTRE');

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(25,28);
    $pdf->Cell(80, 10,$Fila[11]);

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(25,30);
    $pdf->Cell(80, 10,$Fila[2]);

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(25,32);
    $pdf->Cell(80, 10,$Fila[3]);

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(25,34);
    $pdf->Cell(80, 10,$Fila[4]);

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(25,36);
    $pdf->Cell(80, 10,$Fila[5]);

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(25,38);
    $pdf->Cell(80, 10,$Fila[6]);

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(25,40);
    $pdf->Cell(80, 10,$Fila[7]);

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(25,42);
    $pdf->Cell(80, 10,$Fila[8]);

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(25,44);
    $pdf->Cell(75, 10,$Fila[9]);

    $pdf->SetFont('Arial','',4);
    $pdf->SetXY(75,34);
    $pdf->Cell(80, 10,'Vehiculo analizado por el');

    $pdf->SetFont('Arial','',4);
    $pdf->SetXY(75,36);
    $pdf->Cell(80, 10,'metodo SDB con folio');

    $pdf->SetFont('Arial','',4);
    $pdf->SetXY(75,38);
    $pdf->Cell(80, 10,'de prueba: 3202728');

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(105,30);
    $pdf->Cell(80, 10,'Mammillaria herrerae');

    $pdf->SetFont('Arial','',3);
    $pdf->SetXY(104,31);
    $pdf->Cell(80, 10,'Emblema de Biodiversidad de Queretaro');

    $pdf->SetTextColor(221, 40, 161);
    $pdf->SetFont('Arial','B',15);
    $pdf->SetXY(150,40);
    $pdf->Cell(80, 10,'DOS');
    $pdf->SetTextColor(0);

    $pdf->SetFont('Arial','B',6);
    $pdf->SetXY(120,44);
    $pdf->Cell(80, 10,'CENTRO DE VERIFICACION VEHICULAR');

    $Folio = $Fila[0];
    $ruta = "./pdfGenerados/$Folio.pdf";
    
    // Guarda el archivo en la ruta especificada
    $pdf->Output();
    $pdf->Output('F', $ruta);

    $Manejador = fopen("./xmlGenerados/$Folio.xml", "w+");
    fwrite($Manejador, "Datos de Tarjeta de Verificacion\n");
    fwrite($Manejador, "Folio:$Fila[0]\n"); 
    fwrite($Manejador, "Vehiculo:$Fila[1]\n");
    fwrite($Manejador, "LineaVerificacion:$Fila[2]\n");
    fwrite($Manejador, "TecnicoVerificador:$Fila[3]\n");
    fwrite($Manejador, "FechaExpedicion:$Fila[4]\n");
    fwrite($Manejador, "Hora de Entrada:$Fila[5]\n");
    fwrite($Manejador, "Hora de salida:$Fila[6]\n");
    fwrite($Manejador, "Motivo:$Fila[7]\n");
    fwrite($Manejador, "Folio Certificado:$Fila[8]\n");
    fwrite($Manejador, "Semestre:$Fila[9]\n");
    fwrite($Manejador, "Codigo Barras:$Fila[10]\n");
    fwrite($Manejador, "NumeroCentro:$Fila[11]\n");
    fwrite($Manejador, "Clase:$Fila[12]\n");
    fwrite($Manejador, "TipoServicio:$Fila[13]\n");
    fwrite($Manejador, "Uso:$Fila[14]\n");
    fwrite($Manejador, "Anio:$Fila[15]\n");
    fwrite($Manejador, "NoSerie:$Fila[16]\n");
    fwrite($Manejador, "EstadoProcedencia:$Fila[17]\n");
    fwrite($Manejador, "TipoCarroceria:$Fila[18]\n");
    fwrite($Manejador, "Origen:$Fila[19]\n");
    fwrite($Manejador, "Color:$Fila[20]\n");
    fwrite($Manejador, "Cilindraje:$Fila[21]\n");
    fwrite($Manejador, "Capacidad:$Fila[22]\n");
    fwrite($Manejador, "NoPuerta:$Fila[23]\n");
    fwrite($Manejador, "NoAsiento:$Fila[24]\n");
    fwrite($Manejador, "Combustible:$Fila[25]\n");
    fwrite($Manejador, "Transmision:$Fila[26]\n");
    fwrite($Manejador, "NIV:$Fila[27]\n");
    fwrite($Manejador, "Municipio:$Fila[28]\n");
    fwrite($Manejador, "Entidad:$Fila[29]\n");
    fwrite($Manejador, "Nombre:$Fila[30]\n");
    fwrite($Manejador, "Marca:$Fila[31]\n");
    fwrite($Manejador, "Sublinea:$Fila[32]\n");
    fwrite($Manejador, "Placa:$Fila[33]\n");
    
    fclose($Manejador);
    
?>