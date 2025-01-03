<?php

session_start(); // Asegúrate de iniciar la sesión al comienzo del script
$varssesion = $_SESSION['usuario'];
// Verifica si la variable de sesión está establecida
if ($varssesion == NULL || $varssesion == '') {
  echo 'Usted no tiene autorización - Ingrese mediante el Login';
  die();
}

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
    body {
      font-family: Arial, sans-serif; /* Cambiar el tipo de letra aquí */
    }
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
      background: #4F78CB; /* Nuevo color */
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
      background: #4F78CB; /* Nuevo color */
    }
    .menu ul ul {
      display: none;
      position: absolute;
      top: 0;
      left: 100%;
      background-color: #4F78CB; /* Cambiar solo el fondo */
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
    .menu ul ul a {
      color: white; /* Mantener el color del texto */
      text-decoration: none;
      padding: 10px 20px;
      display: block;
      background: #4F78CB; /* Mismo color que el botón de consultar */
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
      transition: background-color 0.3s; /* Transición de color */
    }
    #cerrarSesion:hover {
      background-color: #4F78CB; /* Color azul al pasar el cursor */
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
        <h3>Menú</h3> <!-- Cambiar color aquí también -->
      </div>
      <div class="menu">
        <ul>
          <li>
            <input type="checkbox" id="consultas">
            <label for="consultas">Consultar</label> <!-- Cambiar solo este color -->
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
          <a href="../cerrar_sesion.php"><button id="cerrarSesion" >Cerrar Sesión</button></a>
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
