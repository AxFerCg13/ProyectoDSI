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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Multas</title>
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
        <h3>Formulario de Multas</h3>
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
            $SQL = "SELECT * FROM Multas WHERE Folio = '$Folio';";
            $ResultSet = Ejecutar($Con, $SQL);
            $Fila = mysqli_fetch_row($ResultSet);
            Desconectar($Con);
        ?>
        <form method="post">
            <input type="hidden" id="Folio" name="Folio" value="<?php echo $_POST['Folio']; ?>">
            <label for="Motivo">Motivo</label>
            <input type="text" id="Motivo" name="Motivo" value="<?php echo $Fila[1]; ?>">
            <label for="Garantia">Garantia</label>
            <input type="text" id="Garantia" name="Garantia" value="<?php echo $Fila[2]; ?>">
            <label for="Referencia">Referencia</label>
            <input type="text" id="Referencia" name="Referencia" value="<?php echo $Fila[3]; ?>">
            <label for="Hora">Hora</label>
            <input type="text" id="Hora" name="Hora" value="<?php echo $Fila[4]; ?>">
            <label for="CalificacionBoleta">CalificacionBoleta</label>
            <input type="text" id="CalificacionBoleta" name="CalificacionBoleta" value="<?php echo $Fila[5]; ?>">
            <label for="Conductor">Conductor</label>
            <input type="text" id="Conductor" name="Conductor" value="<?php echo $Fila[6]; ?>">
            <label for="Fundamento">Fundamento</label>
            <input type="text" id="Fundamento" name="Fundamento" value="<?php echo $Fila[7]; ?>">
            <label for="Vehiculo">Vehiculo</label>
            <input type="number" id="Vehiculo" name="Vehiculo" value="<?php echo $Fila[8]; ?>">
            <label for="Observacion">Observacion</label>
            <input type="text" id="Observacion" name="Observacion" value="<?php echo $Fila[9]; ?>">
            <label for="IdAgente">Id Agente</label>
            <input type="number" id="IdAgente" name="IdAgente" value="<?php echo $Fila[10]; ?>">
            <label for="Id_Direccion">Id Direccion</label>
            <input type="number" id="Id_Direccion" name="Id_Direccion" value="<?php echo $Fila[11]; ?>">
            <label for="NumLicencia">Num Licencia</label>
            <input type="number" id="NumLicencia" name="NumLicencia" value="<?php echo $Fila[12]; ?>">
            <label for="FolioTarjeta">Folio Tarjeta</label>
            <input type="number" id="FolioTarjeta" name="FolioTarjeta" value="<?php echo $Fila[13]; ?>">
            <input type="submit" value="Actualizar">
        </form>
        <?php
        }

        if (isset($_POST['Motivo'])) {
            $Folio = $_POST['Folio'];
            $Motivo = $_POST['Motivo'];
            $Garantia = $_POST['Garantia'];
            $Referencia = $_POST['Referencia'];
            $Hora = $_POST['Hora'];
            $CalificacionBoleta = $_POST['CalificacionBoleta'];
            $Conductor = $_POST['Conductor'];
            $Fundamento = $_POST['Fundamento'];
            $Vehiculo = $_POST['Vehiculo'];
            $Observacion = $_POST['Observacion'];
            $IdAgente = $_POST['IdAgente'];
            $IdDireccion = $_POST['Id_Direccion'];
            $NumLicencia = $_POST['NumLicencia'];
            $FolioTarjeta = $_POST['FolioTarjeta'];

            $Con = Conectar();
            $SQL = "UPDATE Multas SET Motivo = '$Motivo', Garantia = '$Garantia', Referencia = '$Referencia', Hora = '$Hora', CalificacionBoleta = '$CalificacionBoleta', Conductor = '$Conductor', Fundamento = '$Fundamento', Vehiculo = '$Vehiculo', Observacion = '$Observacion', IdAgente = '$IdAgente', IdDireccion = '$IdDireccion', NumLicencia = '$NumLicencia', FolioTarjetaCirculacion = '$FolioTarjeta' WHERE Folio = '$Folio';";
            $ResultSet = Ejecutar($Con, $SQL);
            Desconectar($Con);
        };            