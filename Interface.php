<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label>Id</label>
        <input type="text" name="id" id="id">
        <input type="radio" name="Opcion" id="Opcion" value="./Documentos/DOLicencia/PdfLicencia.php"> Licencia
        <input type="radio" name="Opcion" id="Opcion" value="./Documentos/DOLicencia/PdfTarjetaCirculacion.php"> T. Circulación
        <input type="radio" name="Opcion" id="Opcion" value="./Documentos/DOLicencia/PdfTarjetaVerificacion.php"> T.Verificación
        <input type="submit">
    </form>
</html>

<?php
    if(isset($_POST['id'])){
        $Id = $_POST['id'];
        $Opcion = $_POST['Opcion'];
        print('<form action="' . $Opcion . '" method="post"> 
        <input type="hidden" name="id" value="' . $Id . '">
        <input type="submit"> 
        </form>');
    }
?>