<?php

    // Recepción de los datos
    $Folio=$_GET['Folio']; //De esta manera se recibe una variable del formulario de HTML
    $Vehiculo=$_GET['Vehiculo']; 
    $NumeroLinea=$_GET['Numer_Linea_Verificacion'];
    $TenicoVerificador=$_GET['Tecnico_Verificador']; 
    $FechaExpedicion=$_GET['Fecha_Expedicion']; 
    $HoraEntrada=$_GET['Hora_Entrada']; 
    $HoraSalida=$_GET['Hora_Salida'];
    $Motivo=$_GET['Motivo'];  
    $FolioCertificado=$_GET['Folio_Certificado']; 
    $Semestre=$_GET['Semestre']; 
    $CodigoBarras=$_GET['Codigo_Barras'];
    $NumeroCentro=$_GET['Numero_Centro'];  


    //Imprimir
    print("Folio=" . $Folio . "<br>");
    print("Vehiculo=" . $Vehiculo . "<br>");
    print("Numero de Linea=" . $NumeroLinea . "<br>");
    print("Tecnico Verificador=" . $TenicoVerificador . "<br>");
    print("Fecha Expedicion=" . $FechaExpedicion . "<br>");
    print("Hora Entrada=" . $HoraEntrada . "<br>");
    print("Hora Salida=" . $HoraSalida . "<br>");
    print("Motivo=" . $Motivo . "<br>");
    print("Folio Certificado=" . $FolioCertificado . "<br>");
    print("Semestre=" . $Semestre . "<br>");
    print("Codigo de Barras=" . $CodigoBarras . "<br>");
    print("Numero de centro=" . $NumeroCentro . "<br>");

    // Formar la instrucción SQL -  se van a ocupar las variables anteriores
    $SQL="INSERT INTO Verificaciones (Folio,Vehiculo, NumerLineaVerificacion, TecnicoVerificador, FechaExpedicion, HoraEntrada, HoraSalida, Motivo, FolioCertificado, Semestre, CodigoBarras, NumeroCentro)  VALUES (NULL,'$Vehiculo', '$NumeroLinea', '$TenicoVerificador', '$FechaExpedicion', '$HoraEntrada', '$HoraSalida', '$Motivo', '$FolioCertificado', '$Semestre', '$CodigoBarras', '$NumeroCentro')";
    print($SQL);

    //CONECTAR CON BASE DE DATOS
    include("Controlador.php"); 
    $Con=Conectar(); //Paso 1 y 2 -- obtención del objeto MySQL -. Conectar al SMBD
    $ResultSet=Ejecutar($Con, $SQL); //Paso 3  --  el primer parametro es el resultado de la función anterior -- Ejecutar consulta -- Devuelve 1 si se hizo la inserción
    $Resultato=Desconectar($Con);//Paso 5 -- cerrar la conexión -- recibe objeto de MYSQLL -- Devuelve 1 cuando se puede cerrar la conexion y 0 cuando se puede cerrar la conexion
    if($ResultSet==1){
        print("Registro Insertado");
    } else {
        print("egistro NO Insertado");
    }

?>