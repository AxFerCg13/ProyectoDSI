<?php

    // Recepción de los datos
    $Clave=$_GET['ClaveDep']; //De esta manera se recibe una variable del formulario de HTML
    $Nombre=$_GET['Nombre'];
    $Status=$_GET['Status'];

    //Imprimir
    print("Clave de departamento=" . $Clave . "<br>");
    print("Nombre=" . $Nombre . "<br>");
    print("Status=" . $Status . "<br>");

    if(($Clave=='') || ($Nombre=='') || ($Status=='')){
        print("Revisa, algún dato falta por ser llenado");
    } else {
    // Formar la instrucción SQL -  se van a ocupar las variables anteriores
    $SQL="INSERT INTO Departamentos (ClaveDept, Nombre, Status) VALUES ('$Clave', '$Nombre', '$Status')";
    print($SQL);
    }

    //CONECTAR CON BASE DE DATOS
    include("Controlador.php"); 
    $Con=Conectar(); //Paso 1 y 2 -- obtención del objeto MySQL -. Conectar al SMBD
    $ResultSet=Ejecutar($Con, $SQL); //Paso 3  --  el primer parametro es el resultado de la función anterior -- Ejecutar consulta -- Devuelve 1 si se hizo la inserción
    $Resultato=Desconectar($Con);//Paso 5 -- cerrar la conexión -- recibe objeto de MYSQLL -- Devuelve 1 cuando se puede cerrar la conexion y 0 cuando se puede cerrar la conexion
    if($ResultSet==1){
        print("Registro Insertado");
    } else {
        print("Registro NO Insertado");
    }

?>