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
    <title>Tenencias</title>
    <link rel="stylesheet" href="tenencias.css">
</head>
<body>
    <div class="container">
        <h1>Tenencias</h1>
        <p>Consulta de tenencias:</p>

        <table border="1">
            <tr>
                <th>ID Tenencia</th>
                <th>NumTenencia</th>
                <th>Fecha Emision</th>
                <th>Fecha Vencimiento</th>
                <th>Importe</th>
                <th>Estado Pago</th>
                <th>No Transaccion</th>
                <th>Folio Tarjeta</th>
            </tr>

            <?php
                include("Controlador.php");
                $Con = Conectar();
                $SQL = "SELECT * FROM Tenencias";
                $ResultSet = Ejecutar($Con, $SQL);
                $NumFilas = mysqli_num_rows($ResultSet);

                for ($i = 0; $i < $NumFilas; $i++) {
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
        <?php
            print("Total de Registros: ".$NumFilas)
        ?>
    </div>
</body>
</html>
