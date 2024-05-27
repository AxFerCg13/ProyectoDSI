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
  // Resto del contenido de la página
  */
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
  </div>
  <div class="titulo">
    <h1>Usuario</h1>
  </div>
</body>
</html>