<?php

    function Conectar(){ // Paso 1 y 2
        $Servidor="127.0.0.1";
        $Usuario="root";
        $Password="";
        $BD="controlvehicular30";
        $Con=mysqli_connect($Servidor, $Usuario, $Password, $BD); // Devuelve un objeto de mysql
        return $Con;
    }

    function Ejecutar($Con,$SQL){ // Paso 3 ejecutar consulta
        $ResultSet=mysqli_query($Con,$SQL); // Devuelve un 0 o 1
        return $ResultSet;
    }

    function ProcesarResultados(){

    }

    function Desconectar($Con){ // Paso 5 - desconectar la conexion
        $Resultado=mysqli_close($Con);
        return $Resultado;
    }


?>