<html>
    <form method="post">
        <label>Id_Conductor</label>
        <input type="number" id="Id_Conductor" name="Id_Conductor">
        <input type="submit">
    </form>

<?php
include("Controlador.php");
    if(isset($_POST['Id_Conductor'])){
        $Id_Conductor=$_POST['Id_Conductor'];
        $Con=Conectar();
        $SQL="SELECT * FROM Conductores WHERE Id = '$Id_Conductor';";
        $ResultSet=Ejecutar($Con,$SQL);
        $Fila=mysqli_fetch_row($ResultSet);
        Desconectar($Con);        
?>

    <form method="post">
        <input type="hidden" id="Id_Conductor" name="Id_Conductor" value="<?php print($_POST['Id_Conductor']);?>">
        <label>Nombre</label>
        <input type="text" id="Nombre" name="Nombre" value="<?php print($Fila[1]);?>">
        <label>FechaNacimiento</label>
        <input type="date" id="FechaNacimiento" name="FechaNacimiento" value="<?php print($Fila[2]);?>">
        <label>Foto</label>
        <input type="text" id="Foto" name="Foto" value="<?php print($Fila[3]);?>">
        <label>Firma</label>
        <input type="text" id="Firma" name="Firma" value="<?php print($Fila[4]);?>">
        <label>RFC</label>
        <input type="text" id="RFC" name="RFC" value="<?php print($Fila[5]);?>">
        <label>Domicilio</label>
        <input type="text" id="Domicilio" name="Domicilio" value="<?php print($Fila[6]);?>">
        <label>TipoSangre</label>
        <input type="text" id="TipoSangre" name="TipoSangre" value="<?php print($Fila[7]);?>">
        <label>Donador</label>
        <input type="text" id="Donador" name="Donador" value="<?php print($Fila[8]);?>">
        <label>CURP</label>
        <input type="text" id="CURP" name="CURP" value="<?php print($Fila[9]);?>">
        <label>Id_Direccion</label>
        <input type="number" id="Id_Direccion" name="Id_Direccion" value="<?php print($Fila[10]);?>">
        <input type="submit">
    </form>

<?php
    }
    if(isset($_POST['Nombre'])){
        $Id_Conductor=$_POST['Id_Conductor'];
        $Nombre=$_POST['Nombre'];
        $FechaNacimiento=$_POST['FechaNacimiento'];
        $Foto=$_POST['Foto'];
        $Firma=$_POST['Firma'];
        $RFC=$_POST['RFC'];
        $Domicilio=$_POST['Domicilio'];
        $TipoSangre=$_POST['TipoSangre'];
        $Donador=$_POST['Donador'];
        $CURP=$_POST['CURP'];
        $Id_Direccion=$_POST['Id_Direccion'];
        
        $Con=Conectar();
        $SQL="UPDATE Conductores SET Nombre = '$Nombre', FechaNacimiento = '$FechaNacimiento', Foto = '$Foto',
        Firma = '$Firma', RFC = '$RFC', Domicilio = '$Domicilio', TipoSangre = '$TipoSangre', 
        Donador = '$Donador', CURP = '$CURP', IdDireccion = '$Id_Direccion' WHERE Id = '$Id_Conductor';";
        $ResultSet=Ejecutar($Con, $SQL);
        Desconectar($Con);
        header("Location:UConductores.php");
    }

?>
</html>