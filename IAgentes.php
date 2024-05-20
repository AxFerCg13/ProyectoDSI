<?php

    // Recepción de los datos
    $Id_Agente=$_POST['ID']; //De esta manera se recibe una variable del formulario de HTML
    $Nombre=$_POST['Nombre'];
    $Firma=$_POST['Firma'];
    $Grupo=$_POST['Grupo'];

    //Imprimir
    print("IdAgente=" . $Id_Agente . "<br>");
    print("Nombre=" . $Nombre . "<br>");
    print("Firma=" . $Firma . "<br>");
    print("Grupo=" . $Grupo . "<br>");

    // Formar la instrucción SQL -  se van a ocupar las variables anteriores
    $SQL="INSERT INTO Agentes (Nombre, Firma, Grupo) VALUES ('$Nombre', '$Firma', '$Grupo')";
    print($SQL);

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