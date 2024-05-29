<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se recibió un ID de tarjeta de verificación
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];

        // Aquí va el código para generar el PDF de la tarjeta de verificación utilizando el ID recibido

        // Redireccionar al usuario de vuelta al formulario después de generar el PDF
        header("Location: ./GenerarTarjetaVerificacion.php?success=true");
        exit();
    } else {
        // Si no se recibió un ID de tarjeta de verificación, mostrar un mensaje de error
        echo "Error: Debes proporcionar un ID de tarjeta de verificación válido.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generar Tarjeta de Verificación</title>
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
      padding: 80px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center;
      width: 70%;
      max-width: 600px;
      margin: 0 auto;
    }
    h2 {
      color: #6d7fcc;
      font-size: 30px;
      margin-bottom: 10px;
    }
    label {
      color: #101111;
      font-size: 18px;
      margin-bottom: 20px;
      font-weight: bold;
    }
    .form-control {
      width: 100%;
      margin: 0 auto;
    }
    .btn-primary {
      width: 100%;
      background-color: #6d7fcc;
      border-color: #6d7fcc;
    }
    .btn-primary:hover {
      background-color: #5a6baf;
      border-color: #5a6baf;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2 class="my-4">Generar Tarjeta de Verificación</h2>
    <form action="../../Documentos/DOTarjetaVerificacion/PdfTarjetaVerificacio.php" method="post">
      <div class="form-group">
        <label for="id">ID de Verificación:</label>
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
