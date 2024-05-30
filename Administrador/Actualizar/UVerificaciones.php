<?php

session_start(); // Asegúrate de iniciar la sesión al comienzo del script
$varssesion = $_SESSION['usuario'];
// Verifica si la variable de sesión está establecida
if ($varssesion == NULL || $varssesion == '') {
  echo 'Usted no tiene autorización - Ingrese mediante el Login';
  die();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Verificaciones</title>
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
        <h3>Formulario de Verificaciones</h3>
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
            $SQL = "SELECT * FROM Verificaciones WHERE Folio = '$Folio';";
            $ResultSet = Ejecutar($Con, $SQL);
            $Fila = mysqli_fetch_row($ResultSet);
            Desconectar($Con);
        ?>
        <form method="post">
            <input type="hidden" id="Folio" name="Folio" value="<?php echo $_POST['Folio']; ?>">
            <label for="Vehiculo">Vehiculo</label>
            <input type="text" id="Vehiculo" name="Vehiculo" value="<?php echo $Fila[1]; ?>">
            <label for="NumLinea">NumLinea</label>
            <input type="number" id="NumLinea" name="NumLinea" value="<?php echo $Fila[2]; ?>">
            <label for="TecnicoVerificador">TecnicoVerificador</label>
            <input type="text" id="TecnicoVerificador" name="TecnicoVerificador" value="<?php echo $Fila[3]; ?>">
            <label for="FechaExpedicion">FechaExpedicion</label>
            <input type="datetime" id="FechaExpedicion" name="FechaExpedicion" value="<?php echo $Fila[4]; ?>">
            <label for="HoraEntrada">HoraEntrada</label>
            <input type="text" id="HoraEntrada" name="HoraEntrada" value="<?php echo $Fila[5]; ?>">
            <label for="HoraSalida">HoraSalida</label>
            <input type="text" id="HoraSalida" name="HoraSalida" value="<?php echo $Fila[6]; ?>">
            <label for="Motivo">Motivo</label>
            <input type="text" id="Motivo" name="Motivo" value="<?php echo $Fila[7]; ?>">
            <label for="FolioCertificado">FolioCertificado</label>
            <input type="number" id="FolioCertificado" name="FolioCertificado" value="<?php echo $Fila[8]; ?>">
            <label for="Semestre">Semestre</label>
            <input type="number" id="Semestre" name="Semestre" value="<?php echo $Fila[9]; ?>">
            <label for="CodigoBarras">CodigoBarras</label>
            <input type="number" id="CodigoBarras" name="CodigoBarras" value="<?php echo $Fila[10]; ?>">
            <label for="NumeroCentro">NumeroCentro</label>
            <input type="number" id="NumeroCentro" name="NumeroCentro" value="<?php echo $Fila[11]; ?>">
            <input type="submit" value="Actualizar">
        </form>
        <?php
        }

        if (isset($_POST['FolioCertificado'])) {
            $Folio = $_POST['Folio'];
            $Vehiculo = $_POST['Vehiculo'];
            $NumLinea = $_POST['NumLinea'];
            $TecnicoVerificador = $_POST['TecnicoVerificador'];
            $FechaExpedicion = $_POST['FechaExpedicion'];
            $HoraEntrada = $_POST['HoraEntrada'];
            $HoraSalida = $_POST['HoraSalida'];
            $Motivo = $_POST['Motivo'];
            $FolioCertificado = $_POST['FolioCertificado'];
            $Semestre = $_POST['Semestre'];
            $CodigoBarras = $_POST['CodigoBarras'];
            $NumCentro = $_POST['NumeroCentro'];

            $Con = Conectar();
            $SQL = "UPDATE Verificaciones SET Vehiculo = '$Vehiculo', NumerLineaVerificacion = '$NumLinea', TecnicoVerificador = '$TecnicoVerificador',
            FechaExpedicion = '$FechaExpedicion', HoraEntrada = '$HoraEntrada', HoraSalida = '$HoraSalida', Motivo = '$Motivo', 
            FolioCertificado = '$FolioCertificado', Semestre = '$Semestre', CodigoBarras = '$CodigoBarras', NumeroCentro = '$NumCentro' WHERE Folio = '$Folio';";
            $ResultSet = Ejecutar($Con, $SQL);
            Desconectar($Con);
        }