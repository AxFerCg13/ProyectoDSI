<html>
    <form method="post">
        <label>NumLicencia</label>
        <input type="number" id="NumLicencia" name="NumLicencia">
        <input type="submit">
    </form>

<?php
include("Controlador.php");
    if(isset($_POST['NumLicencia'])){
        $NumLicencia=$_POST['NumLicencia'];
        $Con=Conectar();
        $SQL="SELECT * FROM Licencias WHERE NumLicencia = '$NumLicencia';";
        $ResultSet=Ejecutar($Con,$SQL);
        $Fila=mysqli_fetch_row($ResultSet);
        Desconectar($Con);        
?>

    <form method="post">
        <input type="hidden" id="NumLicencia" name="NumLicencia" value="<?php print($_POST['NumLicencia']);?>">
        <label>FechaExpedicion</label>
        <input type="datetime" id="FechaExpedicion" name="FechaExpedicion" value="<?php print($Fila[1]);?>">
        <label>Vigencia</label>
        <select id="Vigencia" name="Vigencia"> <option value="3" <?php if ($Fila[2] == '3') echo 'selected'; 
        ?>>3 años</option> <option value="5" <?php if ($Fila[2] == '5') echo 'selected'; ?>>5 años</option> </select>
        <label>Tipo</label>
        <input type="text" id="Tipo" name="Tipo" value="<?php print($Fila[3]);?>">
        <label>NumEmergencia</label>
        <input type="number" id="NumEmergencia" name="NumEmergencia" value="<?php print($Fila[4]);?>">
        <label>Observacion</label>
        <input type="text" id="Observacion" name="Observacion" value="<?php print($Fila[5]);?>">
        <label>Restriccion</label>
        <input type="text" id="Restriccion" name="Restriccion" value="<?php print($Fila[6]);?>">
        <label>Id_Conductor</label>
        <input type="number" id="Id_Conductor" name="Id_Conductor" value="<?php print($Fila[7]);?>">
        <input type="submit">
    </form>

<?php
    }
    if(isset($_POST['FechaExpedicion'])){
        $NumLicencia=$_POST['NumLicencia'];
        $FechaExpedicion=$_POST['FechaExpedicion'];
        $Vigencia=$_POST['Vigencia'];
        $Tipo=$_POST['Tipo'];
        $NumEmergencia=$_POST['NumEmergencia'];
        $Observacion=$_POST['Observacion'];
        $Restriccion=$_POST['Restriccion'];
        $IdConductor=$_POST['Id_Conductor'];

        $Con=Conectar();
        $SQL="UPDATE Licencias SET FechaExpedicion = '$FechaExpedicion', Vigencia = '$Vigencia', Tipo = '$Tipo',
         NumEmergencia = '$NumEmergencia', Observacion = '$Observacion', Restriccion = '$Restriccion' WHERE NumLicencia = '$NumLicencia';";
        $ResultSet=Ejecutar($Con, $SQL);
        Desconectar($Con);
        header("Location:ULicencias.php");
    }

?>
</html>