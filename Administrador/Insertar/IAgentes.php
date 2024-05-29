<?php

// Recepción de los datos
$Id_Agente = $_POST['ID']; 
$Nombre = $_POST['Nombre'];
$Grupo = $_POST['Grupo'];

// Lista de tipos permitidos
$tiposPermitidos = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];

$firmaValida = false;

// Validación de la firma
if (isset($_FILES["Firma"])) {
    $file = $_FILES["Firma"];
    $nombreFirma = $file["name"];
    $tipoFirma = $file["type"];
    $ruta_provisionalFirma = $file["tmp_name"];
    $sizeFirma = $file["size"];
    $dimensionesFirma = getimagesize($ruta_provisionalFirma);
    $widthFirma = $dimensionesFirma[0];
    $heightFirma = $dimensionesFirma[1];
    $carpetaFirma = "../../img/Agentes/firmasAgentes/";

    if (in_array($tipoFirma, $tiposPermitidos)) {
        // Verificar el tamaño (máximo 3MB)
        if ($sizeFirma <= 3 * 1024 * 1024) { // 3MB en bytes
            $destinoFirma = $carpetaFirma . $nombreFirma;
            if (move_uploaded_file($ruta_provisionalFirma, $destinoFirma)) {
                echo "La firma ha sido subida exitosamente.<br>";
                $firmaValida = true;
                $imagenFirma = $destinoFirma; // Ruta completa de la imagen guardada
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
    echo "No se ha seleccionado ninguna firma.<br>";
}

// Si la firma es válida, realizar la inserción en la base de datos
if ($firmaValida) {
    // Imprimir
    echo "IdAgente=" . $Id_Agente . "<br>";
    echo "Nombre=" . $Nombre . "<br>";
    echo "Firma=" . $imagenFirma . "<br>";
    echo "Grupo=" . $Grupo . "<br>";

    // Formar la instrucción SQL - se van a ocupar las variables anteriores
    $SQL = "INSERT INTO Agentes (Nombre, Firma, Grupo) VALUES ('$Nombre', '$imagenFirma', '$Grupo')";
    echo $SQL;

    // CONECTAR CON BASE DE DATOS
    include("Controlador.php"); 
    $Con = Conectar(); // Paso 1 y 2 -- obtención del objeto MySQL - Conectar al SMBD
    $ResultSet = Ejecutar($Con, $SQL); // Paso 3 -- Ejecutar consulta
    $Resultado = Desconectar($Con); // Paso 5 -- Cerrar la conexión
    
    if ($ResultSet == 1) {
        echo "Registro Insertado";
    } else {
        echo "Registro NO Insertado";
    }
} else {
    echo "No se ha podido insertar el registro debido a errores en la subida de la firma.<br>";
}

?>
