<html>
    <form method="post">
        <label>Id_Tenencia</label>
        <input type="number" id="Id_Tenencia" name="Id_Tenencia">
        <input type="submit">
    </form>

<?php
include("Controlador.php");
    if(isset($_POST['Id_Tenencia'])){
        $Id_Tenencia=$_POST['Id_Tenencia'];
        $Con=Conectar();
        $SQL="SELECT * FROM Tenencias WHERE Id = '$Id_Tenencia';";
        $ResultSet=Ejecutar($Con,$SQL);
        $Fila=mysqli_fetch_row($ResultSet);
        Desconectar($Con);        
?>

    <form method="post">
        <input type="hidden" id="Id_Tenencia" name="Id_Tenencia" value="<?php print($_POST['Id_Tenencia']);?>">
        <label>NoTenencia</label>
        <input type="text" id="NoTenencia" name="NoTenencia" value="<?php print($Fila[1]);?>">
        <label>FechaEmision</label>
        <input type="datetime" id="FechaEmision" name="FechaEmision" value="<?php print($Fila[2]);?>">
        <label>FechaVenvicimiento</label>
        <input type="datetime" id="FechaVenvicimiento" name="FechaVenvicimiento" value="<?php print($Fila[3]);?>">
        <label>Importe</label>
        <input type="text" id="Importe" name="Importe" value="<?php print($Fila[4]);?>">
        <label>EstadoPago</label>
        <input type="text" id="EstadoPago" name="EstadoPago" value="<?php print($Fila[5]);?>">
        <label>NoTransaccion</label>
        <input type="text" id="NoTransaccion" name="NoTransaccion" value="<?php print($Fila[6]);?>">
        <label>FolioTarjeta</label>
        <input type="number" id="FolioTarjeta" name="FolioTarjeta" value="<?php print($Fila[7]);?>">
        <input type="submit">
    </form>

<?php
    }
    if(isset($_POST['NoTenencia'])){
        $Id_Tenencia=$_POST['Id_Tenencia'];
        $NoTenencia=$_POST['NoTenencia'];
        $FechaEmision=$_POST['FechaEmision'];
        $FechaVenvicimiento=$_POST['FechaVenvicimiento'];
        $Importe=$_POST['Importe'];
        $EstadoPago=$_POST['EstadoPago'];
        $NoTransaccion=$_POST['NoTransaccion'];
        $FolioTarjeta=$_POST['FolioTarjeta'];
        
        $Con=Conectar();
        $SQL="UPDATE Tenencias SET NoTenencia = '$NoTenencia', FechaEmision = '$FechaEmision', FechaVencimiento = '$FechaVenvicimiento',
        Importe = '$Importe', EstadoPago = '$EstadoPago', NoTransaccion = '$NoTransaccion', FolioTarjetaCirculacion = '$FolioTarjeta' WHERE Id = '$Id_Tenencia';";
        $ResultSet=Ejecutar($Con, $SQL);
        Desconectar($Con);
        header("Location:UTenencias.php");
    }

?>
</html>