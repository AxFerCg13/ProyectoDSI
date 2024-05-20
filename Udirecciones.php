<html>
    <form method="post">
        <label>Id_Direccion</label>
        <input type="number" id="Id_Direccion" name="Id_Direccion">
        <input type="submit">
    </form>

<?php
include("Controlador.php");
    if(isset($_POST['Id_Direccion'])){
        $Id_Direccion=$_POST['Id_Direccion'];
        $Con=Conectar();
        $SQL="SELECT * FROM Direcciones WHERE Id = '$Id_Direccion';";
        $ResultSet=Ejecutar($Con,$SQL);
        $Fila=mysqli_fetch_row($ResultSet);
        Desconectar($Con);        
?>

    <form method="post">
        <input type="hidden" id="Id_Direccion" name="Id_Direccion" value="<?php print($_POST['Id_Direccion']);?>">
        <label>Localidad</label>
        <input type="text" id="Localidad" name="Localidad" value="<?php print($Fila[1]);?>">
        <label>Municipio</label>
        <input type="text" id="Municipio" name="Municipio" value="<?php print($Fila[2]);?>">
        <label>Codigo_Postal</label>
        <input type="text" id="Codigo_Postal" name="Codigo_Postal" value="<?php print($Fila[3]);?>">
        <label>Calle</label>
        <input type="text" id="Calle" name="Calle" value="<?php print($Fila[4]);?>">
        <label>Numero</label>
        <input type="number" id="Numero" name="Numero" value="<?php print($Fila[5]);?>">    
        <input type="submit">
    </form>

<?php
    }
    if(isset($_POST['Localidad'])){
        $Id_Direccion=$_POST['Id_Direccion'];
        $Localidad=$_POST['Localidad'];
        $Municipio=$_POST['Municipio'];
        $Codigo_Postal=$_POST['Codigo_Postal'];
        $Calle=$_POST['Calle'];
        $Numero=$_POST['Numero'];
        
        $Con=Conectar();
        $SQL="UPDATE Direcciones SET Localidad = '$Localidad', Municipio = '$Municipio', CodigoPostal = '$Codigo_Postal', Calle = '$Calle', Numero = '$Numero' WHERE Id = '$Id_Direccion';";
        $ResultSet=Ejecutar($Con, $SQL);
        Desconectar($Con);
        header("Location:UDirecciones.php");
    }

?>
</html>