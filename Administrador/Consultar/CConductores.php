<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conductores</title>
    <link rel="stylesheet" href="conductores.css">
</head>
<body>
    <div class="container">
        <h1>Conductores</h1>
        <p>Consulta de conductores:</p>

        <table border="1">
            <tr>
                <th>ID Conductor</th>
                <th>Nombre</th>
                <th>FechaNacimiento</th>
                <th>Foto</th>
                <th>Firma</th>
                <th>RFC</th>
                <th>Domicilio</th>
                <th>Tipo de sangre</th>
                <th>Donador</th>
                <th>CURP</th>
                <th>IDDireccion</th>
            </tr>

            <?php
                include("Controlador.php");
                $Con = Conectar();
                $SQL = "SELECT * FROM Conductores";
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
