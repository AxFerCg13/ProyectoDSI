<?php

    // Recepción de los datos
    $ID=$_GET['ID']; //De esta manera se recibe una variable del formulario de HTML
    $Localidad=$_GET['Localidad'];
    $Municipio=$_GET['Municipio'];
    $CodigoPostal=$_GET['Codigo_Postal'];
    $Calle=$_GET['Calle'];
    $Numero=$_GET['Numero'];

    //Imprimir
    print("ID =" . $ID . "<br>");
    print("Localidad=" . $Localidad . "<br>");
    print("Municipio=" . $Municipio . "<br>");
    print("Codigo Postal=" . $CodigoPostal . "<br>");
    print("Calle=" . $Calle . "<br>");
    print("Número=" . $Numero . "<br>");

    // Formar la instrucción SQL -  se van a ocupar las variables anteriores
    $SQL="INSERT INTO Direcciones (Localidad, Municipio, CodigoPostal, Calle, Numero) VALUES ('$Localidad', '$Municipio', '$CodigoPostal', '$Calle', '$Numero')";
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