<html>
    <form method="post">
        <label>Id_Conductor</label>
        <input type="number" id="Id_Conductor" name="Id_Conductor">
        <input type="submit">
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
        <label>Nombre</label>
        <input type="text" id="Nombre" name="Nombre" value="<?php echo $Fila[1]; ?>">
        <label>FechaNacimiento</label>
        <input type="date" id="FechaNacimiento" name="FechaNacimiento" value="<?php echo $Fila[2]; ?>">
        <label>Foto</label>
        <input type="file" id="Foto" name="Foto">
        <label>Firma</label>
        <input type="file" id="Firma" name="Firma">
        <label>RFC</label>
        <input type="text" id="RFC" name="RFC" value="<?php echo $Fila[5]; ?>">
        <label>Domicilio</label>
        <input type="text" id="Domicilio" name="Domicilio" value="<?php echo $Fila[6]; ?>">
        <label>TipoSangre</label>
        <input type="text" id="TipoSangre" name="TipoSangre" value="<?php echo $Fila[7]; ?>">
        <label>Donador</label>
        <input type="text" id="Donador" name="Donador" value="<?php echo $Fila[8]; ?>">
        <label>CURP</label>
        <input type="text" id="CURP" name="CURP" value="<?php echo $Fila[9]; ?>">
        <label>Id_Direccion</label>
        <input type="number" id="Id_Direccion" name="Id_Direccion" value="<?php echo $Fila[10]; ?>">
        <input type="submit">
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
        $fileFoto = $_FILES["Foto"];
        $nombreFoto = $fileFoto["name"];
        $tipoFoto = $fileFoto["type"];
        $ruta_provisionalFoto = $fileFoto["tmp_name"];
        $sizeFoto = $fileFoto["size"];
        $dimensionesFoto = getimagesize($ruta_provisionalFoto);

        if (in_array($tipoFoto, $tiposPermitidos)) {
            // Verificar el tamaño (máximo 3MB)
            if ($sizeFoto <= 3 * 1024 * 1024) {
                $destinoFoto = $directorioFotos . $nombreFoto;
                if (move_uploaded_file($ruta_provisionalFoto, $destinoFoto)) {
                    echo "La foto ha sido subida exitosamente.<br>";
                    $fotoValida = true;
                    $imagenFoto = $destinoFoto;
                } else {
                    echo "Error al mover la foto.<br>";
                }
            } else {
                echo "Error, el tamaño máximo permitido para la foto es de 3MB.<br>";
            }
        } else {
            echo "Error, la foto no es una imagen válida.<br>";
        }
    } else {
        $fotoValida = true; // Si no se subió un archivo nuevo, mantener el existente
    }

    // Validación y procesamiento de la firma
    $firmaValida = false;
    $imagenFirma = "";
    if (isset($_FILES["Firma"]) && $_FILES["Firma"]["error"] == 0) {
        $fileFirma = $_FILES["Firma"];
        $nombreFirma = $fileFirma["name"];
        $tipoFirma = $fileFirma["type"];
        $ruta_provisionalFirma = $fileFirma["tmp_name"];
        $sizeFirma = $fileFirma["size"];
        $dimensionesFirma = getimagesize($ruta_provisionalFirma);

        if (in_array($tipoFirma, $tiposPermitidos)) {
            // Verificar el tamaño (máximo 3MB)
            if ($sizeFirma <= 3 * 1024 * 1024) {
                $destinoFirma = $directorioFirmas . $nombreFirma;
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
    }

    if ($fotoValida && $firmaValida) {
        $Con = Conectar();
        if ($imagenFoto != "" && $imagenFirma != "") {
            // Si hay una nueva foto y firma, actualizar con las nuevas imágenes
            $SQL = "UPDATE Conductores SET Nombre = '$Nombre', FechaNacimiento = '$FechaNacimiento', Foto = '$imagenFoto',
            Firma = '$imagenFirma', RFC = '$RFC', Domicilio = '$Domicilio', TipoSangre = '$TipoSangre', 
            Donador = '$Donador', CURP = '$CURP', IdDireccion = '$Id_Direccion' WHERE Id = '$Id_Conductor';";
        } else if ($imagenFoto != "") {
            // Si hay una nueva foto, pero no nueva firma
            $SQL = "UPDATE Conductores SET Nombre = '$Nombre', FechaNacimiento = '$FechaNacimiento', Foto = '$imagenFoto',
            RFC = '$RFC', Domicilio = '$Domicilio', TipoSangre = '$TipoSangre', Donador = '$Donador', CURP = '$CURP', 
            IdDireccion = '$Id_Direccion' WHERE Id = '$Id_Conductor';";
        } else if ($imagenFirma != "") {
            // Si hay una nueva firma, pero no nueva foto
            $SQL = "UPDATE Conductores SET Nombre = '$Nombre', FechaNacimiento = '$FechaNacimiento',
            Firma = '$imagenFirma', RFC = '$RFC', Domicilio = '$Domicilio', TipoSangre = '$TipoSangre', 
            Donador = '$Donador', CURP = '$CURP', IdDireccion = '$Id_Direccion' WHERE Id = '$Id_Conductor';";
        } else {
            // Si no hay nuevas imágenes
            $SQL = "UPDATE Conductores SET Nombre = '$Nombre', FechaNacimiento = '$FechaNacimiento', RFC = '$RFC', 
            Domicilio = '$Domicilio', TipoSangre = '$TipoSangre', Donador = '$Donador', CURP = '$CURP', 
            IdDireccion = '$Id_Direccion' WHERE Id = '$Id_Conductor';";
        }
        $ResultSet = Ejecutar($Con, $SQL);
        Desconectar($Con);
        header("Location: UConductores.php");
    }
}
?>

</html>
