<?php

    // Recepción de los datos
    $Folio=$_REQUEST['Folio']; //De esta manera se recibe una variable del formulario de HTML
    $Propietario=$_REQUEST['Propietario'];
    $TipoServicio=$_REQUEST['Tipo_Servicio'];
    $Vigencia=$_REQUEST['Vigencia'];
    $Placa=$_REQUEST['Placa'];
    $Holograma=$_REQUEST['Holograma'];
    $OficinaExpedidora=$_REQUEST['Oficina_Expedidora'];
    $PlacaAnterior=$_REQUEST['Placa_Anterior'];
    $IDVehiculo=$_REQUEST['ID_Vehiculo'];
    $IDPropietario=$_REQUEST['ID_Propietario'];

    //Imprimir
    print("Folio=" . $Folio . "<br>");
    print("Propietario=" . $Propietario . "<br>");
    print("TipoServicio=" . $TipoServicio . "<br>");
    print("Vigencia=" . $Vigencia . "<br>");
    print("Placa=" . $Placa . "<br>");
    print("Holograma=" . $Holograma . "<br>");
    print("Oficina Expedidora=" . $OficinaExpedidora . "<br>");
    print("Placa Anterior=" . $PlacaAnterior . "<br>");
    print("ID del Vehiculo=" . $IDVehiculo . "<br>");
    print("ID del Propietario=" . $IDPropietario . "<br>");

    // Formar la instrucción SQL -  se van a ocupar las variables anteriores
    $SQL="INSERT INTO TarjetasCirculacion VALUES (NULL,'$Propietario', '$TipoServicio', '$Vigencia', '$Placa', '$Holograma', '$OficinaExpedidora', '$PlacaAnterior', '$IDVehiculo', '$IDVehiculo')";
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