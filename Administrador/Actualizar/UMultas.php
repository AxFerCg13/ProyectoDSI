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
        $SQL="SELECT * FROM Multas WHERE Folio = '$Folio';";
        $ResultSet=Ejecutar($Con,$SQL);
        $Fila=mysqli_fetch_row($ResultSet);
        Desconectar($Con);        
?>

    <form method="post">
        <input type="hidden" id="Folio" name="Folio" value="<?php print($_POST['Folio']);?>">
        <label>Motivo</label>
        <input type="text" id="Motivo" name="Motivo" value="<?php print($Fila[1]);?>">
        <label>Garantia</label>
        <input type="text" id="Garantia" name="Garantia" value="<?php print($Fila[2]);?>">
        <label>Referencia</label>
        <input type="text" id="Referencia" name="Referencia" value="<?php print($Fila[3]);?>">
        <label>Hora</label>
        <input type="text" id="Hora" name="Hora" value="<?php print($Fila[4]);?>">
        <label>CalificacionBoleta</label>
        <input type="text" id="CalificacionBoleta" name="CalificacionBoleta" value="<?php print($Fila[5]);?>">
        <label>Conductor</label>
        <input type="text" id="Conductor" name="Conductor" value="<?php print($Fila[6]);?>">
        <label>Fundamento</label>
        <input type="text" id="Fundamento" name="Fundamento" value="<?php print($Fila[7]);?>">
        <label>Vehiculo</label>
        <input type="number" id="Vehiculo" name="Vehiculo" value="<?php print($Fila[8]);?>">
        <label>Observacion</label>
        <input type="text" id="Observacion" name="Observacion" value="<?php print($Fila[9]);?>">
        <label>Id Agente</label>
        <input type="number" id="IdAgente" name="IdAgente" value="<?php print($Fila[10]);?>">
        <label>Id Direccion</label>
        <input type="number" id="Id_Direccion" name="Id_Direccion" value="<?php print($Fila[11]);?>">
        <label>Num Licencia</label>
        <input type="number" id="NumLicencia" name="NumLicencia" value="<?php print($Fila[12]);?>">
        <label>Folio Tarjeta</label>
        <input type="number" id="FolioTarjeta" name="FolioTarjeta" value="<?php print($Fila[13]);?>">
        <input type="submit">
    </form>

<?php
    }
    if(isset($_POST['Motivo'])){
        $Folio=$_POST['Folio'];
        $Motivo=$_POST['Motivo'];
        $Garantia=$_POST['Garantia'];
        $Referencia=$_POST['Referencia'];
        $Hora=$_POST['Hora'];
        $CalificacionBoleta=$_POST['CalificacionBoleta'];
        $Conductor=$_POST['Conductor'];
        $Fundamento=$_POST['Fundamento'];
        $Vehiculo=$_POST['Vehiculo'];
        $Observacion=$_POST['Observacion'];
        $IdAgente=$_POST['IdAgente'];
        $IdDireccion=$_POST['Id_Direccion'];
        $NumLicencia=$_POST['NumLicencia'];
        $FolioTarjeta=$_POST['FolioTarjeta'];
        
        $Con=Conectar();
        $SQL="UPDATE Multas SET Motivo = '$Motivo', Garantia = '$Garantia', Referencia = '$Referencia',
        Hora = '$Hora', CalificacionBoleta = '$CalificacionBoleta', Conductor = '$Conductor', Fundamento = '$Fundamento', 
        Vehiculo = '$Vehiculo', Observacion = '$Observacion', IdAgente = '$IdAgente', IdDireccion = '$IdDireccion', NumLicencia = '$NumLicencia', FolioTarjetaCirculacion = '$FolioTarjeta' WHERE Folio = '$Folio';";
        $ResultSet=Ejecutar($Con, $SQL);
        Desconectar($Con);
        header("Location:UMultas.php");
    }

?>
</html>