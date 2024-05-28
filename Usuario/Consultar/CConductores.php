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
                <th>Fecha de Nacimiento</th>
                <th>Foto</th>
                <th>Firma</th>
                <th>RFC</th>
                <th>Domicilio</th>
                <th>Tipo de Sangre</th>
                <th>Donador</th>
                <th>CURP</th>
                <th>ID Dirección</th>
            </tr>

            <?php
                include("Controlador.php"); // Se incluye al archivo correspondiente al controlador 
                $Con=Conectar(); // Se conecta la base de datos
                $SQL="SELECT * FROM Conductores"; // Se hace la consulta
                $ResultSet=Ejecutar($Con,$SQL);
                //Se va devolver el numero total de filas de la consulta
                $NumFilas=mysqli_num_rows($ResultSet); // Para usar esta funcion primero se tiene que hacer una consulta
                // Devolver una fila de la consulta realizada

                // Estructura iterativa
                for($i=0; $i<$NumFilas; $i++) {
                    print("<tr>");
                    $Fila = mysqli_fetch_assoc($ResultSet);
                    foreach ($Fila as $valor) {
                        print("<td>".$valor."</td>");
                    }
                    print("</tr>");         
                }
                Desconectar($Con);
            ?>
        </table>
        <?php
            print("<p class='total-registros'>Total de Registros: ".$NumFilas."</p>")
        ?>
    </div>
</body>
</html>
