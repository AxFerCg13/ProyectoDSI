<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Licencias</title>
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
            color: #7386D5; /* Color lila */
            text-align: center; /* Centrar el título */
        }
        .form-container label {
            font-weight: bold;
            color: #333;
        }
        .form-container input[type="text"],
        .form-container input[type="number"],
        .form-container input[type="datetime-local"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container select {
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
        <h3>Formulario de Licencias</h3>
        <form method="post">
            <label for="NumLicencia">NumLicencia</label>
            <input type="number" id="NumLicencia" name="NumLicencia">
            <input type="submit" value="Buscar">
        </form>

        <?php
        include("Controlador.php");
        if (isset($_POST['NumLicencia'])) {
            $NumLicencia = $_POST['NumLicencia'];
            $Con = Conectar();
            $SQL = "SELECT * FROM Licencias WHERE NumLicencia = '$NumLicencia';";
            $ResultSet = Ejecutar($Con, $SQL);
            $Fila = mysqli_fetch_row($ResultSet);
            Desconectar($Con);
        ?>
        <form method="post">
            <input type="hidden" id="NumLicencia" name="NumLicencia" value="<?php echo $_POST['NumLicencia']; ?>">
            <label for="FechaExpedicion">FechaExpedicion</label>
            <input type="datetime-local" id="FechaExpedicion" name="FechaExpedicion" value="<?php echo date('Y-m-d\TH:i', strtotime($Fila[1])); ?>">
            <label for="Vigencia">Vigencia</label>
            <select id="Vigencia" name="Vigencia">
                <option value="3" <?php if ($Fila[2] == '3') echo 'selected'; ?>>3 años</option>
                <option value="5" <?php if ($Fila[2] == '5') echo 'selected'; ?>>5 años</option>
            </select>
            <label for="Tipo">Tipo</label>
            <input type="text" id="Tipo" name="Tipo" value="<?php echo $Fila[3]; ?>">
            <label for="NumEmergencia">NumEmergencia</label>
            <input type="number" id="NumEmergencia" name="NumEmergencia" value="<?php echo $Fila[4]; ?>">
            <label for="Observacion">Observacion</label>
            <input type="text" id="Observacion" name="Observacion" value="<?php echo $Fila[5]; ?>">
            <label for="Restriccion">Restriccion</label>
            <input type="text" id="Restriccion" name="Restriccion" value="<?php echo $Fila[6]; ?>">
            <label for="Id_Conductor">Id_Conductor</label>
            <input type="number" id="Id_Conductor" name="Id_Conductor" value="<?php echo $Fila[7]; ?>">
            <input type="submit" value="Actualizar">
        </form>
        <?php
        }

        if (isset($_POST['FechaExpedicion'])) {
            $NumLicencia = $_POST['NumLicencia'];
            $FechaExpedicion = $_POST['FechaExpedicion'];
            $Vigencia = $_POST['Vigencia'];
            $Tipo = $_POST['Tipo'];
            $NumEmergencia = $_POST['NumEmergencia'];
            $Observacion = $_POST['Observacion'];
            $Restriccion = $_POST['Restriccion'];
            $IdConductor = $_POST['Id_Conductor'];

            $Con = Conectar();
            $SQL = "UPDATE Licencias SET FechaExpedicion = '$FechaExpedicion', Vigencia = '$Vigencia', Tipo = '$Tipo', NumEmergencia = '$NumEmergencia', Observacion = '$Observacion', Restriccion = '$Restriccion' WHERE NumLicencia = '$NumLicencia';";
            $ResultSet = Ejecutar($Con, $SQL);
            Desconectar($Con);
            header("Location: ULicencias.php");
        }
        ?>
    </div>
</body>
</html>
