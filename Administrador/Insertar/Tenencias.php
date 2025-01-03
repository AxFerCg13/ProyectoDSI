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
    <title>Formulario de Tenencias</title>
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
        <h3>Formulario de Tenencias</h3>
        <form method="post" action="ITenencias.php">
            <label for="ID">ID</label>
            <input type="number" id="ID" name="ID">
            <br>
            <label for="No_Tenencia">Número de Tenencia</label>
            <input type="text" id="No_Tenencia" name="No_Tenencia">
            <br>
            <label for="Fecha_Emision">Fecha de Emisión</label>
            <input type="date" id="Fecha_Emision" name="Fecha_Emision">
            <br>
            <label for="Fecha_Vencimiento">Fecha de Vencimiento</label>
            <input type="date" id="Fecha_Vencimiento" name="Fecha_Vencimiento">
            <br>
            <label for="Importe">Importe</label>
            <input type="number" id="Importe" name="Importe">
            <br>
            <label for="Estado_Pago">Estado de Pago</label>
            <input type="text" id="Estado_Pago" name="Estado_Pago">
            <br>
            <label for="No_Transaccion">Número de Transacción</label>
            <input type="text" id="No_Transaccion" name="No_Transaccion">
            <br>
            <label for="FolioTarjetaCirculacion">Folio Tarjeta de Circulación</label>
            <input type="number" id="FolioTarjetaCirculacion" name="FolioTarjetaCirculacion">
            <br>
            <input type="submit">
        </form>
    </div>
</body>
</html>
