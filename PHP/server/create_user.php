<?php

    include 'conexionBD.php';
    CrearUsuarios("Camilo Andres","1980/05/14","cami@gmail.com","123456");
    CrearUsuarios("Fernando Perez","1982/05/20","fercho@gmail.com","123456");
    CrearUsuarios("Nancy Lopez","1980/05/27","nlopez@msn.com","123456");

    function CrearUsuarios($Nombre,$FechaNacimiento,$UserName,$Password){
    IniciarConexion();
    $Consulta="Select * from usuario where Username='".$UserName."'";
    $Resultado= mysqli_num_rows($GLOBALS['Conexion']->query($Consulta));
    if($Resultado==0){
        $Consulta = "INSERT INTO usuario (Nombre, FechaNacimiento, Username, Password)
        VALUES ('".$Nombre."', '".$FechaNacimiento."', '".$UserName."', '".password_hash($Password, PASSWORD_BCRYPT)."')";

        if ($GLOBALS['Conexion']->query($Consulta) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $GLOBALS['Conexion']->error;
        }
    }
    DesactivarConexion();
    }
 ?>
