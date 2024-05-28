<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Vehículos</title>
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
            max-width: 800px; /* Aumenté el ancho para acomodar más campos */
            margin: auto;
        }
        .form-container label {
            font-weight: bold;
            color: #333;
        }
        .form-container input[type="text"],
        .form-container input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container input[type="submit"] {
            background: #7386D5;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container input[type="submit"]:hover {
            background: #6d7fcc;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h3>Formulario de Vehículos</h3>
        <form method="post">
            <label for="Id_Vehiculo">Id_Vehiculo</label>
            <input type="number" id="Id_Vehiculo" name="Id_Vehiculo">
            <input type="submit">
        </form>

        <?php
        include("Controlador.php");
        if (isset($_POST['Id_Vehiculo'])) {
            $Id_Vehiculo = $_POST['Id_Vehiculo'];
            $Con = Conectar();
            $SQL = "SELECT * FROM Vehiculos WHERE id = '$Id_Vehiculo';";
            $ResultSet = Ejecutar($Con, $SQL);
            $Fila = mysqli_fetch_row($ResultSet);
            Desconectar($Con);
        ?>
        <form method="post">
            <input type="hidden" id="Id_Vehiculo" name="Id_Vehiculo" value="<?php echo $_POST['Id_Vehiculo']; ?>">
            <label for="Clase">Clase</label>
            <input type="text" id="Clase" name="Clase" value="<?php echo $Fila[1]; ?>">
            <label for="TipoServicio">Tipo de Servicio</label>
            <input type="text" id="TipoServicio" name="TipoServicio" value="<?php echo $Fila[2]; ?>">
            <label for="Uso">Uso</label>
            <input type="text" id="Uso" name="Uso" value="<?php echo $Fila[3]; ?>">
            <!-- Agregué más campos aquí -->
            <input type="submit">
        </form>
        <?php
        }

        if (isset($_POST['Clase'])) {
            $Id_Vehiculo = $_POST['Id_Vehiculo'];
            $Clase = $_POST['Clase'];
            $TipoServicio = $_POST['TipoServicio'];
            $Uso = $_POST['Uso'];
            // Incluye el resto de los campos aquí

            $Con = Conectar();
            $SQL = "UPDATE Vehiculos SET Clase = '$Clase', TipoServicio = '$TipoServicio', Uso = '$Uso' WHERE id = '$Id_Vehiculo';";
            // Agrega el resto de los campos a la consulta SQL aquí

            $ResultSet = Ejecutar($Con, $SQL);
            Desconectar($Con);
            header("Location: UVehiculos.php");
        }
        ?>
    </div>
</body>
</html>
