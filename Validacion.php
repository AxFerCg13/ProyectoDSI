<?php
    $UserName = $_POST['UserName'];
    $Password = $_POST['Password'];

    //Primero tenemos que acceder a la base de datos
    include('Controlador.php');
    $Con=Conectar();
    $SQL="SELECT * FROM Cuentas WHERE UserName='$UserName'"; //Aqui se manda llamar la tabla coincidiendo con el usuario
    $ResultSet=Ejecutar($Con, $SQL);
    $Existe=mysqli_num_rows($ResultSet);
    if($Existe==1){
        print("El usuario existe");
        $Fila=mysqli_fetch_row($ResultSet); //Se extrae la fila de datos de la consulta
        if($Password==$Fila[1]){
            print("Contraseña Correcta");
            if($Fila[3]==1){
                print("Cuenta Activada");
                if($Fila[4]==0){
                    print("Cuenta NO Bloqueada");
                    print("********************ENTRAR*************************");
                    if($Fila[2]=='A'){
                        print("Administrador");
                    } else {
                        print("Usuario");
                    }
                } else{
                    print("Cuenta bloqueada");
                }
            } else {
                print("Cuenta NO Activada");
            }
        } else {
            print("Contraseña Incorrecta");
        }
    } else {
        print("El usuario no existe");
    }
    print($Existe);

    Desconectar($Con);

?>