<?php  
    //Paso 1 y 2 -- obtención del objeto MySQL
    $Servidor="127.0.0.1";
    $Usuario="root";
    $Password="";
    $BD="controlvehicular30";
    $Con=mysqli_connect($Servidor, $Usuario, $Password, $BD);
    print_r($Con);

    //Paso 3  --  el prier parametro es el resultado de la función anterior
    $SQL="INSERT INTO Direcciones VALUES ('3','1','1','1','1','1')";
    $ResutSet=mysqli_query($Con, $SQL);
    print($ResutSet);

    //Paso 4
    
    //Paso 5 -- cerrar la conexión -- recibe objeto de MYSQLL -- Devuelve 1 cuando se puede cerrar la conexion y 0 cuando se puede cerrar la conexion
    $Resultado=mysqli_close($Con);
    print($Resultado);

?>