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
    <title>Formulario de Agentes</title>
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
        .form-container input[type="file"] {
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
        <h3>Formulario de Agentes</h3>
        <form method="post">
            <label for="Id_Agente">Id_Agente</label>
            <input type="number" id="Id_Agente" name="Id_Agente">
            <input type="submit" value="Buscar">
        </form>

        <?php
        include("Controlador.php");
        if (isset($_POST['Id_Agente'])) {
            $Id_Agente = $_POST['Id_Agente'];
            $Con = Conectar();
            $SQL = "SELECT * FROM Agentes WHERE Id = '$Id_Agente';";
            $ResultSet = Ejecutar($Con, $SQL);
            $Fila = mysqli_fetch_row($ResultSet);
            Desconectar($Con);
        ?>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" id="Id_Agente" name="Id_Agente" value="<?php echo $_POST['Id_Agente']; ?>">
            <label for="Nombre">Nombre</label>
            <input type="text" id="Nombre" name="Nombre" value="<?php echo $Fila[1]; ?>">
            <label for="Firma">Firma</label>
            <input type="file" id="Firma" name="Firma">
            <label for="Grupo">Grupo</label>
            <input type="text" id="Grupo" name="Grupo" value="<?php echo $Fila[3]; ?>">
            <input type="submit" value="Actualizar">
        </form>
        <?php
        }

        if (isset($_POST['Nombre'])) {
            $Id_Agente = $_POST['Id_Agente'];
            $Nombre = $_POST['Nombre'];
            $Grupo = $_POST['Grupo'];

            // Directorio de destino para la firma
            $carpetaFirma = "../../img/Agentes/firmasAgentes/";
            $firmaValida = false;
            $imagenFirma = "";

            // Tipos de archivos permitidos
            $tiposPermitidos = array("image/jpeg", "image/png", "image/gif");

            if (isset($_FILES["Firma"]) && $_FILES["Firma"]["error"] == 0) {
                $fileFirma = $_FILES["Firma"];
                $nombreFirma = $fileFirma["name"];
                $tipoFirma = $fileFirma["type"];
                $ruta_provisionalFirma = $fileFirma["tmp_name"];
                $sizeFirma = $fileFirma["size"];

                if (in_array($tipoFirma, $tiposPermitidos)) {
                    // Verificar el tamaño (máximo 3MB)
                    if ($sizeFirma <= 3 * 1024 * 1024) {
                        $destinoFirma = $carpetaFirma . $nombreFirma;
                        if (move_uploaded_file($ruta_provisionalFirma, $destinoFirma)) {
                            echo "La firma ha sido subida exitosamente.<br>";
                            $firmaValida = true;
                            $imagenFirma = $destinoFirma;
                        } else {
                            echo "Error al mover la firma.<br>";
                        }
                    } else {
                        echo "Error, el tamaño máximo permitido para la firma es de 3MB.<br>";
                    }
                } else {
                    echo "Error, la firma no es una imagen válida.<br>";
                }
            } else {
                $firmaValida = true; // Si no se subió un archivo nuevo, mantener el existente
                $imagenFirma = $Fila[2]; // Mantener la firma existente en la base de datos
            }

            if ($firmaValida) {
                $Con = Conectar();
                $SQL = "UPDATE Agentes SET Nombre = '$Nombre', Firma = '$imagenFirma', Grupo = '$Grupo' WHERE Id = '$Id_Agente';";
                $ResultSet = Ejecutar($Con, $SQL);
                Desconectar($Con);
                header("Location: UAgentes.php");
            }
        }
        ?>
    </div>

  
</body>
</html>