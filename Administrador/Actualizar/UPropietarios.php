<html>
    <form method="post">
        <label>Id_Propietario</label>
        <input type="number" id="Id_Propietario" name="Id_Propietario">
        <input type="submit">
    </form>

<?php
include("Controlador.php");
    if(isset($_POST['Id_Propietario'])){
        $Id_Propietario=$_POST['Id_Propietario'];
        $Con=Conectar();
        $SQL="SELECT * FROM Propietarios WHERE Id = '$Id_Propietario';";
        $ResultSet=Ejecutar($Con,$SQL);
        $Fila=mysqli_fetch_row($ResultSet);
        Desconectar($Con);        
?>

    <form method="post">
        <input type="hidden" id="Id_Propietario" name="Id_Propietario" value="<?php print($_POST['Id_Propietario']);?>">
        <label>Nombre</label>
        <input type="text" id="Nombre" name="Nombre" value="<?php print($Fila[1]);?>">
        <label>Direccion</label>
        <input type="text" id="Direccion" name="Direccion" value="<?php print($Fila[2]);?>">
        <label>RFC</label>
        <input type="text" id="RFC" name="RFC" value="<?php print($Fila[3]);?>">
        <label>Id_Direccion</label>
        <input type="number" id="IdDireccion" name="IdDireccion" value="<?php print($Fila[4]);?>">
        <input type="submit">
    </form>

<?php
    }
    if(isset($_POST['Nombre'])){
        $Id_Propietario=$_POST['Id_Propietario'];
        $Nombre=$_POST['Nombre'];
        $Direccion=$_POST['Direccion'];
        $RFC=$_POST['RFC'];
        $IdDireccion=$_POST['IdDireccion'];
        
        $Con=Conectar();
        $SQL="UPDATE propietarios SET Nombre = '$Nombre', Direccion = '$Direccion', RFC = '$RFC', IdDireccion = '$IdDireccion' WHERE Id = '$Id_Propietario';";
        $ResultSet=Ejecutar($Con, $SQL);
        Desconectar($Con);
        header("Location:UPropietarios.php");
    }

?>
</html>