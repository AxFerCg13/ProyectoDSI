<?php
    // Abrir 
    $Manejador=fopen("Datos1.xml", "a+"); // Devuelve un manejador de archivo

    // Lectura de caracter
    //$Caracter=fgetc($Manejador);
    //print($Caracter);
    //Lectura linea
    //$Linea=fgets($Manejador);
    //print($Linea);

    //Escribir
    fwrite($Manejador, "Texto"); // Escribe la palabra texto dentro del archivo, reemplaza la linea con el texto ingresado
    // Cerrar
    fclose($Manejador);
?>