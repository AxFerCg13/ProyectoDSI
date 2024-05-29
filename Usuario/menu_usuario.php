<?php
/*
session_start();
$varssesion = $_SESSION['usuario'];

if ($varssesion == NULL || $varssesion == '') {
  echo 'Usted no tiene autorización';
  die();
}

echo "Bienvenido, " . $_SESSION['usuario'];*/
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menú</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <style>
    .wrapper {
      display: flex;
    }
    nav#sidebar {
      background: #343a40; /* Color azul oscuro */
      min-width: 250px;
      max-width: 250px;
      height: 100vh;
      color: white;
      position: relative;
      z-index: 1;
    }
    .sidebar-header {
      padding: 20px;
      background: #343a40; /* Color azul oscuro */
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
      background-color: #343a40; /* Color azul oscuro */
      flex-direction: column;
      border-radius: 0 0 10px 10px;
      z-index: 2;
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
    }
    #cerrarSesion {
      background-color: #dc3545; /* Color rojo */
      color: white;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      margin-top: 10px;
      border-radius: 5px;
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
      z-index: 0;
    }
    .titulo h1 {
      font-size: 5em;
      color: white;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
      position: relative;
      z-index: 1;
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
          <button id="cerrarSesion">Cerrar Sesión</button>
        </ul>
      </div>
    </nav>
    <!-- Page Content -->
    <div id="content">
      <div class="titulo">
        <h1>Usuario</h1>
      </div>
    </div>
  </div>
</body>
</html>
