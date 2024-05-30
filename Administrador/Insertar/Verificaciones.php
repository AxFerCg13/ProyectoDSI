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
    <title>Formulario de Verificaciones</title>
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
            font-size: 30px; /* Tamaño del título */
            font-weight: normal; /* Sin negritas */
        }
        .form-container label {
            font-weight: bold;
            color: #333;
            font-size: 16px;
        }
        .form-container input[type="text"],
        .form-container input[type="number"],
        .form-container input[type="datetime-local"],
        .form-container input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .form-container input[type="submit"] {
            background: #7386D5;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .form-container input[type="submit"]:hover {
            background: #6d7fcc;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h3>Formulario de Verificaciones</h3>
        <form method="get" action="IVerificaciones.php">
            <label for="Folio">Folio</label>
            <input type="number" id="Folio" name="Folio">
            <br>
            <label for="Vehiculo">Vehículo</label>
            <input type="text" id="Vehiculo" name="Vehiculo">
            <br>
            <label for="Numer_Linea_Verificacion">Número de línea de Verificación</label>
            <input type="number" id="Numer_Linea_Verificacion" name="Numer_Linea_Verificacion">
            <br>
            <label for="Tecnico_Verificador">Técnico Verificador</label>
            <input type="text" id="Tecnico_Verificador" name="Tecnico_Verificador">
            <br>
            <label for="Fecha_Expedicion">Fecha de Expedición</label>
            <input type="date" id="Fecha_Expedicion" name="Fecha_Expedicion">
            <br>
            <label for="Hora_Entrada">Hora de Entrada</label>
            <input type="datetime-local" id="Hora_Entrada" name="Hora_Entrada">
            <br>
            <label for="Hora_Salida">Hora de Salida</label>
            <input type="datetime-local" id="Hora_Salida" name="Hora_Salida">
            <br>
            <label for="Motivo">Motivo</label>
            <input type="text" id="Motivo" name="Motivo">
            <br>
            <label for="Folio_Certificado">Folio del Certificado</label>
            <input type="number" id="Folio_Certificado" name="Folio_Certificado">
            <br>
            <label for="Semestre">Semestre</label>
            <input type="number" id="Semestre" name="Semestre">
            <br>
            <label for="Codigo_Barras">Código de Barras</label>
            <input type="number" id="Codigo_Barras" name="Codigo_Barras">
            <br>
            <label for="Numero_Centro">Número de Centro</label>
            <input type="number" id="Numero_Centro" name="Numero_Centro">
            <br>
            <input type="submit">
        </form>
    </div>
</body>
</html>
