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
    <title>Direcciones</title>
    <link rel="stylesheet" href="direcciones.css">
</head>
<body>
    <div class="container">
        <h1>Direcciones</h1>
        <p>Consulta de direcciones:</p>

        <table border="1">
            <tr>
                <th>ID Dirección</th>
                <th>Localidad</th>
                <th>Municipio</th>
                <th>Código Postal</th>
                <th>Calle</th>
                <th>Número</th>
            </tr>

            <?php
                include("Controlador.php"); // Se incluye al archivo correspondiente al controlador 
                $Con = Conectar(); // Se conecta la base de datos
                $SQL = "SELECT * FROM Direcciones"; // Se hace la consulta
                $ResultSet = Ejecutar($Con, $SQL);
                //Se va devolver el numero total de filas de la consulta
                $NumFilas = mysqli_num_rows($ResultSet); // Para usar esta función primero se tiene que hacer una consulta

                //estructura iterativa
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
