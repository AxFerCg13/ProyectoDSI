<?php
    //Recibir Datos
    $IdAgente=$_POST['IdAgente'];

    //Formar la Instruccion SQL
    $SQL="DELETE FROM Agentes WHERE ID = $IdAgente";

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