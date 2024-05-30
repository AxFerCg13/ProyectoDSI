<?php

session_start(); // Asegúrate de iniciar la sesión al comienzo del script
$varssesion = $_SESSION['usuario'];
// Verifica si la variable de sesión está establecida
if ($varssesion == NULL || $varssesion == '') {
  echo 'Usted no tiene autorización - Ingrese mediante el Login';
  die();
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
  <title>Menú Usuario</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <link rel="stylesheet" href="./styles/styles.css">
  <style>
    .wrapper {
      display: flex;
    }
    nav#sidebar {
      background: #343a40;
      min-width: 250px;
      max-width: 250px;
      height: 100vh;
      color: white;
      position: relative; /* Añadido */
      z-index: 1; /* Añadido */
    }
    .sidebar-header {
      padding: 20px;
      background: #343a40;
    }
    .menu ul {
      list-style: none;
      padding: 0;
    }
    .menu li {
      position: relative;
    }
    .menu input[type="checkbox"] {
      display: none;
    }
    .menu label {
      display: block;
      padding: 10px;
      color: white;
      cursor: pointer;
    }
    .menu ul ul {
      display: none;
      position: absolute;
      top: 0;
      left: 100%;
      background-color: #343a40;
      flex-direction: column;
      border-radius: 0 0 10px 10px;
      z-index: 2; /* Añadido */
    }
    .menu input[type="checkbox"]:checked + label + ul {
      display: flex;
    }
    .menu ul ul li {
      margin: 0;
    }
    .menu a {
      color: white;
      text-decoration: none;
      padding: 10px 20px;
      display: block;
      background: #343a40;
    }
    #cerrarSesion {
      background-color: #dc3545;
      color: white;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      margin-top: 10px;
      border-radius: 5px;
      width: 100%;
    }
    #content {
      flex-grow: 1;
      position: relative;
      background: url('imagen.jpg') no-repeat center center;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      opacity: 0.5;
      z-index: 0; /* Añadido */
    }
    .titulo h1 {
      font-size: 5em;
      color: white;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
      position: relative; /* Añadido */
      z-index: 1; /* Añadido */
    }
  </style>
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
              <li><a href="./Consultar/CTarjeatsCir.php">Tarjetas de circulación</a></li>
              <li><a href="./Consultar/CTenencias.php">Tenencias</a></li>
              <li><a href="./Consultar/CVehiculo.php">Vehículos</a></li>
              <li><a href="./Consultar/CVerificaciones.php">Verificaciones</a></li>
            </ul>
          </li>
          <li>
            <input type="checkbox" id="insertar">
            <label for="insertar">Insertar</label>
            <ul>
              <li><a href="./Insertar/Agentes.php">Agentes</a></li>
              <li><a href="./Insertar/CentroVerificacion.php">Centro de Verificación</a></li>
              <li><a href="./Insertar/Conductores.php">Conductores</a></li>
              <li><a href="./Insertar/Direcciones.php">Direcciones</a></li>
              <li><a href="./Insertar/Licencias.php">Licencias</a></li>
              <li><a href="./Insertar/Multas.php">Multas</a></li>
              <li><a href="./Insertar/Propietarios.php">Propietarios</a></li>
              <li><a href="./Insertar/TarjetasCirculacion.php">Tarjetas de circulación</a></li>
              <li><a href="./Insertar/Tenencias.php">Tenencias</a></li>
              <li><a href="./Insertar/Vehiculos.php">Vehículos</a></li>
              <li><a href="./Insertar/Verificaciones.php">Verificaciones</a></li>
            </ul>
          </li>
          <li>
            <input type="checkbox" id="eliminar">
            <label for="eliminar">Eliminar</label>
            <ul>
              <li><a href="./Eliminar/DAgentes.php">Agentes</a></li>
              <li><a href="./Eliminar/DCentroVerificacion.php">Centro de Verificación</a></li>
              <li><a href="./Eliminar/DConductores.php">Conductores</a></li>
              <li><a href="./Eliminar/DDirecciones.php">Direcciones</a></li>
              <li><a href="./Eliminar/DLicencias.php">Licencias</a></li>
              <li><a href="./Eliminar/DMultas.php">Multas</a></li>
              <li><a href="./Eliminar/DTarjetasCircuclacion.php">Tarjetas de circulación</a></li>
              <li><a href="./Eliminar/DTenencias.php">Tenencias</a></li>
              <li><a href="./Eliminar/DVehiculoes.php">Vehículos</a></li>
              <li><a href="./Eliminar/DVerificaciones.php">Verificaciones</a></li>
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
          <li>
            <input type="checkbox" id="generarDocumentos">
            <label for="generarDocumentos">Generar Documentos</label>
            <ul>
              <li><a href="./Generar/GenerarLicencia.php">Licencias</a></li>
              <li><a href="./Generar/GenerarMulta.php">Multas</a></li>
              <li><a href="./Generar/GenerarTarjetaCirculacion.php">Tarjetas de circulación</a></li>
              <li><a href="./Generar/GenerarTarjetaVerificacion.php">Tarjetas de Verificación</a></li>
            </ul>
          </li>
          <a href="../cerrar_sesion.php"><button id="cerrarSesion" >Cerrar Sesión</button></a>
        </ul>
      </div>
    </nav>
    <!-- Page Content -->
    <div id="content">
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
