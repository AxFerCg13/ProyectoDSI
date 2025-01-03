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
        .form-container input[type="time"] {
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
        <h3>Formulario de Multas</h3>
        <form method="post" action="IMultas.php">
            <label for="Folio">Folio</label>
            <input type="number" id="Folio" name="Folio">
            <br>
            <label for="Motivo">Motivo</label>
            <input type="text" id="Motivo" name="Motivo">
            <br>
            <label for="Garantia">Garantía</label>
            <input type="text" id="Garantia" name="Garantia">
            <br>
            <label for="Referencia">Referencia</label>
            <input type="text" id="Referencia" name="Referencia">
            <br>
            <label for="Hora">Hora</label>
            <input type="time" id="Hora" name="Hora">
            <br>
            <label for="Calificacion_Boleta">Calificación Boleta</label>
            <input type="text" id="Calificacion_Boleta" name="Calificacion_Boleta">
            <br>
            <label for="Conductor">Conductor</label>
            <input type="text" id="Conductor" name="Conductor">
            <br>
            <label for="Fundamento">Fundamento</label>
            <input type="text" id="Fundamento" name="Fundamento">
            <br>
            <label for="Vehiculo">Vehículo</label>
            <input type="number" id="Vehiculo" name="Vehiculo">
            <br>
            <label for="Observacion">Observación</label>
            <input type="text" id="Observacion" name="Observacion">
            <br>
            <label for="ID_Agente">ID del Agente</label>
            <input type="number" id="ID_Agente" name="ID_Agente">
            <br>
            <label for="ID_Direccion">ID Dirección</label>
            <input type="number" id="ID_Direccion" name="ID_Direccion">
            <br>
            <label for="Num_Licencia">Número de Licencia</label>
            <input type="number" id="Num_Licencia" name="Num_Licencia">
            <br>
            <label for="Folio_Tarjeta_Circulacion">Folio Tarjeta de Circulación</label>
            <input type="number" id="Folio_Tarjeta_Circulacion" name="Folio_Tarjeta_Circulacion">
            <br>
            <input type="submit">
        </form>
    </div>
</body>
</html>
