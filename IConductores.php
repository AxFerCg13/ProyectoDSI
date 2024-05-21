<?php

    // Recepción de los datos
    $ID=$_REQUEST['ID']; //De esta manera se recibe una variable del formulario de HTML
    $Nombre=$_REQUEST['Nombre'];
    $FechaNacimiento=$_REQUEST['Fecha_Nacimiento'];
    $Foto=$_FILES['Foto'];
    $Firma=$_REQUEST['Firma'];
    $RFC=$_REQUEST['RFC'];
    $Domicilio=$_REQUEST['Domicilio'];
    $TipoSangre=$_REQUEST['Tipo_Sangre'];
    $Donador=$_REQUEST['Donador'];
    $CURP=$_REQUEST['CURP'];
    $IdDireccion=$_REQUEST['ID_Direccion'];

    // Validación imagénes 

    if (isset($_FILES['Foto'])){
        $
    }

    //Imprimir
    print("ID=" . $ID . "<br>");
    print("Nombre=" . $Nombre . "<br>");
    print("Fecha de nacimiento=" . $FechaNacimiento . "<br>");
    print("Foto=" . $Foto . "<br>");
    print("Firma=" . $Firma . "<br>");
    print("RFC=" . $RFC . "<br>");
    print("Domicilio=" . $Domicilio . "<br>");
    print("Tipo de sangre=" . $TipoSangre . "<br>");
    print("Donador=" . $Donador . "<br>");
    print("CURP=" . $CURP . "<br>");
    print("ID Direccion=" . $IdDireccion . "<br>");

    // Formar la instrucción SQL -  se van a ocupar las variables anteriores
    $SQL="INSERT INTO Conductores (ID, Nombre, FechaNacimiento, Foto, Firma, RFC, Domicilio, TipoSangre, Donador, CURP, IDDireccion) 
    VALUES ('$ID', '$Nombre', '$FechaNacimiento', '$Foto', '$Firma', '$RFC', '$Domicilio', '$TipoSangre', '$Donador', '$CURP', '$IdDireccion')";
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