<?php

session_start(); // Asegúrate de iniciar la sesión al comienzo del script
$varssesion = $_SESSION['usuario'];
// Verifica si la variable de sesión está establecida
if ($varssesion == NULL || $varssesion == '') {
  echo 'Usted no tiene autorización - Ingrese mediante el Login';
  die();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multas</title>
    <link rel="stylesheet" href="multas.css">
</head>
<body>
    <div class="container">
        <label>Multas</label>
        <p>Consulta de multas:</p>
    
        <table border="1">
            <tr>
                <th>Folio</th>
                <th>Motivo</th>
                <th>Garantia</th>
                <th>Referencia</th>
                <th>Hora</th>
                <th>CaliBoleta</th>
                <th>Conductor</th>
                <th>Fundamento</th>
                <th>Vehiculo</th>
                <th>Observacion</th>
                <th>IDAgente</th>
                <th>IDDireccion</th>
                <th>NumLicencia</th>
                <th>FolioTarjeta</th>
            </tr>
    
            <?php
                include("Controlador.php"); // Se incluye al archivo correspondiente al controlador 
                $Con=Conectar(); // Se conecta la base de datos
                $SQL="SELECT * FROM multas"; // Se hace la consulta
                $ResultSet=Ejecutar($Con,$SQL);
                //Se va devolver el numero total de filas de la consulta
                $NumFilas=mysqli_num_rows($ResultSet); // Para usar esta funcion primero se tiene que hacer una consulta
                // Devolver una fila de la consulta realizada
                //$Fila=mysqli_fetch_row($ResultSet);
    
                //estructura iterativa
                for($i=0; $i<$NumFilas;$i++)
                {
                    print("<tr>");
                    $Fila = mysqli_fetch_assoc($ResultSet);
                    foreach ($Fila as $valor) {
                        print_r("<td>".$valor."</td>");
                    }
                    print("</tr>");         
                }
                Desconectar($Con);
            ?>
        </table>
        <p class="total-registros">Total de Registros: <?php echo $NumFilas; ?></p>
    </div>
</body>
</html>
