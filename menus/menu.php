<?php
session_start(); // Asegúrate de iniciar la sesión al comienzo del script

// Verifica si la variable de sesión está establecida
if (!isset($_SESSION['usuario'])) {
    echo "Acceso denegado. Por favor, inicie sesión.";
    // Redirigir a la página de inicio de sesión o mostrar un mensaje de error
    header("Location: ../index.php"); // Ajusta la ubicación según tu estructura de archivos
    exit();
}

// Si la variable de sesión está establecida, muestra el contenido de la página
echo "Bienvenido, " . $_SESSION['usuario'];
// Resto del contenido de la página
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menú</title>
  <link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
  <div class="menu">
    <ul>
      <li>
        <input type="checkbox" id="consultas">
        <label for="consultas">Consultar</label>
        <ul>
          <li><a href="../CAgentes.php">Agentes</a></li>
          <li><a href="../CCentroVerificacion.php">Centro de Verificación</a></li>
          <li><a href="../CConductores.php">Conductores</a></li>
          <li><a href="../CDirecciones.php">Direcciones</a></li>
          <li><a href="../CLicencias.php">Licencias</a></li>
          <li><a href="../CMultas.php">Multas</a></li>
          <li><a href="../CPropietarios.php">Propietarios</a></li>
          <li><a href="../CTarjeatsCir.php">Tarjetas de circulación</a></li>
          <li><a href="../CTenencias.php">Tenencias</a></li>
          <li><a href="../CVehiculo.php">Vehiculos</a></li>
          <li><a href="../CVerificaciones.php">Verificaciones</a></li>
        </ul>
      </li>
      <li>
        <input type="checkbox" id="insertar">
        <label for="insertar">Insertar</label>
        <ul>
          <li><a href="../Agentes.html">Agentes</a></li>
          <li><a href="../CentroVerificacion.html">Centro de Verificación</a></li>
          <li><a href="../Conductores.html">Conductores</a></li>
          <li><a href="../Direcciones.html">Direcciones</a></li>
          <li><a href="../Licencias.html">Licencias</a></li>
          <li><a href="../Multas.html">Multas</a></li>
          <li><a href="../Propietarios.html">Propietarios</a></li>
          <li><a href="../TarjetasCirculacion.html">Tarjetas de circulación</a></li>
          <li><a href="../Tenencias.html">Tenencias</a></li>
          <li><a href="../Vehiculos.html">Vehiculos</a></li>
          <li><a href="../Verificaciones.html">Verificaciones</a></li>
        </ul>
      </li>
      <li>
        <input type="checkbox" id="delete">
        <label for="delete">Eliminar</label>
        <ul>
          <li><a href="../FDAgentes.html">Agentes</a></li>
          <li><a href="../FDCentroVerificacion.html">Centro de Verificación</a></li>
          <li><a href="../FDConductores.html">Conductores</a></li>
          <li><a href="../FDDirecciones.html">Direcciones</a></li>
          <li><a href="../FDLicencias.html">Licencias</a></li>
          <li><a href="../FDMultas.html">Multas</a></li>
          <li><a href="../FDPropietarios.html">Propietarios</a></li>
          <li><a href="../FDTarjetasCirculacion.html">Tarjetas de circulación</a></li>
          <li><a href="../FDTenecias.html">Tenencias</a></li>
          <li><a href="../FDVehiculos.html">Vehiculos</a></li>
          <li><a href="../FDVerificaciones.html">Verificaciones</a></li>
        </ul>
      </li>
      <li>
        <input type="checkbox" id="delete">
        <label for="delete">Actualizar</label>
        <ul>
          <li><a href="#">Agentes</a></li>
          <li><a href="#">Centro de Verificación</a></li>
          <li><a href="#">Conductores</a></li>
          <li><a href="#">Direcciones</a></li>
          <li><a href="#">Licencias</a></li>
          <li><a href="#">Multas</a></li>
          <li><a href="#">Propietarios</a></li>
          <li><a href="#">Tarjetas de circulación</a></li>
          <li><a href="#">Tenencias</a></li>
          <li><a href="#">Vehiculos</a></li>
          <li><a href="#">Verificaciones</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="titulo">
    <h1>Administrador</h1>
  </div>
</body>
</html>
