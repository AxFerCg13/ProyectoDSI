<html>
    <form method="post">
        <label>Folio</label>
        <input type="number" id="Folio" name="Folio">
        <input type="submit">
    </form>

<?php
include("Controlador.php");
    if(isset($_POST['Folio'])){
        $Folio=$_POST['Folio'];
        $Con=Conectar();
        $SQL="SELECT * FROM Verificaciones WHERE Folio = '$Folio';";
        $ResultSet=Ejecutar($Con,$SQL);
        $Fila=mysqli_fetch_row($ResultSet);
        Desconectar($Con);        
?>

    <form method="post">
        <input type="hidden" id="Folio" name="Folio" value="<?php print($_POST['Folio']);?>">
        <label>Vehiculo</label>
        <input type="text" id="Vehiculo" name="Vehiculo" value="<?php print($Fila[1]);?>">
        <label>NumLinea</label>
        <input type="number" id="NumLinea" name="NumLinea" value="<?php print($Fila[2]);?>">
        <label>TecnicoVerificador</label>
        <input type="text" id="TecnicoVerificador" name="TecnicoVerificador" value="<?php print($Fila[3]);?>">
        <label>FechaExpedicion</label>
        <input type="datetime" id="FechaExpedicion" name="FechaExpedicion" value="<?php print($Fila[4]);?>">
        <label>HoraEntrada</label>
        <input type="text" id="HoraEntrada" name="HoraEntrada" value="<?php print($Fila[5]);?>">
        <label>HoraSalida</label>
        <input type="text" id="HoraSalida" name="HoraSalida" value="<?php print($Fila[6]);?>">
        <label>Motivo</label>
        <input type="text" id="Motivo" name="Motivo" value="<?php print($Fila[7]);?>">
        <label>FolioCertificado</label>
        <input type="number" id="FolioCertificado" name="FolioCertificado" value="<?php print($Fila[8]);?>">
        <label>Semestre</label>
        <input type="number" id="Semestre" name="Semestre" value="<?php print($Fila[9]);?>">
        <label>CodigoBarras</label>
        <input type="number" id="CodigoBarras" name="CodigoBarras" value="<?php print($Fila[10]);?>">
        <label>NumeroCentro</label>
        <input type="number" id="NumeroCentro" name="NumeroCentro" value="<?php print($Fila[11]);?>">
        <input type="submit">
    </form>

<?php
    }
    if(isset($_POST['FolioCertificado'])){
        $Folio=$_POST['Folio'];
        $Vehiculo=$_POST['Vehiculo'];
        $NumLinea=$_POST['NumLinea'];
        $TecnicoVerificador=$_POST['TecnicoVerificador'];
        $FechaExpedicion=$_POST['FechaExpedicion'];
        $HoraEntrada=$_POST['HoraEntrada'];
        $HoraSalida=$_POST['HoraSalida'];
        $Motivo=$_POST['Motivo'];
        $FolioCertificado=$_POST['FolioCertificado'];
        $Semestre=$_POST['Semestre'];
        $CodigoBarras=$_POST['CodigoBarras'];
        $NumCentro=$_POST['NumeroCentro'];

        $Con=Conectar();
        $SQL="UPDATE Verificaciones SET Vehiculo = '$Vehiculo', NumerLineaVerificacion = '$NumLinea', TecnicoVerificador = '$TecnicoVerificador',
        FechaExpedicion = '$FechaExpedicion', HoraEntrada = '$HoraEntrada', HoraSalida = '$HoraSalida', Motivo = '$Motivo', 
        FolioCertificado = '$FolioCertificado', Semestre = '$Semestre', CodigoBarras = '$CodigoBarras', NumeroCentro = '$NumCentro' WHERE Folio = '$Folio';";
        $ResultSet=Ejecutar($Con, $SQL);
        Desconectar($Con);
        header("Location:UVerificaciones.php");
    }

?>
</html>