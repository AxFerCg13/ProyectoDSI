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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Propietarios</title>
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
        <h3>Formulario de Propietarios</h3>
        <form method="post">
            <label for="Id_Propietario">ID Propietario</label>
            <input type="number" id="Id_Propietario" name="Id_Propietario">
            <input type="submit" value="Buscar">
        </form>

        <?php
        include("Controlador.php");
        if (isset($_POST['Id_Propietario'])) {
            $Id_Propietario = $_POST['Id_Propietario'];
            $Con = Conectar();
            $SQL = "SELECT * FROM Propietarios WHERE Id = '$Id_Propietario';";
            $ResultSet = Ejecutar($Con, $SQL);
            $Fila = mysqli_fetch_row($ResultSet);
            Desconectar($Con);
        ?>
        <form method="post">
            <input type="hidden" id="Id_Propietario" name="Id_Propietario" value="<?php echo $_POST['Id_Propietario']; ?>">
            <label for="Nombre">Nombre</label>
            <input type="text" id="Nombre" name="Nombre" value="<?php echo $Fila[1]; ?>">
            <label for="Direccion">Dirección</label>
            <input type="text" id="Direccion" name="Direccion" value="<?php echo $Fila[2]; ?>">
            <label for="RFC">RFC</label>
            <input type="text" id="RFC" name="RFC" value="<?php echo $Fila[3]; ?>">
            <label for="IdDireccion">ID Dirección</label>
            <input type="number" id="IdDireccion" name="IdDireccion" value="<?php echo $Fila[4]; ?>">
            <input type="submit" value="Actualizar">
        </form>
        <?php
        }

        if (isset($_POST['Nombre'])) {
            $Id_Propietario = $_POST['Id_Propietario'];
            $Nombre = $_POST['Nombre'];
            $Direccion = $_POST['Direccion'];
            $RFC = $_POST['RFC'];
            $IdDireccion = $_POST['IdDireccion'];
            
            $Con = Conectar();
            $SQL = "UPDATE Propietarios SET Nombre = '$Nombre', Direccion = '$Direccion', RFC = '$RFC', IdDireccion = '$IdDireccion' WHERE Id = '$Id_Propietario';";
            $ResultSet = Ejecutar($Con, $SQL);
            Desconectar($Con);
            header("Location: UPropietarios.php");
        }
        ?>
    </div>
</body>
</html>
