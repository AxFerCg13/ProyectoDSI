<?php
/*
// NO BORRAR
session_start(); // Asegúrate de iniciar la sesión al comienzo del script
$varssesion = $_SESSION['usuario'];
// Verifica si la variable de sesión está establecida
if ($varssesion == NULL || $varssesion == '') {
  echo 'Usted no tiene autorización';
  die();
}

// Si la variable de sesión está establecida, muestra el contenido de la página
echo "Bienvenido, " . $_SESSION['usuario'];
// Resto del contenido de la página*/
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menú</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
  <div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <h3>Menú</h3>
      </div>
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
              <li><a href="./Consultar/CTarjetasCirculacion.php">Tarjetas de circulación</a></li>
              <li><a href="./Consultar/CTenencias.php">Tenencias</a></li>
              <li><a href="./Consultar/CVehiculo.php">Vehículos</a></li>
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
              <li><a href="./Insertar/Vehiculos.html">Vehículos</a></li>
              <li><a href="./Insertar/Verificaciones.html">Verificaciones</a></li>
            </ul>
          </li>
          <li>
            <input type="checkbox" id="eliminar">
            <label for="eliminar">Eliminar</label>
            <ul>
              <li><a href="./Eliminar/FDAgentes.html">Agentes</a></li>
              <li><a href="./Eliminar/FDCentroVerificacion.html">Centro de Verificación</a></li>
              <li><a href="./Eliminar/FDConductores.html">Conductores</a></li>
              <li><a href="./Eliminar/FDDirecciones.html">Direcciones</a></li>
              <li><a href="./Eliminar/FDLicencias.html">Licencias</a></li>
              <li><a href="./Eliminar/FDMultas.html">Multas</a></li>
              <li><a href="./Eliminar/FDPropietarios.html">Propietarios</a></li>
              <li><a href="./Eliminar/FDTarjetasCirculacion.html">Tarjetas de circulación</a></li>
              <li><a href="./Eliminar/FDTenencias.html">Tenencias</a></li>
              <li><a href="./Eliminar/FDVehiculos.html">Vehículos</a></li>
              <li><a href="./Eliminar/FDVerificaciones.html">Verificaciones</a></li>
            </ul>
          </li>
          <li>
            <input type="checkbox" id="actualizar">
            <label for="actualizar">Actualizar</label>
            <ul>
              <li><a href="./Actualizar/UAgentes.php">Agentes</a></li>
              <li><a href="./Actualizar/UCentroVerificacion.php">Centro de Verificación</a></li>
              <li><a href="./Actualizar/UConductores.php">Conductores</a></li>
              <li><a href="./Actualizar/UDirecciones.php">Direcciones</a></li>
              <li><a href="./Actualizar/ULicencias.php">Licencias</a></li>
              <li><a href="./Actualizar/UMultas.php">Multas</a></li>
              <li><a href="./Actualizar/UPropietarios.php">Propietarios</a></li>
              <li><a href="./Actualizar/UTarjetasCirculacion.php">Tarjetas de circulación</a></li>
              <li><a href="./Actualizar/UTenencias.php">Tenencias</a></li>
              <li><a href="./Actualizar/UVehiculos.php">Vehículos</a></li>
              <li><a href="./Actualizar/UVerificaciones.php">Verificaciones</a></li>
            </ul>
          </li>
          <button id="cerrarSesion">Cerrar Sesión</button>
        </ul>
    
    <!-- Page Content -->
    <div id="content">
          </button>
        </div>
      </nav>
      <div class="titulo">
        <h1>Administrador</h1>
      </div>
    </div>
  </div>

  <!-- jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
      });
    });
  </script>
</body>
</html>
