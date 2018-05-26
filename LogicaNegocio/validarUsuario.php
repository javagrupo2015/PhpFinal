<?php

include('..\config.php') ;


if(isset($_POST['UsuarioLogi'])) {
    $usuario = $_POST["fuser"];
    $pass = $_POST["fpass"];
  
    
    echo $usuario;
    echo $pass; 
   
    $id= 0; 

    if ($usuario != null && $pass != null){
        $conec =conectar(); 

        $consulta = "SELECT IdUsuario,user, contrasena FROM usuario  WHERE user ='$usuario' AND contrasena = '$pass'"; 
        $ejecutar =mysqli_query($conec ,$consulta);
    }

        while ($fila = mysqli_fetch_array($ejecutar)){
        $id = $fila["IdUsuario"];
        $UsuarioLogin = $fila["user"];
        $PasswordLogin = $fila["contrasena"];
    
        }
    if($id != null && $id != 0){
      header('Location: ../FrontApp/bienvenido.html');
    }
    else {
     header('Location: ../index.html');
      echo "Contraseña Incorrecta"; 
    }

}
?>