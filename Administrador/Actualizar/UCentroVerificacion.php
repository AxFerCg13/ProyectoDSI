<html>
    <form method="post">
        <label>Num_Centro</label>
        <input type="number" id="Num_Centro" name="Num_Centro">
        <input type="submit">
    </form>

<?php
include("Controlador.php");
    if(isset($_POST['Num_Centro'])){
        $Num_Centro=$_POST['Num_Centro'];
        $Con=Conectar();
        $SQL="SELECT * FROM Centroverificacion WHERE numCentro = '$Num_Centro';";
        $ResultSet=Ejecutar($Con,$SQL);
        $Fila=mysqli_fetch_row($ResultSet);
        Desconectar($Con);        
?>

    <form method="post">
        <input type="hidden" id="Num_Centro" name="Num_Centro" value="<?php print($_POST['Num_Centro']);?>">
        <label>Municipio</label>
        <input type="text" id="Municipio" name="Municipio" value="<?php print($Fila[1]);?>">
        <label>Entidad</label>
        <input type="text" id="Entidad" name="Entidad" value="<?php print($Fila[2]);?>">
        <label>Nombre</label>
        <input type="text" id="Nombre" name="Nombre" value="<?php print($Fila[3]);?>">
        <input type="submit">
    </form>

<?php
    }
    if(isset($_POST['Municipio'])){
        $Num_Centro=$_POST['Num_Centro'];
        $Municipio=$_POST['Municipio'];
        $Entidad=$_POST['Entidad'];
        $Nombre=$_POST['Nombre'];
        
        $Con=Conectar();
        $SQL="UPDATE CentroVerificacion SET Municipio = '$Municipio', Entidad = '$Entidad', Nombre = '$Nombre' WHERE numCentro = '$Num_Centro';";
        $ResultSet=Ejecutar($Con, $SQL);
        Desconectar($Con);
        header("Location:UCentroVerificacion.php");
    }

?>
</html>