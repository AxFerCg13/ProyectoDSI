<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agentes</title>
    <link rel="stylesheet" href="agentes.css">
</head>
<body>
    <div class="container">
        <h1>Agentes</h1>
        <p>Consulta de agentes:</p>

        <table border="1">
            <tr>
                <th>ID Agente</th>
                <th>Nombre</th>
                <th>Firma</th>
                <th>Grupo</th>
            </tr>

            <?php
                include("Controlador.php"); // Se incluye al archivo correspondiente al controlador 
                $Con=Conectar(); // Se conecta la base de datos
                $SQL="SELECT * FROM Agentes"; // Se hace la consulta
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
            print("<p class='total-registros'>Total de Registros: ".$NumFilas."</p>")
        ?>
    </div>
</body>
</html>
