<?php

    // Recepción de los datos
    $ID=$_REQUEST['ID']; //De esta manera se recibe una variable del formulario de HTML
    $FechaExpedicion=$_REQUEST['Fecha_Expedicion'];
    $Vigencia=$_REQUEST['Vigencia'];
    $Tipo=$_REQUEST['Tipo'];
    $NumeroEmergencia=$_REQUEST['Num_Emergencia'];
    $Observacion=$_REQUEST['Observacion'];
    $Restriccion=$_REQUEST['Restriccion'];
    $IDConductor=$_REQUEST['ID_Conductor'];

    //Imprimir
    print("ID=" . $ID . "<br>");
    print("Fecha de Expedición=" . $FechaExpedicion . "<br>");
    print("Vigencia=" . $Vigencia . "<br>");
    print("Tipo=" . $Tipo . "<br>");
    print("Numero Emergencia=" . $NumeroEmergencia . "<br>");
    print("Observacion=" . $Observacion . "<br>");
    print("Restriccion=" . $Restriccion . "<br>");
    print("IDConductor=" . $IDConductor . "<br>");

    // Formar la instrucción SQL -  se van a ocupar las variables anteriores
    $SQL="INSERT INTO Licencias VALUES ('$ID','$FechaExpedicion', '$Vigencia', '$Tipo', '$NumeroEmergencia', '$Observacion', '$Restriccion', $IDConductor)";
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