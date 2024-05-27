<html>
    <form method="post">
        <label>Id_Vehiculo</label>
        <input type="number" id="Id_Vehiculo" name="Id_Vehiculo">
        <input type="submit">
    </form>

<?php
include("Controlador.php");
    if(isset($_POST['Id_Vehiculo'])){
        $Id_Vehiculo=$_POST['Id_Vehiculo'];
        $Con=Conectar();
        $SQL="SELECT * FROM Vehiculos WHERE id = '$Id_Vehiculo';";
        $ResultSet=Ejecutar($Con,$SQL);
        $Fila=mysqli_fetch_row($ResultSet);
        Desconectar($Con);        
?>

    <form method="post">
        <input type="hidden" id="Id_Vehiculo" name="Id_Vehiculo" value="<?php print($_POST['Id_Vehiculo']);?>">
        <label>Clase</label>
        <input type="text" id="Clase" name="Clase" value="<?php print($Fila[1]);?>">
        <label>TipoServicio</label>
        <input type="text" id="TipoServicio" name="TipoServicio" value="<?php print($Fila[2]);?>">
        <label>Uso</label>
        <input type="text" id="Uso" name="Uso" value="<?php print($Fila[3]);?>">
        <label>Anio</label>
        <input type="number" id="Anio" name="Anio" value="<?php print($Fila[4]);?>">
        <label>NoSerie</label>
        <input type="text" id="NoSerie" name="NoSerie" value="<?php print($Fila[5]);?>">
        <label>EstadoProcedencia</label>
        <input type="text" id="EstadoProcedencia" name="EstadoProcedencia" value="<?php print($Fila[6]);?>">
        <label>TipoCarroceria</label>
        <input type="text" id="TipoCarroceria" name="TipoCarroceria" value="<?php print($Fila[7]);?>">
        <label>Origen</label>
        <input type="text" id="Origen" name="Origen" value="<?php print($Fila[8]);?>">
        <label>Color</label>
        <input type="text" id="Color" name="Color" value="<?php print($Fila[9]);?>">
        <label>Cilindraje</label>
        <input type="number" id="Cilindraje" name="Cilindraje" value="<?php print($Fila[10]);?>">
        <label>Capacidad</label>
        <input type="number" id="Capacidad" name="Capacidad" value="<?php print($Fila[11]);?>">
        <label>NoPuerta</label>
        <input type="number" id="NoPuerta" name="NoPuerta" value="<?php print($Fila[12]);?>">
        <label>NoAsiento</label>
        <input type="number" id="NoAsiento" name="NoAsiento" value="<?php print($Fila[13]);?>">
        <label>Combustible</label>
        <input type="text" id="Combustible" name="Combustible" value="<?php print($Fila[14]);?>">
        <label>Transmision</label>
        <input type="text" id="Transmision" name="Transmision" value="<?php print($Fila[15]);?>">
        <label>RFA</label>
        <input type="text" id="RFA" name="RFA" value="<?php print($Fila[16]);?>">
        <label>CveVehicular</label>
        <input type="number" id="CveVehicular" name="CveVehicular" value="<?php print($Fila[17]);?>">
        <label>Marca</label>
        <input type="text" id="Marca" name="Marca" value="<?php print($Fila[18]);?>">
        <label>Linea</label>
        <input type="text" id="Linea" name="Linea" value="<?php print($Fila[19]);?>">
        <label>Sublinea</label>
        <input type="text" id="Sublinea" name="Sublinea" value="<?php print($Fila[20]);?>">
        <label>NIV</label>
        <input type="text" id="NIV" name="NIV" value="<?php print($Fila[21]);?>">
        <input type="submit">
    </form>

<?php
    }
    if(isset($_POST['Clase'])){
        $Id_Vehiculo=$_POST['Id_Vehiculo'];
        $Clase=$_POST['Clase'];
        $TipoServicio=$_POST['TipoServicio'];
        $Uso=$_POST['Uso'];
        $Anio=$_POST['Anio'];
        $NoSerie=$_POST['NoSerie'];
        $EstadoProcedencia=$_POST['EstadoProcedencia'];
        $TipoCarroceria=$_POST['TipoCarroceria'];
        $Origen=$_POST['Origen'];
        $Color=$_POST['Color'];
        $Cilindraje=$_POST['Cilindraje'];
        $Capacidad=$_POST['Capacidad'];
        $NoPuerta=$_POST['NoPuerta'];
        $NoAsiento=$_POST['NoAsiento'];
        $Combustible=$_POST['Combustible'];
        $Transmision=$_POST['Transmision'];
        $RFA=$_POST['RFA'];
        $CveVehicular=$_POST['CveVehicular'];
        $Marca=$_POST['Marca'];
        $Linea=$_POST['Linea'];
        $Sublinea=$_POST['Sublinea'];
        $NIV=$_POST['NIV'];
  
        
        $Con=Conectar();
        $SQL="UPDATE Vehiculos SET Clase = '$Clase', TipoServicio = '$TipoServicio', Uso = '$Uso',
        Anio = '$Anio', NoSerie = '$NoSerie', EstadoProcedencia = '$EstadoProcedencia', TipoCarroceria = '$TipoCarroceria', 
        Origen = '$Origen', Color = '$Color', Cilindraje = '$Cilindraje', Capacidad = '$Capacidad', NoPuerta = '$NoPuerta', NoAsiento = '$NoAsiento',
        Combustible = '$Combustible', Transmision = '$Transmision', RFA = '$RFA', CveVehicular = '$CveVehicular', Marca = '$Marca', Linea = '$Linea',
         Sublinea = '$Sublinea', NIV = '$NIV'  WHERE id = '$Id_Vehiculo';";
        $ResultSet=Ejecutar($Con, $SQL);
        Desconectar($Con);
        header("Location:UVehiculos.php");
    }

?>
</html>