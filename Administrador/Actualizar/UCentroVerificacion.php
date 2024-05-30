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
    <title>Formulario de Centros de Verificación</title>
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
        <h3>Formulario de Centros de Verificación</h3>
        <form method="post">
            <label for="Num_Centro">Num_Centro</label>
            <input type="number" id="Num_Centro" name="Num_Centro">
            <input type="submit" value="Buscar">
        </form>

        <?php
        include("Controlador.php");
        if (isset($_POST['Num_Centro'])) {
            $Num_Centro = $_POST['Num_Centro'];
            $Con = Conectar();
            $SQL = "SELECT * FROM CentroVerificacion WHERE numCentro = '$Num_Centro';";
            $ResultSet = Ejecutar($Con, $SQL);
            $Fila = mysqli_fetch_row($ResultSet);
            Desconectar($Con);
        ?>
        <form method="post">
            <input type="hidden" id="Num_Centro" name="Num_Centro" value="<?php echo $_POST['Num_Centro']; ?>">
            <label for="Municipio">Municipio</label>
            <input type="text" id="Municipio" name="Municipio" value="<?php echo $Fila[1]; ?>">
            <label for="Entidad">Entidad</label>
            <input type="text" id="Entidad" name="Entidad" value="<?php echo $Fila[2]; ?>">
            <label for="Nombre">Nombre</label>
            <input type="text" id="Nombre" name="Nombre" value="<?php echo $Fila[3]; ?>">
            <input type="submit" value="Actualizar">
        </form>
        <?php
        }

        if (isset($_POST['Municipio'])) {
            $Num_Centro = $_POST['Num_Centro'];
            $Municipio = $_POST['Municipio'];
            $Entidad = $_POST['Entidad'];
            $Nombre = $_POST['Nombre'];

            $Con = Conectar();
            $SQL = "UPDATE CentroVerificacion SET Municipio = '$Municipio', Entidad = '$Entidad', Nombre = '$Nombre' WHERE numCentro = '$Num_Centro';";
            $ResultSet = Ejecutar($Con, $SQL);
            Desconectar($Con);
            header("Location: UCentroVerificacion.php");
        }
        ?>
    </div>
</body>
</html>
