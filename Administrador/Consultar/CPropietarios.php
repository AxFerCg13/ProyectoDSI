<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <label>Propietarios</label>
    <p>

    </p>

    <table border=1>
        <tr>
            <th>IdPropietario</th>
            <th>Nombre</th>
            <th>RFC</th>
            <th>Direccion</th>
        </tr>

        <?php
            include("Controlador.php"); // Se incluye al archivo correspondiente al controlador 
            $Con=Conectar(); // Se conecta la base de datos
            $SQL="SELECT * FROM Propietarios"; // Se hace la consulta
            $ResultSet=Ejecutar($Con,$SQL);
            //Se va devolver el numero total de filas de la consulta
            $NumFilas=mysqli_num_rows($ResultSet); // Para usar esta funcion primero se tiene que hacer una consulta
            // Devolver una fila de la consulta realizada
            //$Fila=mysqli_fetch_row($ResultSet);

            //estructura iterativa
            for($i=0; $i<$NumFilas;$i++)
            {
                print("<tr>");
                $Fila=mysqli_fetch_row($ResultSet);
                print("<td>".$Fila[0]."</td>");
                print("<td>".$Fila[1]."</td>");
                print("<td>".$Fila[2]."</td>");
                print("<td>".$Fila[3]."</td>");
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