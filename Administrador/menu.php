<?php 
  /* NO BORRAR
  session_start(); // Asegúrate de iniciar la sesión al comienzo del script
  $varssesion = $_SESSION['usuario'];
  // Verifica si la variable de sesión está establecida
if ($varssesion == NULL || $varssesion == '') {
  echo 'Usted no tiene autorización';
  die();
}

// Si la variable de sesión está establecida, muestra el contenido de la página
echo "Bienvenido, " . $_SESSION['usuario'];
// Resto del contenido de la página */
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
          <li><a href="./Consultar/CAgentes.php">Agentes</a></li>
          <li><a href="./Consultar/CCentroVerificacion.php">Centro de Verificación</a></li>
          <li><a href="./Consultar/CConductores.php">Conductores</a></li>
          <li><a href="./Consultar/CDirecciones.php">Direcciones</a></li>
          <li><a href="./Consultar/CLicencias.php">Licencias</a></li>
          <li><a href="./Consultar/CMultas.php">Multas</a></li>
          <li><a href="./Consultar/CPropietarios.php">Propietarios</a></li>
          <li><a href="./Consultar/CTarjeatsCir.php">Tarjetas de circulación</a></li>
          <li><a href="./Consultar/CTenencias.php">Tenencias</a></li>
          <li><a href="./Consultar/CVehiculo.php">Vehiculos</a></li>
          <li><a href="./Consultar/CVerificaciones.php">Verificaciones</a></li>
        </ul>
      </li>
      <li>
        <input type="checkbox" id="insertar">
        <label for="insertar">Insertar</label>
        <ul>
          <li><a href="./Insertar/Agentes.html">Agentes</a></li>
          <li><a href="./Insertar/CentroVerificacion.html">Centro de Verificación</a></li>
          <li><a href="./Insertar/Conductores.html">Conductores</a></li>
          <li><a href="./Insertar/Direcciones.html">Direcciones</a></li>
          <li><a href="./Insertar/Licencias.html">Licencias</a></li>
          <li><a href="./Insertar/Multas.html">Multas</a></li>
          <li><a href="./Insertar/Propietarios.html">Propietarios</a></li>
          <li><a href="./Insertar/TarjetasCirculacion.html">Tarjetas de circulación</a></li>
          <li><a href="./Insertar/Tenencias.html">Tenencias</a></li>
          <li><a href="./Insertar/Vehiculos.html">Vehiculos</a></li>
          <li><a href="./Insertar/Verificaciones.html">Verificaciones</a></li>
        </ul>
      </li>
      <li>
        <input type="checkbox" id="delete">
        <label for="delete">Eliminar</label>
        <ul>
          <li><a href="./Eliminar/FDAgentes.html">Agentes</a></li>
          <li><a href="./Eliminar/FDCentroVerificacion.html">Centro de Verificación</a></li>
          <li><a href="./Eliminar/FDConductores.html">Conductores</a></li>
          <li><a href="./Eliminar/FDDirecciones.html">Direcciones</a></li>
          <li><a href="./Eliminar/FDLicencias.html">Licencias</a></li>
          <li><a href="./Eliminar/FDMultas.html">Multas</a></li>
          <li><a href="./Eliminar/FDPropietarios.html">Propietarios</a></li>
          <li><a href="./Eliminar/FDTarjetasCirculacion.html">Tarjetas de circulación</a></li>
          <li><a href="./Eliminar/FDTenecias.html">Tenencias</a></li>
          <li><a href="./Eliminar/FDVehiculos.html">Vehiculos</a></li>
          <li><a href="./Eliminar/FDVerificaciones.html">Verificaciones</a></li>
        </ul>
      </li>
      <li>
        <input type="checkbox" id="delete">
        <label for="delete">Actualizar</label>
        <ul>
          <li><a href="./Actualizar/UAgentes.php">Agentes</a></li>
          <li><a href="./Actualizar/UCentroVerificacion.php">Centro de Verificación</a></li>
          <li><a href="./Actualizar/UConductores.php">Conductores</a></li>
          <li><a href="./Actualizar/UDirecciones.php">Direcciones</a></li>
          <li><a href="./Actualizar/ULicencias.php">Licencias</a></li>
          <li><a href="./Actualizar/UMultas.php">Multas</a></li>
          <li><a href="./Actualizar/UPropietarios.php">Propietarios</a></li>
          <li><a href="./Actualizar/UTarjetasCirculacion.php">Tarjetas de circulación</a></li>
          <li><a href="./Actualizar/UTenecias.php">Tenencias</a></li>
          <li><a href="./Actualizar/UVehiculos.php">Vehiculos</a></li>
          <li><a href="./Actualizar/UVerificaciones.php">Verificaciones</a></li>
        </ul>
        <a href="cerrar_sesion.php">Cerrar Sesion</a>
      </li>
    </ul>
  </div>
  <div class="titulo">
    <h1>Administrador</h1>
  </div>
</body>
</html>
