<?php

    // Recepción de los datos
    $Folio=$_POST['Folio']; //De esta manera se recibe una variable del formulario de HTML
    $Motivo=$_POST['Motivo'];
    $Garantia=$_POST['Garantia'];
    $Referencia=$_POST['Referencia'];
    $Hora=$_POST['Hora'];
    $CaliBoleta=$_POST['Calificacion_Boleta'];
    $Conductor=$_POST['Conductor'];
    $Fundamento=$_POST['Fundamento'];
    $Vehiculo=$_POST['Vehiculo'];
    $Observacion=$_POST['Observacion'];
    $IdAgente=$_POST['ID_Agente'];
    $IdDireccion=$_POST['ID_Direccion'];
    $NumeroLicencia=$_POST['Num_Licencia'];
    $FolioTarjeta=$_POST['Folio_Tarjeta_Circulacion'];

    //Imprimir
    print("Folio=" . $Folio . "<br>");
    print("Motivo=" . $Motivo . "<br>");
    print("Garantia=" . $Garantia . "<br>");
    print("Referencia=" . $Referencia . "<br>");
    print("Hora=" . $Hora . "<br>");
    print("Calificacion Boleta=" . $CaliBoleta . "<br>");
    print("Conductor=" . $Conductor . "<br>");
    print("Fundamento=" . $Fundamento . "<br>");
    print("Vehiculo=" . $Vehiculo . "<br>");
    print("Observacion=" . $Observacion . "<br>");
    print("IdAgente=" . $IdAgente . "<br>");
    print("IdDireccion=" . $IdDireccion . "<br>");
    print("Numero de Licencia=" . $NumeroLicencia . "<br>");
    print("Folio de tarjeta=" . $FolioTarjeta . "<br>");

    // Formar la instrucción SQL -  se van a ocupar las variables anteriores
    $SQL="INSERT INTO Multas VALUES (NULL, '$Motivo', '$Garantia', '$Referencia', '$Hora', '$CaliBoleta', '$Conductor', '$Fundamento', '$Vehiculo', '$Observacion', '$IdAgente', '$IdDireccion', '$NumeroLicencia', '$FolioTarjeta')";
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