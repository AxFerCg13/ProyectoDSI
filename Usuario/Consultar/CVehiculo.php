<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehículos</title>
    <link rel="stylesheet" href="vehiculos.css">
</head>
<body>
    <div class="container">
        <h1>Vehículos</h1>
        <p>Consulta de vehículos:</p>

        <table border="1">
            <tr>
                <th>ID</th>
                <th>Clase</th>
                <th>Tipo Servicio</th>
                <th>Uso</th>
                <th>Año</th>
                <th>Número de Serie</th>
                <th>Estado de Procedencia</th>
                <th>Tipo de Carrocería</th>
                <th>Origen</th>
                <th>Color</th>
                <th>Cilindraje</th>
                <th>Capacidad</th>
                <th>Número de Puertas</th>
                <th>Número de Asientos</th>
                <th>Combustible</th>
                <th>Transmisión</th>
                <th>RFA</th>
                <th>Clave Vehicular</th>
                <th>Marca</th>
                <th>Línea</th>
                <th>Sublínea</th>
                <th>NIV</th>
            </tr>

            <?php
                include("Controlador.php");
                $Con = Conectar();
                $SQL = "SELECT * FROM vehiculos";
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
