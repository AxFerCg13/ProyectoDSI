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
    <title>Formulario de Centro de Verificación</title>
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
        <h3>Formulario de Centro de Verificación</h3>
        <form method="get" action="ICentroVerificacion.php">
            <label for="Num_Centro">Número de Centro</label>
            <input type="number" id="Num_Centro" name="Num_Centro">
            <br>
            <label for="Municipio">Municipio</label>
            <input type="text" id="Municipio" name="Municipio">
            <br>
            <label for="Entidad">Entidad</label>
            <input type="text" id="Entidad" name="Entidad">
            <br>
            <label for="Nombre">Nombre</label>
            <input type="text" id="Nombre" name="Nombre">
            <br>
            <input type="submit">
        </form>
    </div>
</body>
</html>