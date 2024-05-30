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
            max-width: 800px; /* Aumenté el ancho para acomodar más campos */
            margin: auto;
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
        <h3>Formulario de Vehículos</h3>
        <form method="post">
            <label for="Id_Vehiculo">Id_Vehiculo</label>
            <input type="number" id="Id_Vehiculo" name="Id_Vehiculo">
            <input type="submit">
        </form>

        <?php
        include("Controlador.php");
        if (isset($_POST['Id_Vehiculo'])) {
            $Id_Vehiculo = $_POST['Id_Vehiculo'];
            $Con = Conectar();
            $SQL = "SELECT * FROM Vehiculos WHERE id = '$Id_Vehiculo';";
            $ResultSet = Ejecutar($Con, $SQL);
            $Fila = mysqli_fetch_row($ResultSet);
            Desconectar($Con);
        ?>
        <form method="post">
            <input type="hidden" id="Id_Vehiculo" name="Id_Vehiculo" value="<?php echo $_POST['Id_Vehiculo']; ?>">
            <label for="Clase">Clase</label>
            <input type="text" id="Clase" name="Clase" value="<?php echo $Fila[1]; ?>">
            <label for="TipoServicio">Tipo de Servicio</label>
            <input type="text" id="TipoServicio" name="TipoServicio" value="<?php echo $Fila[2]; ?>">
            <label for="Uso">Uso</label>
            <input type="text" id="Uso" name="Uso" value="<?php echo $Fila[3]; ?>">
            <label for="Anio">Anio</label>
            <input type="text" id="Anio" name="Anio" value="<?php echo $Fila[4]; ?>">
            <label for="NoSerie">NoSerie</label>
            <input type="text" id="NoSerie" name="NoSerie" value="<?php echo $Fila[5]; ?>">
            <label for="EstadoProcedencia">EstadoProcedencia</label>
            <input type="text" id="EstadoProcedencia" name="EstadoProcedencia" value="<?php echo $Fila[6]; ?>">
            <label for="TipoCarroceria">TipoCarroceria</label>
            <input type="text" id="TipoCarroceria" name="TipoCarroceria" value="<?php echo $Fila[7]; ?>">
            <label for="Origen">Origen</label>
            <input type="text" id="Origen" name="Origen" value="<?php echo $Fila[8]; ?>">
            <label for="Color">Color</label>
            <input type="text" id="Color" name="Color" value="<?php echo $Fila[9]; ?>">
            <label for="Cilindraje">Cilindraje</label>
            <input type="text" id="Cilindraje" name="Cilindraje" value="<?php echo $Fila[10]; ?>">
            <label for="Capacidad">Capacidad</label>
            <input type="text" id="Capacidad" name="Capacidad" value="<?php echo $Fila[11]; ?>">
            <label for="NoPuerta">NoPuerta</label>
            <input type="text" id="NoPuerta" name="NoPuerta" value="<?php echo $Fila[12]; ?>">
            <label for="NoAsiento">NoAsiento</label>
            <input type="text" id="NoAsiento" name="NoAsiento" value="<?php echo $Fila[13]; ?>">
            <label for="Combustible">Combustible</label>
            <input type="text" id="Combustible" name="Combustible" value="<?php echo $Fila[14]; ?>">
            <label for="Transmision">Transmision</label>
            <input type="text" id="Transmision" name="Transmision" value="<?php echo $Fila[15]; ?>">
            <label for="RFA">RFA</label>
            <input type="text" id="RFA" name="RFA" value="<?php echo $Fila[16]; ?>">
            <label for="CveVehicular">CveVehicular</label>
            <input type="text" id="CveVehicular" name="CveVehicular" value="<?php echo $Fila[17]; ?>">
            <label for="Marca">Marca</label>
            <input type="text" id="Marca" name="Marca" value="<?php echo $Fila[18]; ?>">
            <label for="Linea">Linea</label>
            <input type="text" id="Linea" name="Linea" value="<?php echo $Fila[19]; ?>">
            <label for="Sublinea">Sublinea</label>
            <input type="text" id="Sublinea" name="Sublinea" value="<?php echo $Fila[20]; ?>">
            <label for="NIV">NIV</label>
            <input type="text" id="NIV" name="NIV" value="<?php echo $Fila[21]; ?>">
            <!-- Agregué más campos aquí -->
            <input type="submit">
        </form>
        <?php
        }

        if (isset($_POST['Clase'])) {
            $Id_Vehiculo = $_POST['Id_Vehiculo'];
            $Clase = $_POST['Clase'];
            $TipoServicio = $_POST['TipoServicio'];
            $Uso = $_POST['Uso'];
            $Anio = $_POST['Anio']; 
            $NoSerie = $_POST['NoSerie']; 
            $EstadoProcedencia = $_POST['EstadoProcedencia']; 
            $TipoCarroceria = $_POST['TipoCarroceria'];
            $Origen = $_POST['Origen']; 
            $Color = $_POST['Color']; 
            $Cilindraje = $_POST['Cilindraje']; 
            $Capacidad = $_POST['Capacidad']; 
            $NoPuerta = $_POST['NoPuerta']; 
            $NoAsiento = $_POST['NoAsiento']; 
            $Combustible = $_POST['Combustible']; 
            $Transmision = $_POST['Transmision']; 
            $RFA = $_POST['RFA']; 
            $CveVehicular = $_POST['CveVehicular']; 
            $Marca = $_POST['Marca']; 
            $Linea = $_POST['Linea']; 
            $Sublinea = $_POST['Sublinea']; 
            $NIV = $_POST['NIV']; 
            // Incluye el resto de los campos aquí

            $Con = Conectar();
            $SQL = "UPDATE Vehiculos SET Clase = '$Clase', TipoServicio = '$TipoServicio', Uso = '$Uso', Anio = '$Anio', NoSerie = '$NoSerie', EstadoProcedencia = '$EstadoProcedencia', TipoCarroceria = '$TipoCarroceria', Origen = '$Origen', Color = '$Color', Cilindraje = '$Cilindraje', Capacidad = '$Capacidad', NoPuerta = '$NoPuerta', NoAsiento = '$NoAsiento', Combustible = '$Combustible', Transmision = '$Transmision', RFA = '$RFA', CveVehicular = '$CveVehicular', Marca = '$Marca', Linea = '$Linea', Sublinea = '$Sublinea', NIV = '$NIV' WHERE id = '$Id_Vehiculo';";
            // Agrega el resto de los campos a la consulta SQL aquí

            $ResultSet = Ejecutar($Con, $SQL);
            Desconectar($Con);
            header("Location: UVehiculos.php");
        }
        ?>
    </div>
</body>
</html>
