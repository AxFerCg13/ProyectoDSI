<?php

    // Recepción de los datos
    $NumCentro=$_GET['Num_Centro']; //De esta manera se recibe una variable del formulario de HTML
    $Municipio=$_GET['Municipio'];
    $Entidad=$_GET['Entidad'];
    $Nombre=$_GET['Nombre'];

    //Imprimir
    print("Numero de Centro=" . $NumCentro . "<br>");
    print("Municipio=" . $Municipio . "<br>");
    print("Entidad=" . $Entidad . "<br>");
    print("Nombre=" . $Nombre . "<br>");

    // Formar la instrucción SQL -  se van a ocupar las variables anteriores
    $SQL="INSERT INTO CentroVerificacion VALUES ('$NumCentro','$Municipio', '$Entidad', '$Nombre')";
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