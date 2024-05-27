<html>
    <form method="post">
        <label>Id_Agente</label>
        <input type="number" id="Id_Agente" name="Id_Agente">
        <input type="submit">
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
        <label>Nombre</label>
        <input type="text" id="Nombre" name="Nombre" value="<?php echo $Fila[1]; ?>">
        <label>Firma</label>
        <input type="file" id="Firma" name="Firma">
        <label>Grupo</label>
        <input type="text" id="Grupo" name="Grupo" value="<?php echo $Fila[3]; ?>">
        <input type="submit">
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

</html>
