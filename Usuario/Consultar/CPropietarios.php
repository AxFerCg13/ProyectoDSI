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
    <title>Propietarios</title>
    <link rel="stylesheet" href="propietarios.css">
</head>
<body>
    <div class="container">
        <h1>Propietarios</h1>
        <p>Consulta de propietarios:</p>

        <table border="1">
            <tr>
                <th>IdPropietario</th>
                <th>Nombre</th>
                <th>RFC</th>
                <th>Dirección</th>
            </tr>

            <?php
                include("Controlador.php");
                $Con = Conectar();
                $SQL = "SELECT * FROM Propietarios";
                $ResultSet = Ejecutar($Con, $SQL);
                $NumFilas = mysqli_num_rows($ResultSet);

                for ($i = 0; $i < $NumFilas; $i++) {
                    print("<tr>");
                    $Fila = mysqli_fetch_row($ResultSet);
                    print("<td>".$Fila[0]."</td>");
                    print("<td>".$Fila[1]."</td>");
                    print("<td>".$Fila[2]."</td>");
                    print("<td>".$Fila[3]."</td>");
                    print("</tr>");
                }
                Desconectar($Con);
            ?>
        </table>
        <p><strong>Total de Registros:</strong> <?php echo $NumFilas; ?></p>
    </div>
</body>
</html>
