<?php

    // Recepción de los datos
    $Clave=$_POST['Clave']; //De esta manera se recibe una variable del formulario de HTML
    $Nombre=$_POST['Nombre'];
    $Salario=$_POST['Salario'];
    $ISR=$_POST['Salario'];
    $Sexo=$_POST['Sexo'];
    $FechaI=$_POST['FechaIngreso'];
    $Dept=$_POST['Dept'];



    //Imprimir
    print("Clave=" . $Clave . "<br>");
    print("Nombre=" . $Nombre . "<br>");
    print("Salario=" . $Salario . "<br>");
    print("ISR=" . $ISR * .08 . "<br>");
    print("Sexo=" . $Sexo . "<br>");
    print("Fecha de Ingreso=" . $FechaI . "<br>");
    print("Departamento =" . $Dept . "<br>");

    if(($Clave=='') || ($Nombre=='') || ($Salario=='') ||  ($Sexo=='') || ($FechaI=='') || ($Dept=='')){
        print("Revisa, algún dato falta por ser llenado");
    } else {
    // Formar la instrucción SQL -  se van a ocupar las variables anteriores
    $SQL="INSERT INTO Docentes (Clave, Nombre, Salario, ISR, Sexo, FechaIngreso, Dept) VALUES ('$Clave', '$Nombre', '$Salario', $ISR*.08, '$Sexo', '$FechaI', '$Dept')";
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