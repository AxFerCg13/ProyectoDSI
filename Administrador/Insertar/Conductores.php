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
    <title>Formulario de Conductores</title>
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
        .form-container input[type="date"],
        .form-container input[type="file"] {
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
        <h3>Formulario de Conductores</h3>
        <form method="post" action="IConductores.php" enctype="multipart/form-data">
            <label for="ID">ID</label>
            <input type="number" id="ID" name="ID">
            <br>
            <label for="Nombre">Nombre</label>
            <input type="text" id="Nombre" name="Nombre">
            <br>
            <label for="Fecha_Nacimiento">Fecha de Nacimiento</label>
            <input type="date" id="Fecha_Nacimiento" name="Fecha_Nacimiento">
            <br>
            <label for="Foto">Foto</label>
            <input type="file" id="Foto" name="Foto">
            <br>
            <label for="Firma">Firma</label>
            <input type="file" id="Firma" name="Firma">
            <br>
            <label for="RFC">RFC</label>
            <input type="text" id="RFC" name="RFC">
            <br>
            <label for="Domicilio">Domicilio</label>
            <input type="text" id="Domicilio" name="Domicilio">
            <br>
            <label for="Tipo_Sangre">Tipo de Sangre</label>
            <input type="text" id="Tipo_Sangre" name="Tipo_Sangre">
            <br>
            <label for="Donador">Donador</label>
            <input type="text" id="Donador" name="Donador">
            <br>
            <label for="CURP">CURP</label>
            <input type="text" id="CURP" name="CURP">
            <br>
            <label for="ID_Direccion">ID de Direccion</label>
            <input type="number" id="ID_Direccion" name="ID_Direccion">
            <br>
            <input type="submit">
        </form>
    </div>
</body>
</html>
