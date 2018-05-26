<?php

include('..\config.php') ;

$conec =conectar(); 


if(isset($_POST['UsuarioLogi'])) {
    $usuario = $_POST["fuser"];
    $pass = $_POST["fpass"];
    if ($usuario != null && $pass != null){
      $consulta = "SELECT user, contrasena FROM usuario  WHERE user ='$usuario' AND contrasena = '$pass'"; 
      $ejecutar =mysqli_query($con ,$consulta);
    }
    else{
      header('Location: agenda.php');
    }
  }
  
  while ($fila = mysqli_fetch_array($ejecutar)){
        $id = $fila["IDUsuario"];
        $UsuarioLogin = $fila["UsuarioLogin"];
        $PasswordLogin = $fila["PasswordLogin"];
       //    
  }

    if($id != null){
      header('Location: agenda.html');
    }
    else {
      header('Location: index.html');
      echo "Contraseña Incorrecta"; 
    }

?>