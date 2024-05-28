<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menú</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #fafafa;
    }

    .wrapper {
      display: flex;
      width: 100%;
      align-items: stretch;
    }

    #sidebar {
      min-width: 250px;
      max-width: 250px;
      background: #7386D5;
      color: #fff;
      transition: all 0.3s;
    }

    #sidebar .sidebar-header {
      padding: 20px;
      background: #6d7fcc;
    }

    #sidebar ul.components {
      padding: 20px 0;
      border-bottom: 1px solid #47748b;
    }

    #sidebar ul p {
      color: #fff;
      padding: 10px;
    }

    #sidebar ul li a {
      padding: 10px;
      font-size: 1.1em;
      display: block;
    }

    #sidebar ul li a:hover {
      color: #7386D5;
      background: #fff;
    }

    #sidebar ul li.active > a, a[aria-expanded="true"] {
      color: #fff;
      background: #6d7fcc;
    }

    a[data-toggle="collapse"] {
      position: relative;
    }

    a[aria-expanded="false"]::before, a[aria-expanded="true"]::before {
      content: '\e259';
      display: block;
      position: absolute;
      right: 20px;
      font-family: 'Glyphicons Halflings';
      font-size: 0.6em;
    }

    a[aria-expanded="true"]::before {
      content: '\e260';
    }

    ul ul a {
      font-size: 0.9em !important;
      padding-left: 30px !important;
      background: #6d7fcc;
    }

    #content {
      width: 100%;
      padding: 20px;
      min-height: 100vh;
      transition: all 0.3s;
    }

    .line {
      width: 100%;
      height: 1px;
      border-bottom: 1px dashed #ddd;
      margin: 40px 0;
    }

    @media (max-width: 768px) {
      #sidebar {
        margin-left: -250px;
      }
      #sidebar.active {
        margin-left: 0;
      }
      #sidebarCollapse span {
        display: none;
      }
    }

    .menu ul {
      list-style-type: none;
    }

    .menu ul li {
      position: relative;
    }

    .menu ul li input {
      display: none;
    }

    .menu ul li label {
      display: block;
      padding: 10px;
      background: #7386D5;
      color: white;
      cursor: pointer;
      border-bottom: 1px solid #47748b;
    }

    .menu ul li label:hover {
      background: #6d7fcc;
    }

    .menu ul ul {
      display: none;
    }

    .menu ul li input:checked ~ ul {
      display: block;
    }

    .menu ul ul li a {
      display: block;
      padding: 10px;
      background: #6d7fcc;
      color: white;
      border-bottom: 1px solid #47748b;
      text-decoration: none;
    }

    .menu ul ul li a:hover {
      background: #6d7fcc;
    }

    #cerrarSesion {
      padding: 10px 8px;
      background-color: #7386D5;
      color: white;
      border: none;
      border-radius: 2px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    #cerrarSesion:hover {
      background-color: #6d7fcc;
    }

    .titulo {
      text-align: center; /* Centrar el texto */
      width: 100%; /* Asegura que el contenedor ocupe todo el ancho disponible */
    }

    .titulo h1 {
      font-size: 35px; /* Tamaño de la fuente */
      color: #6d7fcc; /* Color del texto */
      margin-bottom: 20px; /* Margen inferior */
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
            <input type="checkbox" id="consultas" checked>
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
