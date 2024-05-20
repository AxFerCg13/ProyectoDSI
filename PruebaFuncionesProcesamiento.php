<?php
    include("Controlador.php");

    //1 y 2
    $Con=Conectar();

    $Var=mysqli_errno($Con);
    print_r($Var);

    //5
    Desconectar($Con);

?>