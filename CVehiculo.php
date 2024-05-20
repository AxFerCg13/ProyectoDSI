<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <label>Vehiculos</label>
    <p>

    </p>

    <table border=1>
        <tr>
            <th>ID</th>
            <th>Clase</th>
            <th>Tipo Servicio</th>
            <th>Uso</th>
            <th>Anio</th>
            <th>NumSerie</th>
            <th>Estado Procedencia</th>
            <th>TipoCarroceria</th>
            <th>Origen</th>
            <th>Color</th>
            <th>Cilindraje</th>
            <th>Capacidad</th>
            <th>NumPuertas</th>
            <th>NumAsiento</th>
            <th>Combustible</th>
            <th>Transmision</th>
            <th>RFA</th>
            <th>CVEvehicular</th>
            <th>Marca</th>
            <th>Linea</th>
            <th>Sublinea</th>
            <th>Niv</th>
        </tr>

        <?php
            include("Controlador.php"); // Se incluye al archivo correspondiente al controlador 
            $Con=Conectar(); // Se conecta la base de datos
            $SQL="SELECT * FROM vehiculos"; // Se hace la consulta
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
    <?php
        print("Total de Registros: ".$NumFilas)
    ?>
</body>
</html>