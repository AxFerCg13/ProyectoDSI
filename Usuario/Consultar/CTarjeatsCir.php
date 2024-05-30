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
    <title>Tarjetas Circulación</title>
    <link rel="stylesheet" href="tarjetas_circulacion.css">
</head>
<body>
    <div class="container">
        <h1>Tarjetas de Circulación</h1>
        <p>Consulta de tarjetas de circulación:</p>

        <table border="1">
            <tr>
                <th>Folio</th>
                <th>Propietario</th>
                <th>Tipo Servicio</th>
                <th>Vigencia</th>
                <th>Placa</th>
                <th>Holograma</th>
                <th>Oficina Expedidora</th>
                <th>Placa Anterior</th>
                <th>Id Vehículo</th>
                <th>Id Propietario</th>
            </tr>

            <?php
                include("Controlador.php");
                $Con = Conectar();
                $SQL = "SELECT * FROM tarjetascirculacion";
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
        <p class="total-registros">Total de Registros: <?php echo $NumFilas; ?></p>
    </div>
</body>
</html>
