<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se recibió un ID de multa
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];

        // Aquí va el código para generar el PDF de la multa utilizando el ID recibido

        // Redireccionar al usuario de vuelta al formulario después de generar el PDF
        header("Location: ./GenerarMulta.php?success=true");
        exit();
    } else {
        // Si no se recibió un ID de multa, mostrar un mensaje de error
        echo "Error: Debes proporcionar un ID de multa válido.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generar Multa</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    body {
      background-color: #fafafa;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .container {
      background-color: #ffffff;
      padding: 40px; /* Ajustar el padding para más espacio alrededor del contenido */
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center; /* Centrar contenido dentro del contenedor */
      width: 80%; /* Ajustar el ancho del contenedor al 80% para hacerlo más pequeño */
      max-width: 600px; /* Ajustar el ancho máximo del contenedor */
      margin: 0 auto; /* Centrar el contenedor horizontalmente */
    }
    h1 {
      color: #6d7fcc;
      font-size: 30px;
      margin-bottom: 10px;
    }
    p {
      color: #101111;
      font-size: 18px;
      margin-bottom: 20px; /* Ajuste del margen inferior */
    }
    .form-group label {
      font-weight: bold;
    }
    .btn-primary {
      width: 100%;
      background-color: #6d7fcc; /* Cambiar el color de fondo del botón */
      border-color: #6d7fcc; /* Cambiar el color del borde del botón */
    }
    .btn-primary:hover {
      background-color: #5c6bb2; /* Cambiar el color de fondo del botón al pasar el mouse */
      border-color: #5c6bb2; /* Cambiar el color del borde del botón al pasar el mouse */
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Generar Multa</h1>
    <form action="generarMulta.php" method="POST">
      <div class="form-group">
        <label for="id">ID de Multa:</label>
        <input type="text" class="form-control" id="id" name="id" required>
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>

  <!-- jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
