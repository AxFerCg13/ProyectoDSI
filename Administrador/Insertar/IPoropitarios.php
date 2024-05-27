<?php

    // Recepción de los datos
    $Id_Propietario=$_POST['Id_Propietarios']; //De esta manera se recibe una variable del formulario de HTML
    $Nombre=$_POST['Nombre'];
    $Direccion=$_POST['Direccion'];
    $RFC=$_POST['RFC'];
    $Id_Direccion=$_POST['Id_Direccion'];

    //Imprimir
    print("IdPrpietario=" . $Id_Propietario . "<br>");
    print("Nombre=" . $Nombre . "<br>");
    print("Direccion=" . $Direccion . "<br>");
    print("RFC=" . $RFC . "<br>");
    print("IdDireccion=" . $Id_Direccion . "<br>");


    // Formar la instrucción SQL -  se van a ocupar las variables anteriores
    $SQL="INSERT INTO Propietarios VALUES ('$Id_Propietario','$Nombre', '$Direccion', '$RFC', '$Id_Direccion')";
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
