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
    <title>Formulario de Vehículos</title>
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
        <h3>Formulario de Vehículos</h3>
        <form method="post" action="IVehiculos.php">
            <label for="ID">ID</label>
            <input type="number" id="ID" name="ID">
            <br>
            <label for="Clase">Clase</label>
            <input type="text" id="Clase" name="Clase">
            <br>
            <label for="Tipo_Servicio">Tipo de Servicio</label>
            <input type="text" id="Tipo_Servicio" name="Tipo_Servicio">
            <br>
            <label for="Uso">Uso</label>
            <input type="text" id="Uso" name="Uso">
            <br>
            <label for="Año">Año</label>
            <input type="number" id="Año" name="Año">
            <br>
            <label for="No_Serie">Número de Serie</label>
            <input type="text" id="No_Serie" name="No_Serie">
            <br>
            <label for="Estado_Procedencia">Estado de Procedencia</label>
            <input type="text" id="Estado_Procedencia" name="Estado_Procedencia">
            <br>
            <label for="Tipo_Carroceria">Tipo de Carrocería</label>
            <input type="text" id="Tipo_Carroceria" name="Tipo_Carroceria">
            <br>
            <label for="Origen">Origen</label>
            <input type="text" id="Origen" name="Origen">
            <br>
            <label for="Color">Color</label>
            <input type="text" id="Color" name="Color">
            <br>
            <label for="Cilindraje">Cilindraje</label>
            <input type="number" id="Cilindraje" name="Cilindraje">
            <br>
            <label for="Capacidad">Capacidad</label>
            <input type="number" id="Capacidad" name="Capacidad">
            <br>
            <label for="No_Puerta">Número de Puertas</label>
            <input type="number" id="No_Puerta" name="No_Puerta">
            <br>
            <label for="No_Asiento">Número de Asientos</label>
            <input type="number" id="No_Asiento" name="No_Asiento">
            <br>
            <label for="Combustible">Combustible</label>
            <input type="text" id="Combustible" name="Combustible">
            <br>
            <label for="Transmision">Transmisión</label>
            <input type="text" id="Transmision" name="Transmision">
            <br>
            <label for="RFA">RFA</label>
            <input type="text" id="RFA" name="RFA">
            <br>
            <label for="Cve_Vehicular">Clave Vehicular</label>
            <input type="number" id="Cve_Vehicular" name="Cve_Vehicular">
            <br>
            <label for="Marca">Marca</label>
            <input type="text" id="Marca" name="Marca">
            <br>
            <label for="Linea">Línea</label>
            <input type="text" id="Linea" name="Linea">
            <br>
            <label for="Sublinea">Sublínea</label>
            <input type="text" id="Sublinea" name="Sublinea">
            <br>
            <label for="NIV">NIV</label>
            <input type="text" id="NIV" name="NIV">
            <br>
            <input type="submit">
        </form>
    </div>
</body>
</html>
