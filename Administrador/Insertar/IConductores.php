<?php

// Recepción de los datos
$ID = $_POST['ID']; 
$Nombre = $_POST['Nombre'];
$FechaNacimiento = $_POST['Fecha_Nacimiento'];
$RFC = $_POST['RFC'];
$Domicilio = $_POST['Domicilio'];
$TipoSangre = $_POST['Tipo_Sangre'];
$Donador = $_POST['Donador'];
$CURP = $_POST['CURP'];
$IdDireccion = $_POST['ID_Direccion'];

// Variables para las imágenes
$fotoValida = false;
$firmaValida = false;

// Validación de la foto
if (isset($_FILES["Foto"])) {
    $file = $_FILES["Foto"];
    $nombreFoto = $file["name"];
    $tipoFoto = $file["type"];
    $ruta_provisionalFoto = $file["tmp_name"];
    $sizeFoto = $file["size"];
    $dimensionesFoto = getimagesize($ruta_provisionalFoto);
    $widthFoto = $dimensionesFoto[0];
    $heightFoto = $dimensionesFoto[1];
    $carpetaFoto = "../../img/Conductores/fotosConductores/";

    // Lista de tipos permitidos
    $tiposPermitidos = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];

    if (in_array($tipoFoto, $tiposPermitidos)) {
        // Verificar el tamaño (máximo 3MB)
        if ($sizeFoto <= 3 * 1024 * 1024) { // 3MB en bytes
            $destinoFoto = $carpetaFoto . $nombreFoto;
            if (move_uploaded_file($ruta_provisionalFoto, $destinoFoto)) {
                echo "La foto ha sido subida exitosamente.<br>";
                $fotoValida = true;
                $imagenFoto = "../../img/Conductores/fotosConductores/" . $nombreFoto;
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
    echo "No se ha seleccionado ninguna foto.<br>";
}

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
    $carpetaFirma = "../../img/Conductores/fotosFirmas/";

    if (in_array($tipoFirma, $tiposPermitidos)) {
        // Verificar el tamaño (máximo 3MB)
        if ($sizeFirma <= 50 * 1024 * 1024) { // 3MB en bytes
            $destinoFirma = $carpetaFirma . $nombreFirma;
            if (move_uploaded_file($ruta_provisionalFirma, $destinoFirma)) {
                echo "La firma ha sido subida exitosamente.<br>";
                $firmaValida = true;
                $imagenFirma = "../../img/Conductores/fotosFirmas/" . $nombreFirma;
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

// Si ambas imágenes son válidas, realizar la inserción en la base de datos
if ($fotoValida && $firmaValida) {
    // Imprimir
    print("ID=" . $ID . "<br>");
    print("Nombre=" . $Nombre . "<br>");
    print("Fecha de nacimiento=" . $FechaNacimiento . "<br>");
    print("Foto=" . $imagenFoto . "<br>");
    print("Firma=" . $imagenFirma . "<br>");
    print("RFC=" . $RFC . "<br>");
    print("Domicilio=" . $Domicilio . "<br>");
    print("Tipo de sangre=" . $TipoSangre . "<br>");
    print("Donador=" . $Donador . "<br>");
    print("CURP=" . $CURP . "<br>");
    print("ID Direccion=" . $IdDireccion . "<br>");

    // Formar la instrucción SQL
    $SQL = "INSERT INTO Conductores (ID, Nombre, FechaNacimiento, Foto, Firma, RFC, Domicilio, TipoSangre, Donador, CURP, IDDireccion) 
            VALUES ('$ID', '$Nombre', '$FechaNacimiento', '$imagenFoto', '$imagenFirma', '$RFC', '$Domicilio', '$TipoSangre', '$Donador', '$CURP', '$IdDireccion')";
    print($SQL);

    // CONECTAR CON BASE DE DATOS
    include("Controlador.php"); 
    $Con = Conectar(); // Paso 1 y 2 -- obtención del objeto MySQL - Conectar al SMBD
    $ResultSet = Ejecutar($Con, $SQL); // Paso 3 -- Ejecutar consulta
    $Resultado = Desconectar($Con); // Paso 5 -- Cerrar la conexión

    if ($ResultSet == 1) {
        print("Registro Insertado");
    } else {
        print("Registro NO Insertado");
    }
} else {
    echo "No se ha podido insertar el registro debido a errores en la subida de imágenes.<br>";
}

if ($fotoValida){
    
}

?>
