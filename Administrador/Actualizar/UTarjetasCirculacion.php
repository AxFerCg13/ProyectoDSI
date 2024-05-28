<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Tarjetas de Circulación</title>
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
        <h3>Formulario de Tarjetas de Circulación</h3>
        <form method="post">
            <label for="Folio">Folio</label>
            <input type="number" id="Folio" name="Folio">
            <input type="submit" value="Buscar">
        </form>

        <?php
        include("Controlador.php");
        if (isset($_POST['Folio'])) {
            $Folio = $_POST['Folio'];
            $Con = Conectar();
            $SQL = "SELECT * FROM TarjetasCirculacion WHERE Folio = '$Folio';";
            $ResultSet = Ejecutar($Con, $SQL);
            $Fila = mysqli_fetch_row($ResultSet);
            Desconectar($Con);
        ?>
        <form method="post">
            <input type="hidden" id="Folio" name="Folio" value="<?php echo $_POST['Folio']; ?>">
            <label for="Propietario">Propietario</label>
            <input type="text" id="Propietario" name="Propietario" value="<?php echo $Fila[1]; ?>">
            <label for="TipoServicio">Tipo de Servicio</label>
            <input type="text" id="TipoServicio" name="TipoServicio" value="<?php echo $Fila[2]; ?>">
            <label for="Vigencia">Vigencia</label>
            <input type="text" id="Vigencia" name="Vigencia" value="<?php echo $Fila[3]; ?>">
            <label for="Placa">Placa</label>
            <input type="text" id="Placa" name="Placa" value="<?php echo $Fila[4]; ?>">
            <label for="Holograma">Holograma</label>
            <input type="text" id="Holograma" name="Holograma" value="<?php echo $Fila[5]; ?>">
            <label for="OficinaExpedidora">Oficina Expedidora</label>
            <input type="text" id="OficinaExpedidora" name="OficinaExpedidora" value="<?php echo $Fila[6]; ?>">
            <label for="PlacaAnterior">Placa Anterior</label>
            <input type="text" id="PlacaAnterior" name="PlacaAnterior" value="<?php echo $Fila[7]; ?>">
            <label for="IdVehiculo">ID Vehículo</label>
            <input type="number" id="IdVehiculo" name="IdVehiculo" value="<?php echo $Fila[8]; ?>">
            <label for="IdPropietario">ID Propietario</label>
            <input type="number" id="IdPropietario" name="IdPropietario" value="<?php echo $Fila[9]; ?>">
            <input type="submit" value="Actualizar">
        </form>
        <?php
        }

        if (isset($_POST['Propietario'])) {
            $Folio = $_POST['Folio'];
            $Propietario = $_POST['Propietario'];
            $TipoServicio = $_POST['TipoServicio'];
            $Vigencia = $_POST['Vigencia'];
            $Placa = $_POST['Placa'];
            $Holograma = $_POST['Holograma'];
            $OficinaExpedidora = $_POST['OficinaExpedidora'];
            $PlacaAnterior = $_POST['PlacaAnterior'];
            $IdVehiculo = $_POST['IdVehiculo'];
            $IdPropietario = $_POST['IdPropietario'];
            
            $Con = Conectar();
            $SQL = "UPDATE TarjetasCirculacion SET Propietario = '$Propietario', TipoServicio = '$TipoServicio', Vigencia = '$Vigencia',
            Placa = '$Placa', Holograma = '$Holograma', OficinaExpendidora = '$OficinaExpedidora', PlacaAnterior = '$PlacaAnterior', 
            IdVehiculo = '$IdVehiculo', IdPropietario = '$IdPropietario' WHERE Folio = '$Folio';";
            $ResultSet = Ejecutar($Con, $SQL);
            Desconectar($Con);
            header("Location: UTarjetasCirculacion.php");
        }
        ?>
    </div>
</body>
</html>
