<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Conductor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #fafafa;
            padding: 20px;
        }
        .form-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            margin: auto;
        }
        .form-container h3 {
            margin-bottom: 20px;
            color: #d9534f; /* Color rojo */
            text-align: center; /* Centrar el título */
        }
        .form-container label {
            font-weight: bold;
            color: #333;
        }
        .form-container input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container input[type="submit"] {
            background: #d9534f;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container input[type="submit"]:hover {
            background: #c9302c;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h3>Eliminar Conductor</h3>
        <form method="post">
            <label for="IdConductor">ID del Conductor</label>
            <input type="number" id="IdConductor" name="IdConductor" required>
            <input type="submit" value="Eliminar">
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recibir Datos
            $IdConductor = $_POST['IdConductor'];

            // Formar la Instrucción SQL
            $SQL = "DELETE FROM Conductores WHERE ID = $IdConductor";

            // Conectar con la base de datos
            include("Controlador.php");
            $Con = Conectar();
            $ResultSet = Ejecutar($Con, $SQL);
            Desconectar($Con);

            // Mostrar resultado
            if ($ResultSet == 1) {
                echo "<p class='alert alert-success'>Registro Borrado</p>";
            } else {
                echo "<p class='alert alert-danger'>Registro NO Borrado</p>";
            }
        }
        ?>
    </div>
</body>
</html>
