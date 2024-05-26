<?php

// Recepción de los datos
$Id_Agente = $_POST['ID']; // De esta manera se recibe una variable del formulario de HTML
$Nombre = $_POST['Nombre'];
$Grupo = $_POST['Grupo'];
    
// Tipos de archivos permitidos
$tiposPermitidos = array("image/jpeg", "image/png", "image/gif");

$firmaValida = false;

if (isset($_FILES["Firma"])) {
    $file = $_FILES["Firma"];
    $nombreFirma = $file["name"];
    $tipoFirma = $file["type"];
    $ruta_provisionalFirma = $file["tmp_name"];
    $sizeFirma = $file["size"];
    $dimensionesFirma = getimagesize($ruta_provisionalFirma);
    $widthFirma = $dimensionesFirma[0];
    $heightFirma = $dimensionesFirma[1];
    $carpetaFirma = "img/Agentes/firmasAgentes/";

    if (in_array($tipoFirma, $tiposPermitidos)) {
        // Verificar el tamaño (máximo 3MB)
        if ($sizeFirma <= 50 * 1024 * 1024) { 
            $destinoFirma = $carpetaFirma . $nombreFirma;
            if (move_uploaded_file($ruta_provisionalFirma, $destinoFirma)) {
                echo "La firma ha sido subida exitosamente.<br>";
                $firmaValida = true;
                $imagenFirma = $destinoFirma;
                // Imprimir
                print("IdAgente=" . $Id_Agente . "<br>");
                print("Nombre=" . $Nombre . "<br>");
                print("Grupo=" . $Grupo . "<br>");
  
                // Formar la instrucción SQL - se van a ocupar las variables anteriores
                $SQL = "INSERT INTO Agentes (Nombre, Firma, Grupo) VALUES ('$Nombre', '$imagenFirma', '$Grupo')";
                print($SQL);

                // Conectar con base de datos y ejecutar la consulta
                include("Controlador.php");
                $Con = Conectar(); // Paso 1 y 2 -- obtención del objeto MySQL -. Conectar al SMBD
                $ResultSet = Ejecutar($Con, $SQL); // Paso 3 -- el primer parámetro es el resultado de la función anterior -- Ejecutar consulta -- Devuelve 1 si se hizo la inserción
                $Resultado = Desconectar($Con); // Paso 5 -- cerrar la conexión -- recibe objeto de MySQL -- Devuelve 1 cuando se puede cerrar la conexión y 0 cuando no se puede cerrar la conexión
                
                if ($ResultSet == 1) {
                    print("Registro Insertado");
                } else {
                    print("Registro NO Insertado");
                }
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
?>
