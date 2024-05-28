<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Tenencias</title>
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
        <h3>Formulario de Tenencias</h3>
        <form method="post">
            <label for="Id_Tenencia">Id_Tenencia</label>
            <input type="number" id="Id_Tenencia" name="Id_Tenencia">
            <input type="submit" value="Buscar">
        </form>

        <?php
        include("Controlador.php");
        if (isset($_POST['Id_Tenencia'])) {
            $Id_Tenencia = $_POST['Id_Tenencia'];
            $Con = Conectar();
            $SQL = "SELECT * FROM Tenencias WHERE Id = '$Id_Tenencia';";
            $ResultSet = Ejecutar($Con, $SQL);
            $Fila = mysqli_fetch_row($ResultSet);
            Desconectar($Con);
        ?>
        <form method="post">
            <input type="hidden" id="Id_Tenencia" name="Id_Tenencia" value="<?php echo $_POST['Id_Tenencia']; ?>">
            <label for="NoTenencia">NoTenencia</label>
            <input type="text" id="NoTenencia" name="NoTenencia" value="<?php echo $Fila[1]; ?>">
            <label for="FechaEmision">FechaEmision</label>
            <input type="datetime" id="FechaEmision" name="FechaEmision" value="<?php echo $Fila[2]; ?>">
            <label for="FechaVencimiento">FechaVencimiento</label>
            <input type="datetime" id="FechaVencimiento" name="FechaVencimiento" value="<?php echo $Fila[3]; ?>">
            <label for="Importe">Importe</label>
            <input type="text" id="Importe" name="Importe" value="<?php echo $Fila[4]; ?>">
            <label for="EstadoPago">EstadoPago</label>
            <input type="text" id="EstadoPago" name="EstadoPago" value="<?php echo $Fila[5]; ?>">
            <label for="NoTransaccion">NoTransaccion</label>
            <input type="text" id="NoTransaccion" name="NoTransaccion" value="<?php echo $Fila[6]; ?>">
            <label for="FolioTarjeta">FolioTarjeta</label>
            <input type="number" id="FolioTarjeta" name="FolioTarjeta" value="<?php echo $Fila[7]; ?>">
            <input type="submit" value="Actualizar">
        </form>
        <?php
        }

        if (isset($_POST['NoTenencia'])) {
            $Id_Tenencia = $_POST['Id_Tenencia'];
            $NoTenencia = $_POST['NoTenencia'];
            $FechaEmision = $_POST['FechaEmision'];
            $FechaVencimiento = $_POST['FechaVencimiento'];
            $Importe = $_POST['Importe'];
            $EstadoPago = $_POST['EstadoPago'];
            $NoTransaccion = $_POST['NoTransaccion'];
            $FolioTarjeta = $_POST['FolioTarjeta'];
            
            $Con = Conectar();
            $SQL = "UPDATE Tenencias SET NoTenencia = '$NoTenencia', FechaEmision = '$FechaEmision', FechaVencimiento = '$FechaVencimiento',
            Importe = '$Importe', EstadoPago = '$EstadoPago', NoTransaccion = '$NoTransaccion', FolioTarjetaCirculacion = '$FolioTarjeta' WHERE Id = '$Id_Tenencia';";
            $ResultSet = Ejecutar($Con, $SQL);
            Desconectar($Con);
            header("Location: UTenencias.php");
        }
        ?>
    </div>
</body>
</html>
