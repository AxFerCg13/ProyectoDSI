<?php
$UserName = $_POST['UserName'];
$Password = $_POST['Password'];

// Verifica si se ha enviado un archivo
if(isset($_FILES['key']) && $_FILES['key']['error'] === UPLOAD_ERR_OK) {
    // Ruta temporal del archivo subido
    $tmpFilePath = $_FILES['key']['tmp_name'];

    // Lee el contenido del archivo
    $Key = file_get_contents($tmpFilePath);

    // Si necesitas alguna manipulación adicional con el contenido del archivo, puedes hacerlo aquí.

    // Elimina el archivo temporal
    unlink($tmpFilePath);
    print($Key);
} else {
    // Manejo de error si no se envía el archivo o hay algún problema en la subida
    echo "Error al cargar el archivo de clave.";
    // Puedes redirigir al usuario a otra página o mostrar un mensaje de error.
}

// Primero tenemos que acceder a la base de datos
include('Controlador.php');
$Con=Conectar();
$SQL="SELECT * FROM Cuentas WHERE UserName='$UserName'"; // Aquí se manda llamar la tabla coincidiendo con el usuario
$ResultSet=Ejecutar($Con, $SQL);
$Existe=mysqli_num_rows($ResultSet);
if($Existe==1) {
    print("El usuario existe");
    $Fila=mysqli_fetch_row($ResultSet); // Se extrae la fila de datos de la consulta
    if($Fila[3]==1) {
        print("Cuenta Activada");
        if($Fila[4]==0) {
            print("Cuenta NO Bloqueada");
            if ($Password==$Fila[1] && $Key==$Fila[6]) {
                print("Contraseña y key correctas");
                if($Fila[2]=='A') {
                    session_start();
                    $_SESSION['usuario'] = $UserName;
                    print("Administrador");
                    header("Location: ./Administrador/menu.php");
                    exit();
                } else {
                    print("Usuario");
                    session_start();
                    $_SESSION['usuario'] = $UserName;
                    print("Usuario");
                    header("Location: ./Usuario/menu_usuario.php");
                    exit();
                }
            } else {
                print("Contraseña Incorrecta o key incorrecta");
                $Intentos = $Fila[5] + 1; // Incrementa el número de intentos
                $SQL = "UPDATE Cuentas SET Intento=$Intentos WHERE UserName='$UserName'";
                $ResultSet = Ejecutar($Con, $SQL);
                if($Intentos >= 3) { // Si se supera el máximo de intentos
                    print("Tu cuenta ha sido BLOQUEADA");
                    $SQL = "UPDATE Cuentas SET Bloqueo = 1 WHERE UserName='$UserName'";
                    $ResultSet = Ejecutar($Con, $SQL);
                }
            }
        } else {
            print("Cuenta Bloqueada - Contacta al administrador");
        }
    } else {
        print("Cuenta NO Activada - ");
    }
} else {
    print("El usuario no existe");
}

print($Existe);

Desconectar($Con);

?>
