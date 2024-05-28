<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Conductores</title>
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
        .form-container input[type="number"],
        .form-container input[type="date"] {
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
        <h3>Formulario de Conductores</h3>
        <form method="post">
            <label for="Id_Conductor">Id_Conductor</label>
            <input type="number" id="Id_Conductor" name="Id_Conductor">
            <input type="submit" value="Buscar">
        </form>

        <?php
        include("Controlador.php");
        if (isset($_POST['Id_Conductor'])) {
            $Id_Conductor = $_POST['Id_Conductor'];
            $Con = Conectar();
            $SQL = "SELECT * FROM Conductores WHERE Id = '$Id_Conductor';";
            $ResultSet = Ejecutar($Con, $SQL);
            $Fila = mysqli_fetch_row($ResultSet);
            Desconectar($Con);
        ?>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" id="Id_Conductor" name="Id_Conductor" value="<?php echo $_POST['Id_Conductor']; ?>">
            <label for="Nombre">Nombre</label>
            <input type="text" id="Nombre" name="Nombre" value="<?php echo $Fila[1]; ?>">
            <label for="FechaNacimiento">FechaNacimiento</label>
            <input type="date" id="FechaNacimiento" name="FechaNacimiento" value="<?php echo $Fila[2]; ?>">
            <label for="Foto">Foto</label>
            <input type="file" id="Foto" name="Foto">
            <label for="Firma">Firma</label>
            <input type="file" id="Firma" name="Firma">
            <label for="RFC">RFC</label>
            <input type="text" id="RFC" name="RFC" value="<?php echo $Fila[5]; ?>">
            <label for="Domicilio">Domicilio</label>
            <input type="text" id="Domicilio" name="Domicilio" value="<?php echo $Fila[6]; ?>">
            <label for="TipoSangre">TipoSangre</label>
            <input type="text" id="TipoSangre" name="TipoSangre" value="<?php echo $Fila[7]; ?>">
            <label for="Donador">Donador</label>
            <input type="text" id="Donador" name="Donador" value="<?php echo $Fila[8]; ?>">
            <label for="CURP">CURP</label>
            <input type="text" id="CURP" name="CURP" value="<?php echo $Fila[9]; ?>">
            <label for="Id_Direccion">Id_Direccion</label>
            <input type="number" id="Id_Direccion" name="Id_Direccion" value="<?php echo $Fila[10]; ?>">
            <input type="submit" value="Actualizar">
        </form>
        <?php
        }

        if (isset($_POST['Nombre'])) {
            $Id_Conductor = $_POST['Id_Conductor'];
            $Nombre = $_POST['Nombre'];
            $FechaNacimiento = $_POST['FechaNacimiento'];
            $RFC = $_POST['RFC'];
            $Domicilio = $_POST['Domicilio'];
            $TipoSangre = $_POST['TipoSangre'];
            $Donador = $_POST['Donador'];
            $CURP = $_POST['CURP'];
            $Id_Direccion = $_POST['Id_Direccion'];

            // Tipos de archivos permitidos
            $tiposPermitidos = array("image/jpeg", "image/png", "image/gif");

            // Directorios de destino para las imágenes
            $directorioFotos = "../../img/Conductores/fotosConductores/";
            $directorioFirmas = "../../img/Conductores/fotosFirmas/";

            // Validación y procesamiento de la foto
            $fotoValida = false;
            $imagenFoto = "";
            if (isset($_FILES["Foto"]) && $_FILES["Foto"]["error"] == 0) {
                // Procesamiento de la foto
            } else {
                $fotoValida = true; // Si no se subió un archivo nuevo, mantener el existente
            }

            // Validación y procesamiento de la firma
            $firmaValida = false;
            $imagenFirma = "";
            if (isset($_FILES["Firma"]) && $_FILES["Firma"]["error"] == 0) {
                // Procesamiento de la firma
            } else {
                $firmaValida = true; // Si no se subió un archivo nuevo, mantener el existente
            }

            if ($fotoValida && $firmaValida) {
                // Actualización de la base de datos
            }
        }
        ?>
    </div>
</body>
</html>
