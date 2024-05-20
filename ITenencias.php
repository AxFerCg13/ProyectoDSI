<?php

    // Recepción de los datos
    $ID=$_REQUEST['ID']; //De esta manera se recibe una variable del formulario de HTML
    $NumTenencia=$_REQUEST['No_Tenencia'];
    $FechaEmision=$_REQUEST['Fecha_Emision'];
    $FechaVencimiento=$_REQUEST['Fecha_Vencimiento'];
    $Importe=$_REQUEST['Importe'];
    $EstadoPago=$_REQUEST['Estado_Pago'];
    $NumTransaccion=$_REQUEST['No_Transaccion'];
    $FolioTarjeta=$_REQUEST['FolioTarjetaCirculacion'];

    //Imprimir
    print("Id=" . $ID . "<br>");
    print("Numero de Tenencia=" . $NumTenencia . "<br>");
    print("Fecha de Emisión=" . $FechaEmision . "<br>");
    print("Fecha de Vencimiento=" . $FechaVencimiento . "<br>");
    print("Importe=" . $Importe . "<br>");
    print("Estado de Pago=" . $EstadoPago . "<br>");
    print("Numero de Transacción=" . $NumTransaccion . "<br>");
    print("Folio de Tarjeta=" . $FolioTarjeta . "<br>");

    // Formar la instrucción SQL -  se van a ocupar las variables anteriores
    $SQL="INSERT INTO Tenencias (NoTenencia, FechaEmision, FechaVencimiento, Importe, EstadoPago, NoTransaccion, FolioTarjetaCirculacion) VALUES ('$NumTenencia', '$FechaEmision', '$FechaVencimiento', '$Importe', '$EstadoPago', '$NumTransaccion', '$FolioTarjeta')";
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