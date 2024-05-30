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
    <title></title>
    <link rel="stylesheet" href="verificaciones.css">
</head>
<body>
    <div class="container">
        <h1>Verificaciones</h1>
        <p>Consulta de verificaciones:</p>

        <table border="1">
            <tr>
                <th>Folio</th>
                <th>Vehiculo</th>
                <th>NumLinea</th>
                <th>TecnicoVerifi</th>
                <th>FechaExped</th>
                <th>HoraEntrada</th>
                <th>HoraSalida</th>
                <th>Motivo</th>
                <th>FolioCertificado</th>
                <th>Semestre</th>
                <th>CodigoBarras</th>
                <th>NumCentro</th>
            </tr>

            <?php
                include("Controlador.php");
                $Con=Conectar();
                $SQL="SELECT * FROM verificaciones";
                $ResultSet=Ejecutar($Con,$SQL);
                $NumFilas=mysqli_num_rows($ResultSet);

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
        <p class="total-registros">Total de Registros: <?php print($NumFilas); ?></p>
    </div>
</body>
</html>
