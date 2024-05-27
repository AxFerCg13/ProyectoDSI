<?php
    //Recibir Datos
    $IdDireccion=$_POST['IdDireccion'];

    //Formar la Instruccion SQL
    $SQL="DELETE FROM direcciones WHERE ID = $IdDireccion";

    print($SQL);

    //Conectar con la base de datos
    include("Controlador.php");
    $Con=Conectar();
    $ResultSet=Ejecutar($Con,$SQL);
    $Resultado=Desconectar($Con);

    if($ResultSet==1){
        print("Registro Borrado");
    } else {
        print("Registro NO Borrado");
    }
?>