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
    <title>Formulario de Tarjetas de Circulación</title>
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
        .form-container input[type="number"] {
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
        <h3>Formulario de Tarjetas de Circulación</h3>
        <form method="post" action="ITarjetasCirculacion.php">
            <label for="Folio">Folio</label>
            <input type="number" id="Folio" name="Folio">
            <br>
            <label for="Propietario">Propietario</label>
            <input type="text" id="Propietario" name="Propietario">
            <br>
            <label for="Tipo_Servicio">Tipo de Servicio</label>
            <input type="text" id="Tipo_Servicio" name="Tipo_Servicio">
            <br>
            <label for="Vigencia">Vigencia</label>
            <input type="text" id="Vigencia" name="Vigencia">
            <br>
            <label for="Placa">Placa</label>
            <input type="text" id="Placa" name="Placa">
            <br>
            <label for="Holograma">Holograma</label>
            <input type="text" id="Holograma" name="Holograma">
            <br>
            <label for="Oficina_Expedidora">Oficina Expedidora</label>
            <input type="text" id="Oficina_Expedidora" name="Oficina_Expedidora">
            <br>
            <label for="Placa_Anterior">Placa Anterior</label>
            <input type="text" id="Placa_Anterior" name="Placa_Anterior">
            <br>
            <label for="ID_Vehiculo">ID del Vehículo</label>
            <input type="number" id="ID_Vehiculo" name="ID_Vehiculo">
            <br>
            <label for="ID_Propietario">ID del Propietario</label>
            <input type="number" id="ID_Propietario" name="ID_Propietario">
            <br>
            <input type="submit">
        </form>
    </div>
</body>
</html>
