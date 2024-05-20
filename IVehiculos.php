<?php

    // Recepción de los datos
    $ID=$_REQUEST['ID']; //De esta manera se recibe una variable del formulario de HTML
    $Clase=$_REQUEST['Clase'];
    $TipoServicio=$_REQUEST['Tipo_Servicio'];
    $Uso=$_REQUEST['Uso'];
    $Anio=$_REQUEST['Año'];
    $No_Serie=$_REQUEST['No_Serie'];
    $EstadoProcedencia=$_REQUEST['Estado_Procedencia'];
    $Tipo_Carroceria=$_REQUEST['Tipo_Carroceria'];
    $Origen=$_REQUEST['Origen'];
    $Color=$_REQUEST['Color'];
    $Cilindraje=$_REQUEST['Cilindraje'];
    $Capacidad=$_REQUEST['Capacidad'];
    $NumeroPuertas=$_REQUEST['No_Puerta'];
    $No_Asiento=$_REQUEST['No_Asiento'];
    $Combustible=$_REQUEST['Combustible'];
    $Transmision=$_REQUEST['Transmision'];
    $RFA=$_REQUEST['RFA'];
    $CveVehicular=$_REQUEST['Cve_Vehicular'];
    $Marca=$_REQUEST['Marca'];
    $Linea=$_REQUEST['Linea'];
    $Sublinea=$_REQUEST['Sublinea'];
    $NIV=$_REQUEST['NIV'];


    //Imprimir
    print("IdAgente=" . $ID . "<br>");
    print("Nombre=" . $Clase . "<br>");
    print("Tipo de Servicio=" . $TipoServicio . "<br>");
    print("Uso=" . $Uso . "<br>");
    print("Anio=" . $Anio . "<br>");
    print("Número de Serie=" . $No_Serie . "<br>");
    print("Estado de Procedencia=" . $EstadoProcedencia . "<br>");
    print("Tipo de carrocería=" . $Tipo_Carroceria . "<br>");
    print("Origen=" . $Origen . "<br>");
    print("Color=" . $Color . "<br>");
    print("Cilindraje=" . $Cilindraje . "<br>");
    print("Capacidad=" . $Capacidad . "<br>");
    print("Numeor de Puertas=" . $NumeroPuertas . "<br>");
    print("Número de Asientos=" . $No_Asiento . "<br>");
    print("Combustible=" . $Combustible . "<br>");
    print("Transmision=" . $Transmision . "<br>");
    print("RFA=" . $RFA . "<br>");
    print("CveVehicular=" . $CveVehicular . "<br>");
    print("Marca=" . $Marca . "<br>");
    print("Linea=" . $Linea . "<br>");
    print("Sublinea=" . $Sublinea . "<br>");
    print("NIV=" . $NIV . "<br>");

    // Formar la instrucción SQL -  se van a ocupar las variables anteriores
    $SQL="INSERT INTO Vehiculos VALUES (NULL,'$Clase', '$TipoServicio', '$Uso', '$Anio', '$No_Serie', '$EstadoProcedencia', '$Tipo_Carroceria', '$Origen', '$Color', '$Cilindraje', '$Capacidad', '$NumeroPuertas', '$No_Asiento', '$Combustible', '$Transmision', '$RFA', '$CveVehicular', '$Marca', '$Linea', '$Sublinea', '$NIV')";
    print($SQL);

    //CONECTAR CON BASE DE DATOS
    include("Controlador.php"); 
    $Con=Conectar(); //Paso 1 y 2 -- obtención del objeto MySQL -. Conectar al SMBD
    $ResultSet=Ejecutar($Con, $SQL); //Paso 3  --  el primer parametro es el resultado de la función anterior -- Ejecutar consulta -- Devuelve 1 si se hizo la inserción
    $Resultato=Desconectar($Con);//Paso 5 -- cerrar la conexión -- recibe objeto de MYSQLL -- Devuelve 1 cuando se puede cerrar la conexion y 0 cuando se puede cerrar la conexion
    if($ResultSet==1){
        print("Registro Insertado");
    } else {
        print("egistro NO Insertado");
    }
?>
