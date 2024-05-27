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
        $SQL="SELECT * FROM tarjetasCirculacion WHERE Folio = '$Folio';";
        $ResultSet=Ejecutar($Con,$SQL);
        $Fila=mysqli_fetch_row($ResultSet);
        Desconectar($Con);        
?>

    <form method="post">
        <input type="hidden" id="Folio" name="Folio" value="<?php print($_POST['Folio']);?>">
        <label>Propietario</label>
        <input type="text" id="Propietario" name="Propietario" value="<?php print($Fila[1]);?>">
        <label>TipoServicio</label>
        <input type="text" id="TipoServicio" name="TipoServicio" value="<?php print($Fila[2]);?>">
        <label>Vigencia</label>
        <input type="text" id="Vigencia" name="Vigencia" value="<?php print($Fila[3]);?>">
        <label>Placa</label>
        <input type="text" id="Placa" name="Placa" value="<?php print($Fila[4]);?>">
        <label>Holograma</label>
        <input type="text" id="Holograma" name="Holograma" value="<?php print($Fila[5]);?>">
        <label>OficinaExpedidora</label>
        <input type="text" id="OficinaExpedidora" name="OficinaExpedidora" value="<?php print($Fila[6]);?>">
        <label>PlacaAnterior</label>
        <input type="text" id="PlacaAnterior" name="PlacaAnterior" value="<?php print($Fila[7]);?>">
        <label>IdVehiculo</label>
        <input type="number" id="IdVehiculo" name="IdVehiculo" value="<?php print($Fila[8]);?>">
        <label>IdPropietario</label>
        <input type="number" id="IdPropietario" name="IdPropietario" value="<?php print($Fila[9]);?>">
        <input type="submit">
    </form>

<?php
    }
    if(isset($_POST['Propietario'])){
        $Folio=$_POST['Folio'];
        $Propietario=$_POST['Propietario'];
        $TipoServicio=$_POST['TipoServicio'];
        $Vigencia=$_POST['Vigencia'];
        $Placa=$_POST['Placa'];
        $Holograma=$_POST['Holograma'];
        $OficinaExpedidora=$_POST['OficinaExpedidora'];
        $PlacaAnterior=$_POST['PlacaAnterior'];
        $IdVehiculo=$_POST['IdVehiculo'];
        $IdPropietario=$_POST['IdPropietario'];
        
        $Con=Conectar();
        $SQL="UPDATE Tarjetascirculacion SET Propietario = '$Propietario', TipoServicio = '$TipoServicio', Vigencia = '$Vigencia',
        Placa = '$Placa', Holograma = '$Holograma', OficinaExpendidora = '$OficinaExpedidora', PlacaAnterior = '$PlacaAnterior', 
        IdVehiculo = '$IdVehiculo', IdPropietario = '$IdPropietario' WHERE Folio = '$Folio';";
        $ResultSet=Ejecutar($Con, $SQL);
        Desconectar($Con);
        header("Location:UTarjetasCirculacion.php");
    }

?>
</html>