<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Direcciones</title>
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
        <h3>Formulario de Direcciones</h3>
        <form method="post">
            <label for="Id_Direccion">Id_Direccion</label>
            <input type="number" id="Id_Direccion" name="Id_Direccion">
            <input type="submit" value="Buscar">
        </form>

        <?php
        include("Controlador.php");
        if (isset($_POST['Id_Direccion'])) {
            $Id_Direccion = $_POST['Id_Direccion'];
            $Con = Conectar();
            $SQL = "SELECT * FROM Direcciones WHERE Id = '$Id_Direccion';";
            $ResultSet = Ejecutar($Con, $SQL);
            $Fila = mysqli_fetch_row($ResultSet);
            Desconectar($Con);
        ?>
        <form method="post">
            <input type="hidden" id="Id_Direccion" name="Id_Direccion" value="<?php echo $_POST['Id_Direccion']; ?>">
            <label for="Localidad">Localidad</label>
            <input type="text" id="Localidad" name="Localidad" value="<?php echo $Fila[1]; ?>">
            <label for="Municipio">Municipio</label>
            <input type="text" id="Municipio" name="Municipio" value="<?php echo $Fila[2]; ?>">
            <label for="Codigo_Postal">Codigo_Postal</label>
            <input type="text" id="Codigo_Postal" name="Codigo_Postal" value="<?php echo $Fila[3]; ?>">
            <label for="Calle">Calle</label>
            <input type="text" id="Calle" name="Calle" value="<?php echo $Fila[4]; ?>">
            <label for="Numero">Numero</label>
            <input type="number" id="Numero" name="Numero" value="<?php echo $Fila[5]; ?>">    
            <input type="submit" value="Actualizar">
        </form>
        <?php
        }

        if (isset($_POST['Localidad'])) {
            $Id_Direccion = $_POST['Id_Direccion'];
            $Localidad = $_POST['Localidad'];
            $Municipio = $_POST['Municipio'];
            $Codigo_Postal = $_POST['Codigo_Postal'];
            $Calle = $_POST['Calle'];
            $Numero = $_POST['Numero'];

            $Con = Conectar();
            $SQL = "UPDATE Direcciones SET Localidad = '$Localidad', Municipio = '$Municipio', CodigoPostal = '$Codigo_Postal', Calle = '$Calle', Numero = '$Numero' WHERE Id = '$Id_Direccion';";
            $ResultSet = Ejecutar($Con, $SQL);
            Desconectar($Con);
            header("Location: UDirecciones.php");
        }
        ?>
    </div>
</body>
</html>
