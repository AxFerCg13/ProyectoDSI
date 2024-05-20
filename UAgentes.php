<html>
    <form method="post">
        <label>Id_Agente</label>
        <input type="number" id="Id_Agente" name="Id_Agente">
        <input type="submit">
    </form>

<?php
include("Controlador.php");
    if(isset($_POST['Id_Agente'])){
        $Id_Agente=$_POST['Id_Agente'];
        $Con=Conectar();
        $SQL="SELECT * FROM Agentes WHERE Id = '$Id_Agente';";
        $ResultSet=Ejecutar($Con,$SQL);
        $Fila=mysqli_fetch_row($ResultSet);
        Desconectar($Con);        
?>

    <form method="post">
        <input type="hidden" id="Id_Agente" name="Id_Agente" value="<?php print($_POST['Id_Agente']);?>">
        <label>Nombre</label>
        <input type="text" id="Nombre" name="Nombre" value="<?php print($Fila[1]);?>">
        <label>Firma</label>
        <input type="text" id="Firma" name="Firma" value="<?php print($Fila[2]);?>">
        <label>Grupo</label>
        <input type="text" id="Grupo" name="Grupo" value="<?php print($Fila[3]);?>">
        <input type="submit">
    </form>

<?php
    }
    if(isset($_POST['Nombre'])){
        $Id_Agente=$_POST['Id_Agente'];
        $Nombre=$_POST['Nombre'];
        $Firma=$_POST['Firma'];
        $Grupo=$_POST['Grupo'];
        
        $Con=Conectar();
        $SQL="UPDATE Agentes SET Nombre = '$Nombre', Firma = '$Firma', Grupo = '$Grupo' WHERE Id = '$Id_Agente';";
        $ResultSet=Ejecutar($Con, $SQL);
        Desconectar($Con);
        header("Location:UAgentes.php");
    }

?>
</html>